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
 * Trait VideoEditBuilderTrait
 *
 * @api
 */
trait VideoEditBuilderTrait
{
    /**
     * Trims a video (and discards the rest).
     *
     * @param mixed|null $startOffset
     * @param mixed|null $endOffset
     * @param mixed|null $duration
     *
     *
     * @see https://cloudinary.com/documentation/video_trimming_and_concatenating#trimming_videos
     */
    public static function trim(mixed $startOffset = null, mixed $endOffset = null, mixed $duration = null): Timeline
    {
        return ClassUtils::forceVarArgsInstance([$startOffset, $endOffset, $duration], Timeline::class);
    }

    /**
     * Concatenates another video or image.
     *
     * @param string|VideoSource $videoSource The source to concatenate.
     *
     *
     * @see https://cloudinary.com/documentation/video_trimming_and_concatenating#concatenating_media
     */
    public static function concatenate(string|VideoSource $videoSource): Concatenate
    {
        return ClassUtils::verifyInstance($videoSource, Concatenate::class);
    }

    /**
     * Generates an excerpt of the video based on Cloudinary's AI-powered preview algorithm, which identifies the
     * most interesting video chunks from a video and uses these to generate a video preview.
     *
     * @param int|null $duration The duration of the excerpt in seconds (Server default: 5 seconds).
     *
     */
    public static function preview(?int $duration = null): Preview
    {
        return ClassUtils::forceInstance($duration, Preview::class);
    }

    /**
     * Increases or decreases the volume by a percentage of the current volume.
     *
     * Also see \Cloudinary\Transformation\Volume for different ways to change the volume.
     *
     * @param int|Volume $level The percentage change of volume (Range: -100 to 400).
     *
     *
     * @see Volume
     */
    public static function volume(Volume|int $level): EffectAction
    {
        return EffectAction::fromEffectQualifier(ClassUtils::verifyInstance($level, Volume::class));
    }
}
