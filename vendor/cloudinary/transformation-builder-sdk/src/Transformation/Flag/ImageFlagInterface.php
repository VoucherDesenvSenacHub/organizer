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
 * Interface ImageFlagInterface
 */
interface ImageFlagInterface
{
    public const ANIMATED = 'animated';
    public const ANY_FORMAT = 'any_format';
    public const ANIMATED_PNG = 'apng';
    public const ANIMATED_WEBP = 'awebp';
    public const CLIP          = 'clip';
    public const CLIP_EVEN_ODD = 'clip_evenodd';
    public const LOSSY         = 'lossy';
    public const PRESERVE_TRANSPARENCY = 'preserve_transparency';
    public const PNG8                  = 'png8';
    public const PNG24          = 'png24';
    public const PNG32 = 'png32';
    public const PROGRESSIVE = 'progressive';
    public const RASTERIZE   = 'rasterize';
    public const SANITIZE  = 'sanitize';
    public const STRIP_PROFILE = 'strip_profile';
    public const TIFF8_LZW     = 'tiff8_lzw';
    public const IGNORE_MASK_CHANNELS = 'ignore_mask_channels';
}
