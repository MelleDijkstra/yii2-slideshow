<?php
/**
 * Created by PhpStorm.
 * User: Melle Dijkstra
 * Date: 18-11-2016
 * Time: 12:21
 *
 * @var $this \yii\web\View
 * @var $slideshow \melledijkstra\slideshow\Slideshow
 */
use melledijkstra\slideshow\assets\SlideshowAsset;
use yii\web\View;

$options = json_encode($slideshow->clientOptions, JSON_FORCE_OBJECT);
$js = <<<JS
var swiper{$slideshow->swiperId} = new Swiper('.swiper-container', $options);
JS;


SlideshowAsset::register($this);
$this->registerJs($js, View::POS_READY);

?>
<div class="<?= $slideshow->swipeContainerClass ?>" <?= $slideshow->containerOptions ?>>
    <div class="swiper-wrapper">
        <?php foreach($slideshow->items as $item): ?>
            <div class="swiper-slide" <?= (isset($item['attrs'])) ? $item['attrs'] : '' ?>><?= $item['content'] ?></div>
        <?php endforeach; ?>
    </div>
</div>
