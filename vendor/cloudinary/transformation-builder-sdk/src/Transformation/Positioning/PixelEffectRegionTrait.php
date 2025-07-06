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
 * Trait PixelEffectRegionTrait
 */
trait PixelEffectRegionTrait
{
    /**
     * Sets the faces region.
     *
     */
    public static function faces(): Region
    {
        return (new Region())->gravity(Gravity::faces());
    }

    /**
     * Sets the OCR region.
     *
     */
    public static function ocr(): Region
    {
        return (new Region())->gravity(Gravity::ocr());
    }

    /**
     * Sets the custom region.
     *
     * @param int|string|null $x
     * @param int|string|null $y
     * @param int|string|null $width
     * @param int|string|null $height
     *
     * @return Region
     */
    public static function custom(
        int|string|null $x = null,
        int|string|null $y = null,
        int|string|null $width = null,
        int|string|null $height = null
    ): Region {
        return new Region($x, $y, $width, $height);
    }

    /**
     * Returns the rectangle region.
     *
     * @param int|null $x      X.
     * @param int|null $y      Y.
     * @param int|null $width  Width.
     * @param int|null $height Height.
     *
     */
    public static function rectangle(
        ?int $x = null,
        ?int $y = null,
        ?int $width = null,
        ?int $height = null
    ): RectangleRegion {
        return new RectangleRegion($x, $y, $width, $height);
    }
}
