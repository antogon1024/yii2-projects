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
class CabinetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
   
	public $css = [
        'css/mod_cabinet/yoo_theme.css',
		'css/mod_cabinet/main.css',
    ];
   
	public $js = [
        //'js/mod_cabinet/jquery.min.js',
        'js/mod_cabinet/yoo_theme.js',
		'js/mod_cabinet/main.js',
    ];
	 
    public $depends = [];
	
}
