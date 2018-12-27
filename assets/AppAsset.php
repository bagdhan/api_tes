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
		'css/theme-default.css',
        'css/site.css',
    ];
    public $js = [
	'js/plugins/jquery/jquery.min.js',
	'js/plugins/jquery/jquery-ui.min.js',
	'js/plugins/bootstrap/bootstrap.min.js',
	'js/plugins/icheck/icheck.min.js',
	'js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',
	'js/plugins/scrolltotop/scrolltopcontrol.js',
	'js/plugins/morris/raphael-min.js',
	'js/plugins/morris/morris.min.js',
	'js/plugins/rickshaw/d3.v3.js',
	'js/plugins/rickshaw/rickshaw.min.js',
	'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
	'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
	'js/plugins/bootstrap/bootstrap-datepicker.js',
	'js/plugins/owl/owl.carousel.min.js',
	'js/plugins/moment.min.js',
	'js/plugins/daterangepicker/daterangepicker.js',
	'js/settings.js',
	'js/plugins.js',
	'js/actions.js',
	'js/demo_dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
