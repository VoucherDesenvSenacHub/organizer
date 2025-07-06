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
 * Trait CropTrait
 *
 * @api
 */
trait CropTrait
{
    /**
     * Extracts a region of the given width and height out of the original image.
     *
     * @param mixed $width   The required width of a transformed asset.
     * @param mixed $height  The required height of a transformed asset.
     * @param mixed $gravity Which part of the original image to include.
     * @param mixed $x       Horizontal position for custom-coordinates based cropping
     * @param mixed $y       Vertical position for custom-coordinates based cropping
     *
     */
    public static function crop(
        mixed $width = null,
        mixed $height = null,
        mixed $gravity = null,
        mixed $x = null,
        mixed $y = null
    ): Crop {
        return static::createCrop(CropMode::CROP, $width, $height, $gravity, $x, $y);
    }

    /**
     * The thumb cropping mode is specifically used for creating image thumbnails from either face or custom
     * coordinates, and must always be accompanied by the gravity qualifier set to one of the face detection or custom
     * values.
     *
     * @param mixed $width   The required width of a transformed asset.
     * @param mixed $height  The required height of a transformed asset.
     * @param mixed $gravity Which part of the original image to include.
     * @param mixed $x       Horizontal position for custom-coordinates based cropping
     * @param mixed $y       Vertical position for custom-coordinates based cropping
     *
     */
    public static function thumbnail(
        mixed $width = null,
        mixed $height = null,
        mixed $gravity = null,
        mixed $x = null,
        mixed $y = null
    ): Crop {
        return static::createCrop(CropMode::THUMBNAIL, $width, $height, $gravity, $x, $y);
    }

    /**
     * Automatically determines the best crop based on the gravity and specified dimensions.
     *
     * If the requested dimensions are smaller than the best crop, the result is downscaled.
     * If the requested dimensions are larger than the original image, the result is upscaled.
     * Use this mode in conjunction with the g (gravity) parameter.
     *
     * @param mixed            $width   The required width of a transformed asset.
     * @param mixed            $height  The required height of a transformed asset.
     * @param AutoGravity|null $gravity Which part of the original image to include.
     *
     */
    public static function auto(
        mixed $width = null,
        mixed $height = null,
        ?AutoGravity $gravity = null
    ): Crop {
        return static::createCrop(CropMode::AUTO, $width, $height, $gravity);
    }

    /**
     * Creates Crop instance.
     *
     *
     */
    protected static function createCrop(...$args): Crop
    {
        return new Crop(...$args);
    }
}
