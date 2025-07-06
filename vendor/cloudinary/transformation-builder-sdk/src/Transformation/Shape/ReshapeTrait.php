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

/**
 * Trait ReshapeTrait
 *
 * @api
 */
trait ReshapeTrait
{
    /**
     * Distorts the image to a new shape by adjusting its corners to achieve perception warping.
     *
     * Specify four PointValue objects, representing the new coordinates for each of the image's four corners,
     * in clockwise order from the top-left corner. For examples, see the Image Transformations guide.
     *
     * @param array $args The new coordinates of the image's corners.
     *
     * @see Distort
     *
     *
     * @see https://cloudinary.com/documentation/effects_and_artistic_enhancements#distort
     */
    public static function distort(...$args): Distort
    {
        return ClassUtils::verifyVarArgsInstance($args, Distort::class);
    }

    /**
     * Distorts the image to an arc shape.
     *
     * For examples, see the Image Transformations guide.
     *
     * @param float|string|mixed $degree The angle of distortion.  Positive values curve the image upwards (like a
     *                                   frown). Negative values curve the image downwards (like a smile).
     *
     *
     *
     * @see https://cloudinary.com/documentation/effects_and_artistic_enhancements#distort
     */
    public static function distortArc(mixed $degree): EffectAction
    {
        if ($degree instanceof EffectAction) {
            return $degree;
        }

        return EffectAction::limited(ReshapeQualifier::DISTORT_ARC, EffectRange::ANGLE, $degree);
    }

    /**
     * Removes the edges of the image based on the color of the corner pixels.
     *
     * Specify a color other than the color of the corner pixels using the colorOverride() method of the
     * \Cloudinary\Transformation\TrimEffect class.
     *
     * @param int|null $tolerance The tolerance level for color similarity.  (Range: 0 to 100, Server default: 10)
     *
     *
     * @see TrimEffect
     *
     */
    public static function trim(?int $tolerance = null): TrimEffect
    {
        return ClassUtils::forceInstance($tolerance, TrimEffect::class);
    }

    /**
     * Skews the image according to the two specified values in degrees.
     *
     * @param float|int|null $skewX The angle of skew on the x-axis in degrees.
     * @param float|int|null $skewY The angle of skew on the y-axis in degrees.
     *
     * @see Shear
     *
     */
    public static function shear(float|int|null $skewX = null, float|int|null $skewY = null): Shear
    {
        return new Shear($skewX, $skewY);
    }

    /**
     * Trims pixels according to the transparency levels of a given overlay image.
     *
     * @param string|BaseSource              $source   The public ID of the image overlay.
     * @param AbsolutePosition|Position|null $position The position of the overlay with respect to the base image.
     *
     *
     * @see CutByImage
     */
    public static function cutByImage(
        BaseSource|string $source,
        Position|AbsolutePosition|null $position = null
    ): CutByImage {
        return new CutByImage($source, $position);
    }
}
