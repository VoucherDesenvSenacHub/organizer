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
 * Trait ImageQualifierTransformationTrait
 *
 * @api
 */
trait ImageQualifierTransformationTrait
{
    /**
     * Sets the delay between frames of an animated image in milliseconds.
     *
     *
     */
    public function delay(Delay|int $delay): static
    {
        return $this->addAction(ClassUtils::verifyInstance($delay, Delay::class));
    }

    /**
     * Default images can be used in the case that a requested image does not exist.
     *
     * @param string $defaultImage Default image public ID
     *
     */
    public function defaultImage(string $defaultImage): static
    {
        return $this->addAction(ClassUtils::verifyInstance($defaultImage, DefaultImage::class));
    }

    /**
     * Controls the density to use when delivering an image or when converting a vector file such as a PDF or EPS
     * document to a web image delivery format.
     *
     * @param int|string $density The density in dpi.
     *
     */
    public function density(int|string $density): static
    {
        return $this->addAction(ClassUtils::verifyInstance($density, Density::class));
    }

    /**
     * Prevents style class names collisions for sprite generation.
     *
     * @param string $prefix The style class name prefix.
     *
     */
    public function prefix(string $prefix): static
    {
        return $this->addAction(ClassUtils::verifyInstance($prefix, Prefix::class));
    }
}
