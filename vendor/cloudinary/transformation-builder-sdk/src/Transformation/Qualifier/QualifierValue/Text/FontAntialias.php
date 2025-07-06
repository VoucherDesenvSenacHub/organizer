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
 * Class fontAntialias
 */
class FontAntialias
{
    /**
     * Use a bi-level alpha mask.
     */
    public const NONE = 'none';

    /**
     * Perform single-color antialiasing. For example, using shades of gray for black text on a white background.
     */
    public const GRAY = 'gray';

    /**
     * Perform antialiasing by taking advantage of the order of subpixel elements on devices such as LCD panels.
     */
    public const SUBPIXEL = 'subpixel';

    /**
     * Some antialiasing is performed, but speed is prioritized over quality.
     */
    public const FAST = 'fast';

    /**
     * Antialiasing that balances quality and performance.
     */
    public const GOOD = 'good';

    /**
     * Renders at the highest quality, sacrificing speed if necessary.
     */
    public const BEST = 'best';

    /**
     * Use a bi-level alpha mask.
     *
     */
    public static function none(): string
    {
        return self::NONE;
    }

    /**
     * Perform single-color antialiasing. For example, using shades of gray for black text on a white background.
     *
     */
    public static function gray(): string
    {
        return self::GRAY;
    }

    /**
     * Perform antialiasing by taking advantage of the order of subpixel elements on devices such as LCD panels.
     *
     */
    public static function subpixel(): string
    {
        return self::SUBPIXEL;
    }

    /**
     * Some antialiasing is performed, but speed is prioritized over quality.
     *
     */
    public static function fast(): string
    {
        return self::FAST;
    }

    /**
     * Antialiasing that balances quality and performance.
     *
     */
    public static function good(): string
    {
        return self::GOOD;
    }

    /**
     * Renders at the highest quality, sacrificing speed if necessary.
     *
     */
    public static function best(): string
    {
        return self::BEST;
    }
}
