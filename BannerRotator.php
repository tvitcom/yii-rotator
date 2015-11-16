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

    public function init()
    {
        //Yii::import('application.extensions.banner.models.Banner');
        parent::init();
    }

    //put your code here
    public static function display($id = '', $metrics = '0%')
    {
        $filename = $id;
        $path = __DIR__ . DS . $id;

        if (($id) && (file_exists($path))) {
            echo '<div class="flash-success">';
            self::countedShow($path);
            echo '</div>';
        } else {
            echo '123 error open template!!!';
        }
    }

    private function whatMetric($metric = '')
    {
        $substr = substr();
        if ($substr = '%')
            return '%';
        return 'int';
    }

    private static function countedShow($path)
    {
        echo readfile($path);
    }

    public function evalFromParcent($percent = '')
    {

        if ($persent == true)
            return;
    }
}
