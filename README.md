# yii2-geocode-yandex
 
REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0 and Yii2.

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this widget. Put in your composer.json in require case:

```
"vitalik74/yii2-geocode-yandex": "*"
```

And run command "composer update".

DOCUMENTATIONS
==============
See [doc](https://tech.yandex.ru/maps/doc/geocoder/desc/concepts/input_params-docpage/).

USAGE
==============
```
$geo = new vitalik74\geocode\Geocode();
$geo->get('Moscow, Kremlin', ['kind' => 'house']);
```

TESTS
=====

Install `codeception` (see in `composer.json`). For run test use `codecept run unit`. 