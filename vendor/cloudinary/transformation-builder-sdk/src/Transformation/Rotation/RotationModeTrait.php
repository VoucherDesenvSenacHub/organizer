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
 * Trait AngleTrait
 *
 * @api
 */
trait RotationModeTrait
{
    /**
     * Rotate image 90 degrees clockwise only if the requested aspect ratio does not match the image's aspect ratio.
     *
     */
    public static function autoRight(): static
    {
        return static::createWithMode(RotationMode::AUTO_RIGHT);
    }

    /**
     * Rotate image 90 degrees counterclockwise only if the requested aspect ratio does not match the image's aspect
     * ratio.
     *
     */
    public static function autoLeft(): static
    {
        return static::createWithMode(RotationMode::AUTO_LEFT);
    }

    /**
     * Vertical mirror flip of the image.
     *
     */
    public static function verticalFlip(): static
    {
        return static::createWithMode(RotationMode::VERTICAL_FLIP);
    }

    /**
     * Horizontal mirror flip of the image.
     *
     */
    public static function horizontalFlip(): static
    {
        return static::createWithMode(RotationMode::HORIZONTAL_FLIP);
    }

    /**
     * By default, the image is automatically rotated according to the EXIF data stored by the camera when the image
     * was taken. Set the angle to 'ignore' if you do not want the image to be automatically rotated.
     *
     */
    public static function ignore(): static
    {
        return static::createWithMode(RotationMode::IGNORE);
    }

    /**
     * Rotate an image using the given mode.
     *
     * @param string|RotationMode|array $mode Given rotation mode.
     *
     */
    public static function mode(...$mode): static
    {
        return static::createWithMode(...$mode);
    }
}
