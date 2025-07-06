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
 * Interface LightroomEffectInterface
 */
interface LightroomEffectInterface
{
    public const CONTRAST = 'contrast';
    public const SATURATION = 'saturation';
    public const VIGNETTE_AMOUNT = 'vignetteamount';
    public const VIBRANCE        = 'vibrance';
    public const HIGHLIGHTS = 'highlights';
    public const SHADOWS    = 'shadows';
    public const WHITES  = 'whites';
    public const BLACKS = 'blacks';
    public const CLARITY = 'clarity';
    public const DEHAZE  = 'dehaze';
    public const TEXTURE = 'texture';
    public const SHARPNESS = 'sharpness';
    public const COLOR_NOISE_REDUCTION = 'colornoisereduction';
    public const NOISE_REDUCTION       = 'noisereduction';
    public const SHARPEN_DETAIL  = 'sharpendetail';
    public const SHARPEN_EDGE_MASKING = 'sharpenedgemasking';
    public const EXPOSURE             = 'exposure';
    public const SHARPEN_RADIUS = 'sharpenradius';
    public const WHITE_BALANCE  = 'whitebalance';
    public const XMP           = 'xmp';
}
