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
 * Trait CropModeTrait
 *
 * @api
 */
trait ResizeQualifierTrait
{
    /**
     * Sets the crop mode.
     *
     * @param string $cropModeName The crop mode.  Use the constants defined in the CropMode class.
     *
     *
     * @see CropMode
     */
    public static function cropMode(string $cropModeName): CropMode
    {
        return new CropMode($cropModeName);
    }

    /**
     * Controls how much of the original image surrounding the face to keep when using either the 'crop' or 'thumb'
     * cropping modes with face detection.
     *
     * @param float $zoom The zoom factor. (Default: 1.0)
     *
     */
    public static function zoom(float $zoom): Zoom
    {
        return new Zoom($zoom);
    }
}
