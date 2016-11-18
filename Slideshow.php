<?php

namespace melledijkstra\slideshow;
use yii\base\InvalidConfigException;
use yii\base\Widget;

/**
 * Slideshow widget made with swiper library
 */
class Slideshow extends Widget
{

    /**
     * The class used as the swipe container
     * @var string
     */
    public $swipeContainerClass = 'swiper-container';

    /**
     * Attributes for the swipe container
     * @var array
     */
    public $containerOptions = [];

    /**
     * Attributes for the swipe wrapper
     * @var array
     */
    public $wrapperOptions = [];

    /**
     * Attributes for each individual swipe item
     * @var array
     */
    public $itemOptions = [];

    /**
     * The options passed to the underlying library when creating the swiper
     * @see http://idangero.us/swiper/api/#parameters
     * @var array
     */
    public $clientOptions = [];

    /**
     * The individual swipe items
     * Should be this format:
     * ```
     * [
     *    [
     *       'content' => <yourcontent:string>,
     *    ],
     *    [
     *       'content' => <yourcontent:string>,
     *       'active'  => true,
     *    ]
     * ]
     * ```
     * @var array
     */
    public $items = [];

    /**
     * This counter makes sure that every swiper has different id
     * @var int
     */
    private static $count = 0;

    /**
     * The slide to focus on when rendered, can also be defined in item himself
     * @see $this->items
     * @var
     */
    public $activeSlide;

    /**
     * The id of the swiper
     * @var integer
     */
    private $swiper_id;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->swiper_id = ++self::$count;
        $this->containerOptions = $this->makeHtmlAttributes($this->containerOptions);
        $this->wrapperOptions = $this->makeHtmlAttributes($this->wrapperOptions);
        $this->checkActiveSlide();
        if(is_numeric($this->activeSlide)) {
            $this->clientOptions['initialSlide'] = $this->activeSlide;
        }
        // TODO: validate options
        foreach ($this->items as $item) {
            if (!array_key_exists('content', $item)) {
                throw new InvalidConfigException("The 'content' option is required.");
            }
        }
    }

    /***
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('view', ['slideshow' => $this]);
    }

    /**
     * Returns the ID of this swiper
     * @return int
     */
    public function getSwiperId()
    {
        return $this->swiper_id;
    }

    private function makeHtmlAttributes(array $array) {
        // TODO: create dynamic attributes
//        $attrs = [];
//        foreach($array as $key => $value) {
//            if(is_array($value)) {
//                $attrs[$key] = json_encode($value);
//            } else {
//                $attrs[$key] = $value;
//            }
//        }
        return '';
    }

    private function checkActiveSlide()
    {
        for($i = 0;$i < count($this->items);$i++) {
            $this->activeSlide = (isset($this->items[$i]['active']) && $this->items[$i]['active'] === true) ? $i : $this->activeSlide;
        }
    }

}
