<?php
/**
 * Created by PhpStorm.
 * User: Melle Dijkstra
 * Date: 18-11-2016
 * Time: 15:19
 */

namespace melledijkstra\slideshow\assets;


use yii\web\AssetBundle;

class SwiperAsset extends AssetBundle
{
    public $sourcePath = '@bower/swiper/dist';

    public $js = [
        'js/swiper.min.js',
    ];
    public $css = [
        'css/swiper.min.css',
    ];
}