<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.52-dev
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions

$params = array();
$params["rootDir"] = __DIR__ . "/../..";
$params["wwwDir"] = $params["rootDir"] . '/www';
$params["libsDir"] = $params["rootDir"] . '/libs';
$params["venneDir"] = $params["libsDir"] . '/Venne';

require_once $params['libsDir'] . '/Nette/common/Object.php';
require_once $params['libsDir'] . '/Nette/Diagnostics/Debugger.php';
require_once $params['libsDir'] . '/Nette/common/ObjectMixin.php';
require_once $params['libsDir'] . '/Nette/Utils/Strings.php';
require_once $params['libsDir'] . '/Nette/Http/RequestFactory.php';
require_once $params['libsDir'] . '/Nette/Http/IRequest.php';
require_once $params['libsDir'] . '/Nette/Http/Request.php';
require_once $params['libsDir'] . '/Nette/common/IFreezable.php';
require_once $params['libsDir'] . '/Nette/common/FreezableObject.php';
require_once $params['libsDir'] . '/Nette/Http/Url.php';
require_once $params['libsDir'] . '/Nette/Http/UrlScript.php';

$factory = new Nette\Http\RequestFactory;
$factory->setEncoding('UTF-8');
$httpRequest = $factory->createHttpRequest();

$params["baseUrl"] = rtrim($httpRequest->getUrl()->getBaseUrl(), '/');
$params["basePath"] = str_replace("/kcfinder", "", preg_replace('#https?://[^/]+#A', '', $params["baseUrl"]));

$_CONFIG = array(


// GENERAL SETTINGS

    'disabled' => false,
    'theme' => "oxygen",
    'uploadURL' => $params["basePath"] . "/public/upload",
    'uploadDir' => $params["wwwDir"] . "/public/upload",

    'types' => array(

    // (F)CKEditor types
        'files'   =>  "",
        'flash'   =>  "swf",
        'images'  =>  "*img",

    // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "*img",
    ),


// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl",


// MISC SETTINGS

    'filenameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'dirnameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'mime_magic' => "",

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_check4htaccess' => true,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => &$_SESSION['KCFINDER'],
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",
);