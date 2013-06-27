<?php
/**
 * Class representing a 16-bit unsigned integer
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    DataTypes
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS\DataTypes;

/**
 * Class representing a 16-bit unsigned integer
 *
 * @category   LibDNS
 * @package    DataTypes
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class Short extends SimpleType
{
    /**
     * @var int The internal value
     */
    protected $value = 0;

    /**
     * Set the internal value
     *
     * @param int $value The new value
     *
     * @throws \UnderflowException When the supplied value is less than 0
     * @throws \OverflowException When the supplied value is greater than 65535
     */
    public function setValue($value)
    {
        $value = (int) $value;
        if ($value < 0) {
            throw new \UnderflowException('Short integer value must be in the range 0 - 65535');
        } else if ($value > 65535) {
            throw new \OverflowException('Short integer value must be in the range 0 - 65535');
        }

        $this->value = $value;
    }
}
