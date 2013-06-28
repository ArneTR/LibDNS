<?php
/**
 * Creates Question objects
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    Records
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS\Records;

/**
 * Creates Question objects
 *
 * @category   LibDNS
 * @package    Records
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class QuestionFactory
{
    /**
     * Create a new Question object
     *
     * @param int $type The record type
     *
     * @return \LibDNS\Records\Question
     */
    public function create($type)
    {
        return new Question($type);
    }
}
