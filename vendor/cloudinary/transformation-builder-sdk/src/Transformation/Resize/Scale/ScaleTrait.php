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
 * Trait ScaleTrait
 *
 * @api
 */
trait ScaleTrait
{
    /**
     * Change the size of the image exactly to the given width and height without necessarily retaining the original
     * aspect ratio: all original image parts are visible but might be stretched or shrunk.
     *
     * @param mixed $width       The required width of a transformed asset.
     * @param mixed $height      The required height of a transformed asset.
     * @param mixed $aspectRatio Resizes the asset to a new aspect ratio.
     *
     */
    public static function scale(mixed $width = null, mixed $height = null, mixed $aspectRatio = null): Scale
    {
        return static::createScale(CropMode::SCALE, $width, $height, $aspectRatio);
    }

    /**
     * The image is resized so that it takes up as much space as possible within a bounding box defined by the given
     * width and height qualifiers. The original aspect ratio is retained and all of the original image is visible.
     *
     * @param mixed $width       The required width of a transformed asset.
     * @param mixed $height      The required height of a transformed asset.
     * @param mixed $aspectRatio Resizes the asset to a new aspect ratio.
     *
     */
    public static function fit(
        mixed $width = null,
        mixed $height = null,
        mixed $aspectRatio = null
    ): Scale {
        return static::createScale(CropMode::FIT, $width, $height, $aspectRatio);
    }

    /**
     * Same as the Scale::fit mode but only if the original image is larger than the given limit (width and
     * height), in which case the image is scaled down so that it takes up as much space as possible within a bounding
     * box defined by the given width and height qualifiers. The original aspect ratio is retained and all of the
     * original image is visible.
     *
     * @param mixed $width       The required width of a transformed asset.
     * @param mixed $height      The required height of a transformed asset.
     * @param mixed $aspectRatio Resizes the asset to a new aspect ratio.
     *
     *
     * @see Scale::fit
     */
    public static function limitFit(
        mixed $width = null,
        mixed $height = null,
        mixed $aspectRatio = null
    ): Scale {
        return static::createScale(CropMode::LIMIT_FIT, $width, $height, $aspectRatio);
    }

    /**
     * Same as the Scale::fit mode but only if the original image is smaller than the given minimum (width and
     * height), in which case the image is scaled up so that it takes up as much space as possible within a bounding
     * box defined by the given width and height qualifiers. The original aspect ratio is retained and all of the
     * original image is visible.
     *
     * @param mixed $width       The required width of a transformed asset.
     * @param mixed $height      The required height of a transformed asset.
     * @param mixed $aspectRatio Resizes the asset to a new aspect ratio.
     *
     *
     * @see Scale::fit
     */
    public static function minimumFit(
        mixed $width = null,
        mixed $height = null,
        mixed $aspectRatio = null
    ): Scale {
        return static::createScale(CropMode::MINIMUM_FIT, $width, $height, $aspectRatio);
    }

    /**
     *
     *
     * @internal
     */
    protected static function createScale(...$args): Scale
    {
        return new Scale(...$args);
    }
}
