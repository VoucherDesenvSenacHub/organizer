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
 * Trait ImageQualifierTrait
 *
 * @api
 */
trait ImageQualifierTrait
{
    /**
     * Default images can be used in the case that a requested image does not exist.
     *
     * @param string $defaultImage Default image public ID
     *
     */
    public static function defaultImage(string $defaultImage): DefaultImage
    {
        return new DefaultImage($defaultImage);
    }

    /**
     * Controls the time delay between the frames of an animated image, in milliseconds.
     *
     * @param int $delay The delay in milliseconds
     *
     */
    public static function delay(int $delay): Delay
    {
        return new Delay($delay);
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
        return new Density($density);
    }

    /**
     * Prevents style class names collisions for sprite generation.
     *
     * @param string $prefix The style class name prefix.
     *
     */
    public static function prefix(string $prefix): Prefix
    {
        return new Prefix($prefix);
    }
}
