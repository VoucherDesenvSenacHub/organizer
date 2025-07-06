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
 * Trait PlaybackEffectTrait
 *
 * @api
 */
trait PlaybackEffectTrait
{
    /**
     * Changes the speed of the video playback.
     *
     * @param int|null $rate The percentage change of speed. Positive numbers speed up the playback, negative numbers
     *                   slow down the playback (Range: -50 to 100, Server default: 0).
     *
     */
    public static function accelerate(?int $rate = null): Accelerate
    {
        return new Accelerate($rate);
    }

    /**
     * Causes a video clip to play forwards and then backwards.
     *
     * Use in conjunction with trimming qualifiers ('duration', 'start_offset', or 'end_offset') and the 'loop' effect
     * to deliver a classic (short, repeating) boomerang clip.
     * For details and examples, see 'Boomerang' in the Video Transformations guide.
     *
     *
     * @see https://cloudinary.com/documentation/video_effects_and_enhancements#boomerang
     */
    public static function boomerang(): EffectAction
    {
        return EffectAction::named(PlaybackEffect::BOOMERANG);
    }

    /**
     * Delivers a video that contains additional loops of the video.
     *
     * The total number of iterations is the number of additional loops plus one.
     *
     * For animated images (GIF), see Animated::edit()->loop().
     *
     * @param int|null $additionalIterations The additional number of times to play the video.
     *
     */
    public static function loop(?int $additionalIterations = null): Loop
    {
        return new Loop($additionalIterations);
    }

    /**
     * Plays the video or audio file in reverse.
     *
     */
    public static function reverse(): EffectAction
    {
        return EffectAction::named(PlaybackEffect::REVERSE);
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

    /**
     * Indicates that the video overlay is to be used as a transition between the base and second video.
     *
     */
    public static function transition(): EffectAction
    {
        return  EffectAction::named(PlaybackEffect::TRANSITION);
    }
}
