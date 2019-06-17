# M.Billing PHP SDK

Клиент для работы с платежами по [API M.Billing](https://help.mbilling.one)
Подходит тем, кто настраивает и обрабатывает платежи на своей стороне.

## Требования
PHP 5.3.2 (и выше) с расширением libcurl

## Composer (require)

1. Установите менеджер пакетов Composer.
2. В консоли выполните команду
```bash
composer require m-billing/php-sdk
```

## Composer (composer.json)
1. Добавьте строку `"m-billing/php-sdk": "*"` в список зависимостей вашего проекта в файле composer.json
```
"require": {
    "php": ">=5.3.2",
    "m-billing/php-sdk": "*"     
```
2. Обновите зависимости проекта. В консоли перейдите в каталог, где лежит composer.json, и выполните команду:
```bash
composer update
```
3. В коде вашего проекта подключите автозагрузку файлов нашего клиента:
```php
require __DIR__ . '/vendor/autoload.php';
```

## Установка вручную

1. Скачайте [архив M.Billing PHP SDK](https://github.com/m-billing/php-sdk/archive/master.zip), распакуйте его и скопируйте каталог lib в нужное место в вашем проекте.
2. В коде вашего проекта подключите автозагрузку файлов нашего клиента:
```php
require __DIR__ . '/lib/autoload.php'; 
```

## Начало работы

1. Импортируйте нужные классы
```php
use Mbilling\Client;
```
2. Создайте экземпляр объекта клиента и задайте секретный ключ проекта (его можно найти в личном кабинете на странице проекта).
```php
$client = new Client();
$client->setAuth('secretKey');
```
3. Вызовите нужный метод API. [Подробнее в документации к API M.Billing](https://help.mbilling.one)