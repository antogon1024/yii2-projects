<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MycmsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
   
	public $css = [
        'css/mod_mycms/main.css',
    ];
    public $js = [	
		'js/mod_mycms/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}