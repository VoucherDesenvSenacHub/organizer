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
 * Trait FillTrait
 *
 * @api
 */
trait FillTrait
{
    /**
     * Creates an image with the exact given width and height without distorting the image.
     *
     * This option first scales up or down as much as needed to at least fill both of the given dimensions. If the
     * requested aspect ratio is different than the original, cropping will occur on the dimension that exceeds the
     * requested size after scaling.
     *
     * @param float|int|string|null $width   The required width of a transformed asset.
     * @param float|int|null        $height  The required height of a transformed asset.
     * @param GravityQualifier|null $gravity Which part of the original image to include when the resulting image is
     *                                       smaller than the original or the proportions do not match.
     *
     */
    public static function fill(
        float|int|string|null $width = null,
        float|int|null $height = null,
        ?GravityQualifier $gravity = null
    ): Fill {
        return static::createFill(CropMode::FILL, $width, $height, $gravity);
    }

    /**
     * Same as the Fill::fill mode, but only if the original image is larger than the specified resolution
     * limits, in which case the image is scaled down to fill the given width and height without distorting the image,
     * and then the dimension that exceeds the request is cropped.
     *
     * If the original dimensions are smaller than the requested size, it is not resized at all.
     *
     * This prevents upscaling.
     *
     * @param float|int|string|null $width   The required width of a transformed asset.
     * @param float|int|null        $height  The required height of a transformed asset.
     * @param GravityQualifier|null $gravity Which part of the original image to include when the resulting image is
     *                                       smaller than the original or the proportions do not match.
     *
     *
     * @see Fill::fill
     */
    public static function limitFill(
        float|int|string|null $width = null,
        float|int|null $height = null,
        ?GravityQualifier $gravity = null
    ): Fill {
        return static::createFill(CropMode::LIMIT_FILL, $width, $height, $gravity);
    }

    /**
     * Creates Fill instance.
     *
     *
     *
     * @internal
     */
    protected static function createFill(...$args): Fill
    {
        return new Fill(...$args);
    }
}
