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

    public static function display($id = '', $metric = '0%')
    {
        // Find file for id as filename in template directory:
        $path = __DIR__ . DS . self::$tplDir . DS;
        $filelocation = self::findWithoutExtension($path, $id);

        // Вычисляем количество для вывода и отнимания от счетчика показов баннеров:
        if (self::typeMetric($metric) === 'percent') {
            $residual = RBanner::residual($id);
            $count = $residual - floor($residual * intval($metric) * 0.01);
        } else {
            $count = RBanner::residual($id) - intval($metric);
        }

        // Если файл шаблона найден и количество имеется в БД то:
        if ($filelocation && $count) {

            //Отнимаем в счетчике показа баннера в БД:
            RBanner::decrementDisplay($id, $count);

            self::overallShow($id, $filelocation, $count);
        } else {
            echo '<div class="flash-error">error open template!!!</div>';
        }
    }

    public static function overallShow($id, $filelocation, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo '<div class="flash-success">';
            self::countedShow($filelocation);
            echo '<br>';
            echo RBanner::residual($id);
            echo '</div>';
        }
    }

    public static function typeMetric($value = '')
    {
        $value = strpbrk($value, '%');
        if ($value)
            return 'percent';
        else
            return 'integer';
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
