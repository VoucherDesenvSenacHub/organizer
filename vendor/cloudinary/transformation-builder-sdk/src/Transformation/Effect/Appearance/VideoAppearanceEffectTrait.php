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
 * Trait VideoAppearanceEffectTrait
 *
 * @api
 */
trait VideoAppearanceEffectTrait
{
    /**
     * Removes small motion shifts from the video. with a maximum extent of movement in the horizontal and vertical
     * direction of 32 pixels
     *
     * @param int|null $shakeStrength The maximum number of pixels in the horizontal and vertical direction that will be
     *                           addressed. (Possible values: 16, 32, 48, 64. Server default: 16)
     *
     */
    public static function deshake(?int $shakeStrength = null): Deshake
    {
        return ClassUtils::forceInstance($shakeStrength, Deshake::class);
    }

    /**
     * Fade in at the beginning of the video.
     *
     * For details and examples, see 'Fade in and out' in the Video Transformations guide.
     *
     * @param int|null $duration The time in ms for the fade to occur. (Server default: 1000)
     *
     *
     * @see https://cloudinary.com/documentation/video_effects_and_enhancements#fade_in_out
     */
    public static function fadeIn(?int $duration = null): DurationEffectAction
    {
        return EffectAction::withDuration(AppearanceEffect::FADE, $duration);
    }

    /**
     *  Fade out at the end of the video.
     *
     * For details and examples, see 'Fade in and out' in the Video Transformations guide.
     *
     * @param int|null $duration The time in ms for the fade to occur.
     *
     *
     * @see https://cloudinary.com/documentation/video_effects_and_enhancements#fade_in_out
     */
    public static function fadeOut(?int $duration = null): DurationEffectAction
    {
        return EffectAction::withDuration(AppearanceEffect::FADE, $duration, true);
    }

    /**
     * Adds visual noise to the video, visible as a random flicker of "dots" or "snow".
     *
     * @param int|null $percentage The percent of noise to apply. (Range: 0 to 100 Server default: 0)
     *
     */
    public static function noise(?int $percentage = null): EffectAction
    {
        return EffectAction::withLevel(AppearanceEffect::NOISE, EffectRange::PERCENT, $percentage);
    }
}
