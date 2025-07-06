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
 * Trait TranscodeTrait
 *
 * @api
 */
trait TranscodeTrait
{
    /**
     * Controls the video codec.
     *
     * @param string|VideoCodec $codec The video codec.
     *
     *
     * @see BitRate
     */
    public static function videoCodec(string|VideoCodec $codec): BitRate
    {
        return ClassUtils::verifyInstance($codec, VideoCodec::class);
    }

    /**
     * Converts a video to animated image.
     *
     *
     *
     * @see BitRate
     */
    public static function toAnimated($animatedImageFormat = null): ToAnimatedAction
    {
        return ClassUtils::forceInstance($animatedImageFormat, ToAnimatedAction::class);
    }
}
