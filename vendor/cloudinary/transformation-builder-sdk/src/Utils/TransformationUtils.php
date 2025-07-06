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


/**
 * Class TransformationUtils
 *
 * @internal
 */
class TransformationUtils
{
    /**
     * Converts a float value to the string representation.
     */
    public static function floatToString(mixed $value): mixed
    {
        if (! is_float($value)) {
            return $value;
        }

        // Ensure that trailing decimal(.0) part is not cropped when float is provided.
        // e.g. float 1.0 should be returned as "1.0" and not "1" as it happens by default.
        if ($value - (int)$value === 0.0) {
            return sprintf('%.1f', $value);
        }

        $locale = localeconv();
        $string = (string)$value;

        return str_replace($locale['decimal_point'], '.', $string);
    }

    /**
     * Helper method for converting boolean to int representation as string.
     *
     * @param mixed $value Candidate to convert. If not boolean, returned as is
     *
     */
    public static function boolToIntString(mixed $value): mixed
    {
        return self::boolToString($value, '1', '0');
    }

    /**
     * Helper method for converting boolean to any representation as string.
     *
     * @param mixed $value Candidate to convert. If not boolean, returned as is
     *
     */
    public static function boolToString(
        mixed $value,
        ?string $trueString = 'true',
        ?string $falseString = 'false'
    ): mixed {
        return is_bool($value) ? ($value ? $trueString : $falseString) : $value;
    }


    /**
     * Converts bytes to kilobytes.
     *
     * @param int $bytes The input value to convert.
     *
     */
    public static function bytesToKB(int $bytes): int
    {
        return (int)ceil($bytes / 1024);
    }

    /**
     * Used for formatting number to string with sign (+/-).
     *
     * @param int $number The number to format
     *
     */
    public static function formatSigned(int $number): string
    {
        return $number > 0 ? "+$number" : (string)$number;
    }
}
