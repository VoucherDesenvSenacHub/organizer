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
trait AngleTrait
{
    /**
     * Rotate image 90 degrees clockwise.
     *
     */
    public static function deg90(): static
    {
        return static::createWithDegree(Degree::DEG_90);
    }

    /**
     * Rotate image 180 degrees.
     *
     */
    public static function deg180(): static
    {
        return static::createWithDegree(Degree::DEG_180);
    }

    /**
     * Rotate image 90 degrees counterclockwise.
     *
     */
    public static function deg270(): static
    {
        return static::createWithDegree(Degree::DEG_270);
    }

    /**
     * Rotate an image by the given degrees.
     *
     * @param int|array $degree Given degrees. (Range: 0 to 360, Default: 0).
     *
     */
    public static function byAngle(...$degree): static
    {
        return static::createWithDegree(...$degree);
    }
}
