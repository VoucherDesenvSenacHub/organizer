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
 * Trait ImaggaTrait
 *
 * @api
 */
trait ImaggaTrait
{
    /**
     * Generates the best cropped version of the original image using the Imagga add-on.
     *
     * If no dimensions specified, Imagga automatically defines the best crop resolution.
     *
     * @see https://cloudinary.com/documentation/imagga_crop_and_scale_addon
     *
     * @param float|int|string|null $width  The required width of a transformed asset.
     * @param float|int|null        $height The required height of a transformed asset.
     *
     */
    public static function imaggaCrop(float|int|string|null $width = null, float|int|null $height = null): Imagga
    {
        return static::createImagga(CropMode::IMAGGA_CROP, $width, $height);
    }

    /**
     * Generates a smartly scaled image that perfectly fits the requested dimensions.
     *
     * @see https://cloudinary.com/documentation/imagga_crop_and_scale_addon
     *
     * @param float|int|string|null $width  The required width of a transformed asset.
     * @param float|int|null        $height The required height of a transformed asset.
     *
     */
    public static function imaggaScale(float|int|string|null $width = null, float|int|null $height = null): Imagga
    {
        return static::createImagga(CropMode::IMAGGA_SCALE, $width, $height);
    }

    /**
     *
     *
     * @internal
     */
    protected static function createImagga(...$args): Imagga
    {
        return new Imagga(...$args);
    }
}
