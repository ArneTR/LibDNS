<?php
/**
 * Represents a raw network data packet
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    Packets
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS\Packets;

/**
 * Represents a raw network data packet
 *
 * @category   LibDNS
 * @package    Packets
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class Packet
{
    /**
     * @var string
     */
    private $data;

    /**
     * @var int Data length
     */
    private $length;

    /**
     * @var int Byte read pointer
     */
    private $bytePointer = 0;

    /**
     * @var int Bit read pointer
     */
    private $bitPointer = 0;

    /**
     * Constructor
     *
     * @param \LibDNS\Packets\LabelRegistry $labelRegistry
     * @param string                        $data          The initial packet raw data
     */
    public function __construct($data = '')
    {
        $this->data = (string) $data;
        $this->length = strlen($this->data);
    }

    /**
     * Read bytes from the packet data
     *
     * @param int $length The number of bytes to read
     *
     * @return string
     *
     * @throws \OutOfBoundsException When the pointer position is invalid or the supplied length is negative
     */
    public function read($length = null)
    {
        if ($this->bytePointer >= $this->length) {
            throw new \OutOfBoundsException('Pointer position invalid');
        }

        if ($length === null) {
            $result = substr($this->data, $this->bytePointer);
            $this->bytePointer = $this->length;
            $this->bitPointer = 0;
        } else {
            $length = (int) $length;
            if ($length < 0) {
                throw new \OutOfBoundsException('Length must be a positive integer');
            }

            $result = substr($this->data, $this->bytePointer, (int) $length);
            $this->bytePointer += $length;
            if ($length > 0) {
                $this->bitPointer = 0;
            }
        }

        return $result;
    }

    /**
     * Read bits from the packet data
     *
     * @param int $length The number of bits to read
     *
     * @return int
     *
     * @throws \OutOfBoundsException When the pointer position is invalid
     * @throws \UnderflowException   When the requested length is less than 1
     * @throws \OverflowException    When the requested length is greater than 32 or the number of remaining bits
     */
    public function readBits($length)
    {
        if ($this->bytePointer >= $this->length) {
            throw new \OutOfBoundsException('Pointer position invalid');
        }

        $length = (int) $length;
        if ($length < 1) {
            throw new \UnderflowException('Bit read length cannot be less than 1');
        } else if ($length > 32) {
            throw new \OverflowException('Bit read length cannot be greater than 32');
        }

        // Get the number of bytes involved in extracting the requested number of bits
        $byteCount = ceil((($length + $this->bitPointer) / 32) * 4);
        if ($byteCount > $this->length - $this->bytePointer) {
            throw new \OverflowException('Bit read length exceeds available data length');
        }

        $result = 0;

        for ($i = 1; $i <= $byteCount; $i++) {
            $byte = ord($this->data[$this->bytePointer]);

            // Get the number of bits to extract from the current byte
            $bits = min(8 - $this->bitPointer, $length);
            $length -= $bits;

            // Get the number of bits on the rhs of the bits we are extracting from this byte
            $rightAlign = (7 - ($this->bitPointer + $bits - 1));

            // Create a mask where only the bits we are interested in are set
            $mask = (0xff >> (8 - $bits)) << $rightAlign;

            // Extract the relevant bits, shift into the right position and update the result
            $result |= (($byte & $mask) >> $rightAlign) << $length;

            // Remove the extracted bits from the data
            $this->data[$this->bytePointer] = chr($byte & ~$mask);

            $this->bitPointer += $bits;
            if ($this->bitPointer === 8) {
                $this->bitPointer = 0;
                $this->bytePointer++;
            }
        }

        return $result;
    }

    /**
     * Append data to the packet
     *
     * @param string $data The data to append
     *
     * @return int The number of bytes written
     */
    public function write($data)
    {
        $length = strlen($data);

        $this->data .= $data;
        $this->length += $length;

        return $length;
    }

    /**
     * Get the bit pointer index
     *
     * @return int
     */
    public function getBitPointer()
    {
        return $this->bitPointer;
    }

    /**
     * Get the byte pointer index
     *
     * @return int
     */
    public function getBytePointer()
    {
        return $this->bytePointer;
    }

    /**
     * Get the data length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Get the number of remaining bytes from the pointer position
     *
     * @return int
     */
    public function getBytesRemaining()
    {
        return $this->length - $this->bytePointer;
    }
}
