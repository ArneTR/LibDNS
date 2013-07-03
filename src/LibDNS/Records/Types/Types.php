<?php
/**
 * Enumeration of simple data types
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
 * Enumeration of simple data types
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class Types extends Enumeration
{
    const ANYTHING         = 0x001;
    const BIT_FIELD        = 0x002;
    const BIT_MAP          = 0x004;
    const CHAR             = 0x008;
    const CHARACTER_STRING = 0x010;
    const DOMAIN_NAME      = 0x020;
    const IPV4_ADDRESS     = 0x040;
    const IPV6_ADDRESS     = 0x080;
    const LONG             = 0x100;
    const SHORT            = 0x200;
}
