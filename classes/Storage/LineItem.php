<?php

namespace Storage;

use BaseClass;

/**
 * Class LineItem
 * @package Storage
 */
class LineItem extends BaseClass //implements Item
{
    /** @var int Unique ID */
    public $Id;

    /** @var string */
    public $line1;

    /** @var string */
    public $line2;

    /** @var string */
    public $line3;

    /** @var string */
    public $line4;

    /** @var string */
    public $line5;

    /** @var string */
    public $line6;

    /** @var string */
    public $line7;

    /** @var string */
    public $line8;

    /** @var string */
    public $line9;

    /** @var string */
    public $line10;

}

/**
 * Class LineItemManager
 * @package Storage
 */
class LineItemManager extends AbstractManager
{
}
