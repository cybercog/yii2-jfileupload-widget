<?php

namespace rangeweb\jfileupload;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\widgets\InputWidget;
/**
 * JBaseUpload
 *
 * @author Yurij Borschev <yborschev@gmail.com>
 * @link http://www.rangeweb.ru/
 * @package rangeweb\jfileupload
 */
class JBaseUpload extends InputWidget
{
    /**
     * @var string|array upload route
     */
    public $url;
    /**
     * @var array the plugin options. For more information see the jQuery File Upload options documentation.
     * @see https://github.com/blueimp/jQuery-File-Upload/wiki/Options
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the jQuery File Upload plugin.
     * Please refer to the jQuery File Upload plugin web page for possible options.
     * @see https://github.com/blueimp/jQuery-File-Upload/wiki/Options#callback-options
     */
    public $clientEvents = [];
    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if(empty($this->url)) {
            throw new InvalidConfigException('"url" cannot be empty.');
        }
        $this->clientOptions['url'] = Url::to($this->url);
    }

} 