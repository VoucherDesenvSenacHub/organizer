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
 * Class Effect
 */
abstract class PlaybackEffect
{
    public const ACCELERATE = 'accelerate';
    public const LOOP       = 'loop';
    public const BOOMERANG = 'boomerang';
    public const PREVIEW   = 'preview';
    public const REVERSE = 'reverse';
    public const VOLUME  = 'volume';
    public const TRANSITION = 'transition';

    use PlaybackEffectTrait;
}
