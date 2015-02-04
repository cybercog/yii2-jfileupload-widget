<?php

namespace rangeweb\jfileupload;

use yii\web\AssetBundle;

/**
 * JFileUploadAsset
 *
 * @author Yurij Borschev <yborschev@gmail.com>
 * @link http://www.rangeweb.ru/
 * @package rangeweb\jfileupload
 */
class JFileUploadAsset extends AssetBundle
{
    public $sourcePath = '@vendor/rangeweb/yii2-jfileupload-widget/assets/';

    public $css = [
        'css/jquery.fileupload.css'
    ];

    public $js = [
        'js/vendor/jquery.ui.widget.js',
        'js/jquery.iframe-transport.js',
        'js/jquery.fileupload.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}