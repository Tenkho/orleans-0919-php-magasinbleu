<?php
/**
 * This file define config constants .
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */


define('APP_DEV', true);

//Model (for connexion data, see unversionned db.php)
//VIew
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');
define('APP_CACHE_PATH', __DIR__ . '/../temp/cache/');
define('UPLOAD_PATH', '../public/assets/uploads/');

define('MAIL_FROM', "sylvaindesousa86@gmail.com");
define('MAIL_TO', "sylvaindesousa86@gmail.com");

define('HOME_PAGE', 'home/index');
