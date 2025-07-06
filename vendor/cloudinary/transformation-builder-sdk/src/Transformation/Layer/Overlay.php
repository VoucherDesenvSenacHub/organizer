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
 * Class Overlay
 *
 * @package Cloudinary\Transformation
 */
abstract class Overlay
{
    public static function source($source): MediaOverlay
    {
        return ClassUtils::verifyInstance($source, BaseSourceContainer::class, MediaOverlay::class);
    }

    public static function imageSource($source): ImageOverlay
    {
        return ClassUtils::verifyInstance($source, BasePositionalSourceContainer::class, ImageOverlay::class);
    }

    public static function videoSource($source): VideoOverlay
    {
        return ClassUtils::verifyInstance($source, BasePositionalSourceContainer::class, VideoOverlay::class);
    }

    public static function audioSource($source): AudioOverlay
    {
        return ClassUtils::verifyInstance($source, BaseSourceContainer::class, AudioOverlay::class);
    }
}
