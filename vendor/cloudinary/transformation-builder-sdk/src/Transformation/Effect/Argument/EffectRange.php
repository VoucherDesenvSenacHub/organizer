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
 * Class EffectRange
 *
 * @internal
 */
class EffectRange
{
    public const PERCENT = [0, 100];
    public const POSITIVE_PERCENT = [1, 100];
    public const EXTENDED_PERCENT = [-50, 100];
    public const AUDIO_VOLUME     = [-100, 400];
    public const ANGLE        = [-360, 360];
    public const PIXEL = [1, 2000];
    public const PIXEL_REGION = [1, 200];
    public const DEFAULT_RANGE = [-100, 100];
    public const SHIFTED_RANGE = [-50, 150];
    public const BRIGHTNESS    = [-99, 100];
    public const DESHAKE    = [0, 64]; //FIXME: set predefined values
    public const ORDERED_DITHER = [0, 18];
}
