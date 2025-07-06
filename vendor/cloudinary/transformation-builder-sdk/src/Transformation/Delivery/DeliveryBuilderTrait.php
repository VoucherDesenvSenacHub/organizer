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

/**
 * Trait DeliveryBuilderTrait
 *
 * @api
 */
trait DeliveryBuilderTrait
{
    use ColorSpaceQualifierTrait;

    /**
     * Sets the file format.
     *
     * @param string|Format|mixed $format The file format.
     *
     */
    public static function format(mixed $format): Format
    {
        return ClassUtils::verifyInstance($format, Format::class);
    }

    /**
     * Controls the compression quality for images and videos.
     *
     * Reducing the quality is a trade-off between visual quality and file size.
     *
     * @param int|Quality|mixed $level  The level of the quality. (Range 1 to 100)
     * @param string|null       $preset A set level of automatic quality.  Use the constants defined in the
     *                                  QualityQualifier class.
     *
     *
     * @see QualityQualifier
     */
    public static function quality(mixed $level, ?string $preset = null): Quality
    {
        return ClassUtils::verifyInstance($level, Quality::class, null, $preset);
    }

    /**
     * Deliver the image in the specified device pixel ratio.
     *
     * @param int|float|string|Dpr $dpr The DPR (Device Pixel Ratio). Any positive float value.
     *
     */
    public static function dpr(int|float|string|Dpr $dpr): Dpr
    {
        return ClassUtils::verifyInstance($dpr, Dpr::class);
    }

    /**
     * Controls the density to use when delivering an image or when converting a vector file such as a PDF or EPS
     * document to a web image delivery format.
     *
     * @param int|float|string $density The density in dpi.
     *
     */
    public static function density(int|float|string $density): Density
    {
        return ClassUtils::verifyInstance($density, Density::class);
    }

    /**
     * Uses the specified public ID of a placeholder image if the requested image or social network picture does
     * not exist. The name of the placeholder image must include the file extension.
     *
     * @param string|DefaultImage $defaultImage The public ID with extension of the placeholder image.
     *
     *
     * @see DefaultImage
     */
    public static function defaultImage(DefaultImage|string $defaultImage): DefaultImage
    {
        return ClassUtils::verifyInstance($defaultImage, DefaultImage::class);
    }
}
