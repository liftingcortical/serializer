<?php

/*
 * Copyright (c) 2015 Mihai Stancu <stancu.t.mihai@gmail.com>
 *
 * This source file is subject to the license that is bundled with this source
 * code in the LICENSE.md file.
 */

namespace MS\SerializerBundle\Serializer\Encoder;

use CBOR\CBOREncoder as Encoder;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

class CborEncoder implements EncoderInterface, DecoderInterface
{
    const FORMAT = 'cbor';

    /**
     * @return bool
     */
    public static function isInstalled()
    {
        return class_exists('CBOR\CBOREncoder');
    }

    /**
     * @param mixed  $data
     * @param string $format
     * @param array  $context
     *
     * @return string
     */
    public function encode($data, $format, array $context = array())
    {
        return Encoder::encode($data);
    }

    /**
     * @param string $format
     *
     * @return bool
     */
    public function supportsEncoding($format)
    {
        return static::FORMAT === $format;
    }

    /**
     * @param string $data
     * @param string $format
     * @param array  $context
     *
     * @return mixed
     */
    public function decode($data, $format, array $context = array())
    {
        return Encoder::decode($data);
    }

    /**
     * @param string $format
     *
     * @return bool
     */
    public function supportsDecoding($format)
    {
        return static::FORMAT === $format;
    }
}
