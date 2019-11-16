<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 16.11.2019 at 20:17
 */
echo "loaded";
// load system
require __DIR__ . '/../system/main.php';
require __DIR__ . '/../system/connection.php';
require __DIR__ . '/../system/plugin.php';
require __DIR__ . '/../system/theme.php';

// load composer
require __DIR__ . '/../vendor/autoload.php';

use HMCSW\Connection\connection;
use HMCSW\Main\main;
use HMCSW\PluginManager\plugin;
use HMCSW\ThemeManager\theme;

use Hackzilla\PasswordGenerator\Generator\RequirementPasswordGenerator;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// connection class
$m = new connection();

// main class
$m = new main();

// plugin class
$m = new plugin();

// theme class
$m = new theme();



