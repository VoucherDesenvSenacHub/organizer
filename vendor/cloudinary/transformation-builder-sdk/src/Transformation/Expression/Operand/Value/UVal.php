<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

use Cloudinary\StringUtils;

/**
 * Defines the supported operators for arithmetic expressions.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/user_defined_variables#arithmetic_expressions" target="_blank">
 * Arithmetic expressions</a>
 *
 *
 * @api
 */
class UVal extends Expression
{
    const STRING_MARKER             = '!';
    const STRING_ARR_DELIM          = ':';

    /**
     * The integer value expression component.
     *
     * @param int $value The int value.
     *
     */
    public static function int(int $value): Expression|UVal
    {
        return self::uVal($value);
    }

    /**
     * The float value expression component.
     *
     * @param float $value The float value.
     *
     */
    public static function float(float $value): UVal
    {
        return self::uVal($value);
    }

    /**
     * The numeric value expression component.
     *
     * @param mixed $value The numeric value. Can be used for aspect ratio, for example "16:9", etc.
     *
     */
    public static function numeric(mixed $value): UVal
    {
        return self::uVal($value);
    }

    /**
     * The string value expression component.
     *
     * @param string $value The string value
     *
     */
    public static function string(string $value): UVal
    {
        return self::uVal(StringUtils::ensureWrappedWith($value, self::STRING_MARKER));
    }

    /**
     * The string array expression component.
     *
     * @param array $array The array of strings.
     *
     */
    public static function stringArray(array $array): UVal
    {
        return self::string(implode(self::STRING_ARR_DELIM, $array));
    }

    /**
     * The asset reference expression component.
     *
     * @param string $publicId The public ID of the file.
     *
     */
    public static function assetReference(string $publicId): UVal
    {
        $publicId = StringUtils::ensureWrappedWith($publicId, self::STRING_MARKER);

        return self::uVal("ref:$publicId");
    }

    /**
     * The context key reference expression component.
     *
     * @param string $contextKey The context key.
     *
     */
    public static function context(string $contextKey): UVal
    {
        $contextKey = StringUtils::ensureWrappedWith($contextKey, self::STRING_MARKER);

        return self::uVal("ctx:$contextKey");
    }

    /**
     * The structured metadata key reference expression component.
     *
     * @param string $metadataKey The structured metadata key.
     *
     */
    public static function metadata(string $metadataKey): UVal
    {
        $metadataKey = StringUtils::ensureWrappedWith($metadataKey, self::STRING_MARKER);

        return self::uVal("md:$metadataKey");
    }

    /**
     * Named constructor.
     *
     * @param mixed $value The value.
     *
     */
    public static function uVal(mixed $value): UVal
    {
        return new self($value);
    }
}
