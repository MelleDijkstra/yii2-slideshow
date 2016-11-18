Yii2 Slideshow
==============
A simple slideshow (not only for images). It generates a view

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist melledijkstra/yii2-slideshow "*"
```

or add

```
"melledijkstra/yii2-slideshow": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \melledijkstra\slideshow\Slideshow::widget([
    'items' => [
        [
            'content' => 'Slide 1', // tip: $this->render('view');
        ],
        [
            'content' => 'Slide 2',
            'active' => true,
        ]
    ],
    // The client options will be passed to the Javascript swiper library
    // @see http://idangero.us/swiper/api/#parameters
    'clientOptions' => [
        'direction' => 'horizontal',
        'speed' => 300,    
        'autoplay' => true,
    ]
]); ?>
```