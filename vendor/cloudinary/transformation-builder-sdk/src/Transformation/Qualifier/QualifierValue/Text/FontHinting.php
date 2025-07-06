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
 * Class FontHinting
 */
class FontHinting
{
    /**
     * Do not hint outlines.
     */
    public const NONE = 'none';

    /**
     * Hint outlines slightly to improve contrast while retaining good fidelity to the original shapes.
     */
    public const SLIGHT = 'slight';

    /**
     * Hint outlines with medium strength, providing a compromise between fidelity to the original shapes and contrast.
     */
    public const MEDIUM = 'medium';

    /**
     * Hint outlines to the maximize contrast.
     */
    public const FULL = 'full';

    /**
     * Do not hint outlines.
     *
     */
    public static function none(): string
    {
        return self::NONE;
    }

    /**
     * Hint outlines slightly to improve contrast while retaining good fidelity to the original shapes.
     *
     */
    public static function slight(): string
    {
        return self::SLIGHT;
    }

    /**
     * Hint outlines with medium strength, providing a compromise between fidelity to the original shapes and contrast.
     *
     */
    public static function medium(): string
    {
        return self::MEDIUM;
    }

    /**
     * Hint outlines to the maximize contrast.
     *
     */
    public static function full(): string
    {
        return self::FULL;
    }
}
