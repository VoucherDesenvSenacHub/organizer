<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

/**
 * The available directions for a background gradient fade effect.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#content_aware_padding" target="_blank">
 * Content aware padding</a>
 *
 * @api
 */
class GradientDirection
{
    /**
     * Blend the colors horizontally.
     */
    public const HORIZONTAL = 'horizontal';

    /**
     * Blend the colors vertically.
     */
    public const VERTICAL = 'vertical';

    /**
     * Blend the colors diagonally from top-left to bottom-right.
     */
    public const DIAGONAL_DESC = 'diagonal_desc';

    /**
     * Blend the colors diagonally from bottom-left to top-right.
     */
    public const DIAGONAL_ASC = 'diagonal_asc';

    /**
     * Blend the colors horizontally.
     *
     */
    public static function horizontal(): string
    {
        return self::HORIZONTAL;
    }

    /**
     * Blend the colors vertically.
     *
     */
    public static function vertical(): string
    {
        return self::VERTICAL;
    }

    /**
     * Blend the colors diagonally from top-left to bottom-right.
     *
     */
    public static function diagonalDesc(): string
    {
        return self::DIAGONAL_DESC;
    }

    /**
     * Blend the colors diagonally from bottom-left to top-right.
     *
     */
    public static function diagonalAsc(): string
    {
        return self::DIAGONAL_ASC;
    }
}
