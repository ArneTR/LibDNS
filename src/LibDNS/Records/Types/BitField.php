<?php
/**
 * Represents an 8-bit unsigned integer
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS\Records\Types;

/**
 * Represents an 8-bit unsigned integer
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class BitField extends Type
{
    /**
     * @var int
     */
    protected $value = 0;

    /**
     * @var int Types enum value that relates to this type
     */
    protected $typeIndex = Types::BIT_FIELD;

    /**
     * @var int Maximum value this field can hold
     */
    private $maxValue;

    /**
     * Constructor
     *
     * @param mixed $value
     * @param int   $flags
     *
     * @throws \RuntimeException When the supplied value is invalid
     */
    public function __construct($value = null, $flags = 0)
    {
        $this->calculateMaxValue($flags);
        parent::__construct($value, $flags);
    }

    /**
     * Get the maximum value this field can hold
     *
     * @return int
     */
    private function calculateMaxValue($flags)
    {
        $length = 0;
        for ($i = 1; $i < 16; $i++) {
            if ($i % 8 && $flags & constant('TypeFlags::BIT_FIELD_LENGTH_' . $i)) {
                $length += $i;
            }
        }

        if ($length === 0) {
            throw new \UnderflowException('Bit field length not specified');
        }

        $this->maxValue = pow(2, $length) - 1;
    }

    /**
     * Set the internal value
     *
     * @param int $value The new value
     *
     * @throws \UnderflowException When the supplied value is less than 0
     * @throws \OverflowException When the supplied value is greater than $maxValue
     */
    public function setValue($value)
    {
        $value = (int) $value;
        if ($value < 0) {
            throw new \UnderflowException('BitField value must be in the range 0 - ' . $this->maxValue);
        } else if ($value > $maxValue) {
            throw new \OverflowException('BitField value must be in the range 0 - ' . $this->maxValue);
        }

        $this->value = $value;
    }

    /**
     * Get the maximum value this field can hold
     *
     * @return int
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }
}
