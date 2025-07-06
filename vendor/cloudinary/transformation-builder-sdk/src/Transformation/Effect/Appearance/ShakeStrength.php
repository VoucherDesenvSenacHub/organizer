<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation;

/**
 * Class ShakeStrength
 */
class ShakeStrength
{
    public const PIXELS_16 = 16;
    public const PIXELS_32 = 32;
    public const PIXELS_48 = 48;
    public const PIXELS_64 = 64;

    /**
     * Shake strength 16.
     *
     */
    public static function pixels16(): int
    {
        return self::PIXELS_16;
    }
    /**
     * Shake strength 32.
     *
     */
    public static function pixels32(): int
    {
        return self::PIXELS_32;
    }
    /**
     * Shake strength 48.
     *
     */
    public static function pixels48(): int
    {
        return self::PIXELS_48;
    }
    /**
     * Shake strength 64.
     *
     */
    public static function pixels64(): int
    {
        return self::PIXELS_64;
    }
}
