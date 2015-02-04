<?php

namespace rangeweb\jfileupload;


use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * JFileUpload
 *
 * @author Yurij Borschev <yborschev@gmail.com>
 * @link http://www.rangeweb.ru/
 * @package rangeweb\jfileupload
 */
class JFileUpload extends JBaseUpload
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $url = Url::to($this->url);
        $this->options['data-url'] = $url;

    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->hasModel()
            ? Html::activeFileInput($this->model, $this->attribute, $this->options)
            : Html::fileInput($this->name, $this->value, $this->options);

        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work as jQuery File Uploader
     */
    public function registerClientScript()
    {
        $view = $this->getView();


            JFileUploadAsset::register($view);


        $options = Json::encode($this->clientOptions);
        $id = $this->options['id'];


        $js[] = ";jQuery('#$id').fileupload($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }
}