<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Class JsonUtils
 *
 * @internal
 */
class JsonUtils
{
    /**
     * Determines whether the input is a valid JSON string.
     *
     * @param mixed $string The input string.
     *
     */
    public static function isJsonString(mixed $string): bool
    {
        return is_string($string)
               && is_array(json_decode($string, true)) //TODO: improve performance
               && json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * Wrapper around json_decode, throws exception on error.
     *
     * @param mixed $json    JSON to decode.
     * @param bool  $assoc   Whether to convert object to an array.
     * @param int   $depth   Maximum depth.
     * @param int   $options Additional options.
     *
     *
     * @throws InvalidArgumentException
     *
     * @see json_decode
     */
    public static function decode(mixed $json, bool $assoc = true, int $depth = 512, int $options = 0): mixed
    {
        if (is_array($json)) { // Already a json array, skip decoding.
            return $json;
        }

        $result = json_decode($json, $assoc, max(1, $depth), $options);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('JsonException : ' . json_last_error_msg());
        }

        return $result;
    }

    /**
     * Wrapper around json_encode, throws exception on error.
     *
     * @param mixed $value   The value to encode.
     * @param int   $options Additional options.
     *
     *
     * @return false|string
     *
     * @throws InvalidArgumentException
     *
     * @see json_encode
     */
    public static function encode(mixed $value, int $options = 0, int $depth = 512): bool|string
    {
        $result = json_encode($value, $options, max(1, $depth));

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('JsonException : ' . json_last_error_msg());
        }

        return $result;
    }

    /**
     * Wrapper for \JsonSerializable::jsonSerialize, can be called on null or non-objects.
     *
     * @param JsonSerializable|mixed $jsonSerializable The serializable to serialize.
     *
     *
     * @see JsonSerializable::jsonSerialize
     */
    public static function jsonSerialize(mixed $jsonSerializable): mixed
    {
        if ($jsonSerializable === null) {
            return [];
        }

        if (is_array($jsonSerializable)) { // Already a json array, skip serialization
            return $jsonSerializable;
        }

        return $jsonSerializable->jsonSerialize();
    }
}
