Affiliate Shop on SkeekS CMS (Yii2)
=========================

[![skeeks!](https://cms.skeeks.com/uploads/all/35/fd/33/35fd33aa306823dbaf53a0142d43b3fa.png)](https://cms.skeeks.com)

[![Latest Stable Version](https://poser.pugx.org/v3project/app-v3-shop/v/stable.png)](https://packagist.org/packages/v3project/app-v3-shop)
[![Total Downloads](https://poser.pugx.org/v3project/app-v3-shop/downloads.png)](https://packagist.org/packages/v3project/app-v3-shop)
[![Dependency Status](https://www.versioneye.com/php/v3project:app-v3-shop/dev-master/badge.png)](https://www.versioneye.com/php/v3project:app-v3-shop/dev-master)

Документация
-------------
  * [Документация с примерами + видео](http://app-v3-shop.readthedocs.io/ru/latest/)
  
Ссылки
------
* [Web site (SkeekS CMS)](https://cms.skeeks.com)
* [Docs (SkeekS CMS)](https://cms.skeeks.com/docs)
* [Author](https://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms/blob/master/CHANGELOG.md)

Установка
---------

1. Выполнить команды

```bash
# Download latest version of composer
curl -sS https://getcomposer.org/installer | COMPOSER_HOME=.composer php
# Installing the base project SkeekS CMS
COMPOSER_HOME=.composer php composer.phar create-project --prefer-dist --stability=dev v3project/app-v3-shop=dev-master demo.ru
# Going into the project folder
cd demo.ru

# Download latest version of composer
curl -sS https://getcomposer.org/installer | COMPOSER_HOME=.composer php

#Edit the file to access the database, it is located at common/config/db.php

#Update configs
COMPOSER_HOME=.composer php composer.phar self-update && COMPOSER_HOME=.composer php composer.phar du

#Installation of ready-dump
php yii migrate -t=migration_install -p=backup/migrations
```


2. Прописать ключ сервиса ``dadata.ru``
    * Зарегистрироваться в сервисе dadata.ru
    * Получить ключ
    * Перейти: в систему управелния сайтом -> настройки -> Сервис подсказок dadata.ru -> Авторизационный токен

3. Получить ключ доступа к api системы обработки заказов V3Project.ru
    * Получить ключ можно по запросу

Обновление
-----------

1. Выполнить команды
```bash
# Download latest version of composer
COMPOSER_HOME=.composer php composer.phar self-update
# Download dependency
COMPOSER_HOME=.composer php composer.phar update -o
```




-----------

```bash

,"v3toys/parsing": "dev-master"

,
{
    "type": "git",
    "url":  "https://git.skeeks.com/v3toys/parsing.git"
}

COMPOSER_HOME=.composer php composer.phar self-update && COMPOSER_HOME=.composer php composer.phar update -o

php yii v3toysParsing/products/load-by-categories 1050
php yii v3toys/properties/load 1
php yii v3toysParsing/images/load 2
php yii v3toys/prices/load
```

```js

var result = [];
$('.category_navigation li').each(function() { 
    if (!$(this).hasClass('with_sub') && ! $(this).hasClass('sub')) { 
        if ($('a', $(this)).text()) {
            result.push($('a', $(this)).text());
        }
        
    }; 
    
});
var r = result.join();
console.log(r);
```

```sql
SELECT set_config('v3p.current_worker_id', '2', false);
UPDATE "public"."v3p_shop_affiliate" SET "state" = 'запускается', "is_accept_orders_by_api" = true, "disabled_at" = null WHERE "id" = 143;
UPDATE "public"."v3p_shop_affiliate" SET "state" = 'запущен_и_работает', "is_accept_orders_by_phone" = true, "main_phone" = 74957222873 WHERE "id" = 143;


SELECT set_config('v3p.current_worker_id', '2', false);
INSERT INTO "public"."v3p_shop_affiliate" (
"id", "hperiod", "updated_by_worker_id", "key",
"disabled_at",
"title",
"main_page_url",
"favicon_image_url",
"logo_image_url",
"product_image_url_pattern", "main_phone",
"site_ip",
"api_url",
"for_accrual_pact_id", "dial_prefix", "tff_shop_terminal_extkey", "paysalt", "payurl", "yks_shop_extid", "yks_shop_showcase_extid", "qiwi_shop_project_extid", "rfi_shop_service_extid", "old_paysalt2finish_date_jsoned", "rfi_shop_service_extkey", "product_url_pattern",
 "is_db_access_should_be_opened",
 "extra_phones_jsonarrayed",
"state",
"is_v3cont_active", "is_accept_orders_by_api", "is_accept_orders_by_phone", "state_checked_at", "mailer_from_email",
"mailer_from_name",
"mailer_transport_jsoned", "mailer_text_mural", "is_accept_orders_by_hands", "oldkw_margin_gid", "oldkw_favicon_kw_img_key", "oldkw_logo_kw_img_key", "_del_is_active", "created_at", "updated_at", "sber_api_user_name", "sber_api_user_pass", "yks_shop_secret_key")
VALUES
(DEFAULT, DEFAULT, null, 'MYB',
DEFAULT,
'Остров детства',
'https://mybaby-toys.ru/',
'https://mybaby-toys.ru/img/logo.png',
'https://mybaby-toys.ru/img/logo.png',
NULL, NULL,
'94.130.32.159',
'https://mybaby-toys.ru/v3toys/api-v04',
NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
DEFAULT,
NULL,
'до_разработки',
DEFAULT, DEFAULT, DEFAULT, DEFAULT, NULL,
NULL,
NULL, NULL, DEFAULT, NULL, DEFAULT, DEFAULT, DEFAULT, null, null, NULL, NULL, NULL);

```



___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)

