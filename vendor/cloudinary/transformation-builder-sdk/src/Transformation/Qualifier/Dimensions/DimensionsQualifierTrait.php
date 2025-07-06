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

use Cloudinary\ClassUtils;
use Cloudinary\Transformation\Qualifier\Dimensions\Dpr;
use Cloudinary\Transformation\Qualifier\Dimensions\Height;
use Cloudinary\Transformation\Qualifier\Dimensions\Width;

/**
 * Trait DimensionsQualifierTrait
 *
 * @api
 */
trait DimensionsQualifierTrait
{
    /**
     * Sets the width of the asset.
     *
     * @param float|int|string|null $width The width in pixels (if an integer is specified) or as a percentage
     *                                     (if a float is specified).
     *
     *
     * @see Width
     */
    public static function width(float|int|string|null $width): Width
    {
        return new Width($width);
    }

    /**
     * Sets the height of the asset.
     *
     * @param float|int|string|null $height The height in pixels (if an integer is specified) or as a percentage
     *                                      (if a float is specified).
     *
     *
     * @see Height
     */
    public static function height(float|int|string|null $height): Height
    {
        return new Height($height);
    }

    /**
     * Sets the aspect ratio of the asset.
     *
     * @param float|array $aspectRatio The new aspect ratio, specified as a percentage or ratio.
     *
     *
     * @see \Cloudinary\Transformation\Qualifier\Dimensions\AspectRatio
     */
    public static function aspectRatio(...$aspectRatio): AspectRatio
    {
        return new AspectRatio(...$aspectRatio);
    }

    /**
     * Sets the device pixel ratio.
     *
     * @param float $dpr The device pixel ratio.
     *
     *
     * @see Dpr
     */
    public static function dpr(int|float|string|Dpr $dpr): Dpr
    {
        return ClassUtils::verifyInstance($dpr, Dpr::class);
    }
}
