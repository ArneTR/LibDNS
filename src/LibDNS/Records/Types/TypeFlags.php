<?php
/**
 * Enumeration of flags for simple data types
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

use \LibDNS\Enumeration;

/**
 * Enumeration of flags for simple data types
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class TypeFlags extends Enumeration
{
    const BIT_FIELD_LENGTH_1  = 0x00040000;
    const BIT_FIELD_LENGTH_2  = 0x00080000;
    const BIT_FIELD_LENGTH_3  = 0x00100000;
    const BIT_FIELD_LENGTH_4  = 0x00200000;
    const BIT_FIELD_LENGTH_5  = 0x00400000;
    const BIT_FIELD_LENGTH_6  = 0x00800000;
    const BIT_FIELD_LENGTH_7  = 0x01000000;
    const BIT_FIELD_LENGTH_9  = 0x02000000;
    const BIT_FIELD_LENGTH_10 = 0x04000000;
    const BIT_FIELD_LENGTH_11 = 0x08000000;
    const BIT_FIELD_LENGTH_12 = 0x10000000;
    const BIT_FIELD_LENGTH_13 = 0x20000000;
    const BIT_FIELD_LENGTH_14 = 0x40000000;
    const BIT_FIELD_LENGTH_15 = 0x80000000;
}
