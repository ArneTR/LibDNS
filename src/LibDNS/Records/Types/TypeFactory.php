<?php
/**
 * Creates Type objects
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
 * Creates Type objects
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class TypeFactory
{
    /**
     * Create a new Anything object
     *
     * @param string $value
     *
     * @return \LibDNS\Records\Types\Anything
     */
    public function createAnything($value = null, $flags = 0)
    {
        return new Anything($value, $flags);
    }

    /**
     * Create a new BitMap object
     *
     * @param string $value
     *
     * @return \LibDNS\Records\Types\BitMap
     */
    public function createBitMap($value = null, $flags = 0)
    {
        return new BitMap($value, $flags);
    }

    /**
     * Create a new Char object
     *
     * @param int $value
     *
     * @return \LibDNS\Records\Types\Char
     */
    public function createChar($value = null, $flags = 0)
    {
        return new Char($value, $flags);
    }

    /**
     * Create a new CharacterString object
     *
     * @param string $value
     *
     * @return \LibDNS\Records\Types\CharacterString
     */
    public function createCharacterString($value = null, $flags = 0)
    {
        return new CharacterString($value, $flags);
    }

    /**
     * Create a new DomainName object
     *
     * @param string|string[] $value
     *
     * @return \LibDNS\Records\Types\DomainName
     */
    public function createDomainName($value = null, $flags = 0)
    {
        return new DomainName($value, $flags);
    }

    /**
     * Create a new IPv4Address object
     *
     * @param string $value
     *
     * @return \LibDNS\Records\Types\IPv4Address
     */
    public function createIPv4Address($value = null, $flags = 0)
    {
        return new IPv4Address($value, $flags);
    }

    /**
     * Create a new IPv6Address object
     *
     * @param string $value
     *
     * @return \LibDNS\Records\Types\IPv6Address
     */
    public function createIPv6Address($value = null, $flags = 0)
    {
        return new IPv6Address($value, $flags);
    }

    /**
     * Create a new Long object
     *
     * @param int $value
     *
     * @return \LibDNS\Records\Types\Long
     */
    public function createLong($value = null, $flags = 0)
    {
        return new Long($value, $flags);
    }

    /**
     * Create a new Short object
     *
     * @param int $value
     *
     * @return \LibDNS\Records\Types\Short
     */
    public function createShort($value = null, $flags = 0)
    {
        return new Short($value, $flags);
    }
}
