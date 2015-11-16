<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BannerRotator
 *
 * @author tvitcom
 * @license GNU GENERAL PUBLIC LICENSE Version 2
 *
 * BannerRotator - the class for show and accounting mediabanners on view pages.
 */
class BannerRotator extends CApplicationComponent
{
    public static $tplDir = 'assets';
    public static $arrTplExtensions = array('.html', '.js');

    public function init()
    {
        Yii::app()->db;
        parent::init();
    }

    public static function findWithoutExtension($path = '', $name = '')
    {
        foreach (self::$arrTplExtensions as $extension) {
            $filelocation = $path . $name . $extension;
            if (file_exists($filelocation))
                return $filelocation;
        }
        return false;
    }

    public static function display($id = '', $metrics = '0%')
    {
        $path = __DIR__ . DS . self::$tplDir . DS;
        $filelocation = self::findWithoutExtension($path, $id);

        if ($filelocation && RBanner::residual($id)) {

            RBanner::countShow($id);

            echo '<div class="flash-success">';
            self::countedShow($filelocation);
            echo '<br>';
            echo RBanner::residual($id);
            echo '</div>';
        } else {
            echo 'error open template!!!';
        }
    }

    private function whatMetric($metric = '')
    {
        $substr = substr();
        if ($substr = '%')
            return '%';
        return 'int';
    }

    private static function countedShow($file)
    {
        echo readfile($file);
    }

    public function evalFromParcent($percent = '')
    {
        if ($persent == true)
            return;
    }
}
