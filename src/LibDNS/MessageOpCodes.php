<?php
/**
 * Enumeration of possible message opcodes
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    LibDNS
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS;

/**
 * Enumeration of possible message types
 *
 * @category   LibDNS
 * @package    LibDNS
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class MessageOpCodes extends Enumeration
{
    const QUERY = 0;
    const IQUERY = 1;
    const STATUS = 2;
}
