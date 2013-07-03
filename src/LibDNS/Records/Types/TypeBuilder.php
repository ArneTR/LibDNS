<?php
/**
 * Builds Types from type definitions
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
 * Builds Types from type definitions
 *
 * @category   LibDNS
 * @package    Types
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class TypeBuilder
{
    /**
     * @var \LibDNS\Records\Types\TypeFactory
     */
    private $typeFactory;

    /**
     * Constructor
     *
     * @param \LibDNS\Records\Types\TypeFactory $typeFactory
     */
    public function __construct(TypeFactory $typeFactory)
    {
        $this->typeFactory = $typeFactory;
    }

    /**
     * Build a new Type object corresponding to a resource record type
     *
     * @param int   $type Data type, can be indicated using the Types enum
     * @param mixed $data Value for created object
     *
     * @return \LibDNS\Records\Types\Type
     */
    public function build($type, $data = null)
    {
        $type = (int) $type;

        if ($type & Types::ANYTHING) {
            $result = $this->typeFactory->createAnything($data, $type);
        } else if ($type & Types::BIT_MAP) {
            $result = $this->typeFactory->createBitMap($data, $type);
        } else if ($type & Types::CHAR) {
            $result = $this->typeFactory->createChar($data, $type);
        } else if ($type & Types::CHARACTER_STRING) {
            $result = $this->typeFactory->createCharacterString($data, $type);
        } else if ($type & Types::DOMAIN_NAME) {
            $result = $this->typeFactory->createDomainName($data, $type);
        } else if ($type & Types::IPV4_ADDRESS) {
            $result = $this->typeFactory->createIPv4Address($data, $type);
        } else if ($type & Types::IPV6_ADDRESS) {
            $result = $this->typeFactory->createIPv6Address($data, $type);
        } else if ($type & Types::LONG) {
            $result = $this->typeFactory->createLong($data, $type);
        } else if ($type & Types::SHORT) {
            $result = $this->typeFactory->createShort($data, $type);
        } else {
            throw new \InvalidArgumentException('Invalid Type identifier ' . $type);
        }
        
        return $result;
    }
}
