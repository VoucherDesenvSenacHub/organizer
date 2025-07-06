<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument\Text;

/**
 * Class FontWeight
 */
class FontWeight
{
    public const THIN = 'thin';
    public const EXTRA_LIGHT = 'extralight';
    public const LIGHT       = 'light';
    public const NORMAL = 'normal';
    public const BOOK   = 'book';
    public const MEDIUM = 'medium';
    public const DEMIBOLD = 'demibold';
    public const SEMIBOLD = 'semibold';
    public const BOLD     = 'bold';
    public const EXTRABOLD = 'extrabold';
    public const ULTRABOLD = 'ultrabold';
    public const BLACK     = 'black';
    public const HEAVY = 'heavy';

    /**
     * Font weight thin.
     *
     */
    public static function thin(): string
    {
        return self::THIN;
    }

    /**
     * Font weight extraLight.
     *
     */
    public static function extraLight(): string
    {
        return self::EXTRA_LIGHT;
    }

    /**
     * Font weight light.
     *
     */
    public static function light(): string
    {
        return self::LIGHT;
    }

    /**
     * Font weight normal.
     *
     */
    public static function normal(): string
    {
        return self::NORMAL;
    }

    /**
     * Font weight book.
     *
     */
    public static function book(): string
    {
        return self::BOOK;
    }

    /**
     * Font weight medium.
     *
     */
    public static function medium(): string
    {
        return self::MEDIUM;
    }

    /**
     * Font weight demibold.
     *
     */
    public static function demibold(): string
    {
        return self::DEMIBOLD;
    }

    /**
     * Font weight semibold.
     *
     */
    public static function semibold(): string
    {
        return self::SEMIBOLD;
    }

    /**
     * Font weight bold.
     *
     */
    public static function bold(): string
    {
        return self::BOLD;
    }

    /**
     * Font weight extrabold.
     *
     */
    public static function extrabold(): string
    {
        return self::EXTRABOLD;
    }

    /**
     * Font weight ultrabold.
     *
     */
    public static function ultrabold(): string
    {
        return self::ULTRABOLD;
    }

    /**
     * Font weight black.
     *
     */
    public static function black(): string
    {
        return self::BLACK;
    }

    /**
     * Font weight heavy.
     *
     */
    public static function heavy(): string
    {
        return self::HEAVY;
    }
}
