<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace console\controllers;

use v3toys\parsing\console\controllers\ProductsController;
use v3toys\parsing\models\V3toysProductContentElement;
use v3toys\parsing\models\V3toysProductProperty;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;


class ParsingController extends ProductsController
{
    /*public function actionTest()
    {
        $query = (new \yii\db\Query())
            ->from('apiv5.to_del_oldkw_product_extender')
            ->limit(10);

        $query2 = (new \yii\db\Query())
            ->from('apiv5.product')
            ->andWhere(['like', 'keywords', 'кукла'])
            ->andWhere(['>', 'guiding_available_quantity', 0])
            ->andWhere(['astype' => ['общий_без_конкретных', 'конкретный_с_общим', 'не_ассортимент']])//                ->limit(100)
        ;

        $dataProperties = $query->all(\Yii::$app->dbV3project);
        $data2Properties = $query2->count("*", \Yii::$app->dbV3project);

        print_r($data2Properties);
        die;
    }*/

    public function actionParsing()
    {

        ini_set("memory_limit", "8192M");
        set_time_limit(0);

        $ids = V3toysProductProperty::find()->select('v3toys_id')->asArray()->indexBy('v3toys_id')->all();
        $exist = array_keys($ids);

        //print_r($exist);

        $query = (new \yii\db\Query())
            ->from('apiv5.product')
            //->andWhere(['is_duplicate' => 0])
            //->andWhere(['!=', 'id', $exist])
            ->andWhere(['like', 'keywords', 'кукла'])
            ->andWhere(['>', 'guiding_available_quantity', 0])
            ->andWhere(['astype' => ['общий_без_конкретных', 'конкретный_с_общим', 'не_ассортимент']]);

        $totalProducts = $query->count('*', \Yii::$app->dbV3project);
        $this->stdout("\t\t Всего товаров на V3Toys в наличии: {$totalProducts}\n", Console::BOLD);

        $query = (new \yii\db\Query())
            ->from('apiv5.product')
            //->andWhere(['is_duplicate' => 0])
            ->andWhere(['like', 'keywords', 'кукла'])
            ->andWhere(['>', 'guiding_available_quantity', 0])
            ->andWhere(['astype' => ['общий_без_конкретных', 'конкретный_с_общим', 'не_ассортимент']])
            //->andWhere(['!=', 'id', $exist])
            ->orderBy(['id' => SORT_DESC])
            ->limit(1000)
        ;

        foreach ($query->each(300, \Yii::$app->dbV3project) as $row) {
            $v3id = ArrayHelper::getValue($row, 'id');
            if (!$v3id) {
                $this->stdout("\t\t Not found v3id\n", Console::FG_RED);
                continue;
            }

            $this->stdout("\t\t V3toysID: {$v3id}\n");

            if (V3toysProductContentElement::find()->joinWith('v3toysProductProperty as p')->andWhere(['p.v3toys_id' => $v3id])->exists()) {
                $this->stdout("\t\t exist: {$v3id}\n", Console::FG_YELLOW);
                continue;
            }

            $property = new V3toysProductProperty();
            $property->consoleController = $this;
            $property->v3toys_id = ArrayHelper::getValue($row, 'id');

            if (!$property->v3toysHtml) {
                $this->stdout("\t\t Not parsing html code\n", Console::FG_RED);
                continue;
            }

            $title = $property->parseV3toysH1();
            $property->parseV3toysImages();
            $property->parseV3toysVideos();
            $property->parseV3ToysMainSectionId();

            if (!$title) {
                $this->stdout("\t\t Not parsing h1\n", Console::FG_RED);
                continue;
            }

            $this->stdout("\t\t Title: {$title}\n");

            $element = new V3toysProductContentElement();
            $element->name = $title;
            $element->content_id = 2;
            $element->meta_keywords = ArrayHelper::getValue($row, 'keywords');

            if ($element->save()) {
                $this->stdout("\t\t Element added\n", Console::FG_GREEN);


                $property->id = $element->id;

                $property->sku = ArrayHelper::getValue($row, 'sku');

                if ($property->save()) {
                    $this->stdout("\t\t Property added\n", Console::FG_GREEN);
                } else {
                    $this->stdout("\t\t Property not added\n", Console::FG_RED);
                    print_r($property->errors);
                    if ($element->delete()) {
                        $this->stdout("\t\t Element deleted\n");
                    }
                    die;
                }

            } else {
                $this->stdout("\t\t Element not added\n", Console::FG_RED);
                print_r($element->errors);
                die;
            }

            //print_r($row);
        }

        /*echo $query->createCommand()->rawSql . "\n";
        $rows = $query->all(\Yii::$app->dbV3project);
        print_r($rows);*/
    }
}