<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom-styles.css',
        'css/suggestions.min.css',
        //'css/bootstrap.min.css',
        'css/bootstrap.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/jquery-3.3.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery.suggestions.min.js',
        //'js/validator.js',
        //'contact.js',
        'https://kit.fontawesome.com/66546926a5.js',
    ];
    //подключение скриптов в head 
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
