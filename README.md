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
COMPOSER_HOME=.composer php composer.phar create-project --prefer-dist --stability=dev v3project/app-v3-shop demo.ru
# Going into the project folder
cd demo.ru

#Edit the file to access the database, it is located at common/config/db.php

#Installation of ready-dump
php yii dbDumper/mysql/restore
```

2. Обновить настройки своего домена ``frontend/config/main.php``

```php
'canurl' => [
    'class' => 'v3project\helpers\CanUrl',
    'schema' => 'http', //Указать ваш протокол
    'host' => 'app-v3-shop.ru.vps69.s2.h.skeeks.com', //Указать ваш хост
],
```

3. Прописать ключ сервиса ``dadata.ru``
    * Зарегистрироваться в сервисе dadata.ru
    * Получить ключ
    * Перейти: в систему управелния сайтом -> настройки -> Сервис подсказок dadata.ru -> Авторизационный токен

4. Получить ключ доступа к api системы обработки заказов V3Project.ru
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



___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)

