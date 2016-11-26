<?php
session_start();
$config = parse_ini_file("/config/config.ini");
require_once 'lib/functions.php';
require_once 'config/config.php';
// подключаем файлы ядра
require_once 'core/db.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';


require_once 'lib/classes/Menu.class.php';
require_once 'lib/classes/User.class.php';
require_once 'lib/classes/Categories.class.php';
/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор



