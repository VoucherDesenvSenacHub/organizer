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
abstract class PixelEffect
{
    // Common
    public const BLUR = 'blur';
    public const VIGNETTE = 'vignette';

    // Image
    public const BLUR_FACES = 'blur_faces';
    public const BLUR_REGION = 'blur_region';
    public const PIXELATE    = 'pixelate';
    public const PIXELATE_REGION = 'pixelate_region';
    public const PIXELATE_FACES  = 'pixelate_faces';
    public const ORDERED_DITHER = 'ordered_dither';
    public const GRADIENT_FADE  = 'gradient_fade';
    public const MAKE_TRANSPARENT = 'make_transparent';
    public const REMOVE_BACKGROUND = 'bgremoval';
    public const BACKGROUND_REMOVAL = 'background_removal';
    public const CUT_OUT            = 'cut_out';

    use PixelEffectTrait;
    use ImagePixelEffectTrait;
}
