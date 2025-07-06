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
 * Class OutlineMode
 */
abstract class OutlineMode
{
    public const INNER = 'inner';
    public const INNER_FILL = 'inner_fill';
    public const OUTER      = 'outer';
    public const FILL  = 'fill';

    /**
     * Outline mode inner.
     *
     */
    public static function inner(): string
    {
        return self::INNER;
    }

    /**
     * Outline mode inner fill.
     *
     */
    public static function innerFill(): string
    {
        return self::INNER_FILL;
    }

    /**
     * Outline mode outer.
     *
     */
    public static function outer(): string
    {
        return self::OUTER;
    }

    /**
     * Outline mode fill.
     *
     */
    public static function fill(): string
    {
        return self::FILL;
    }
}
