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
 * Class MiscEffect
 */
abstract class MiscEffect
{
    public const ARTISTIC_FILTER = 'art';
    public const STYLE_TRANSFER  = 'style_transfer';
    public const CARTOONIFY     = 'cartoonify';
    public const OIL_PAINT  = 'oil_paint';
    public const RED_EYE   = 'redeye';
    public const ADVANCED_RED_EYE = 'adv_redeye';
    public const VECTORIZE        = 'vectorize';
    public const OUTLINE   = 'outline';
    public const DROP_SHADOW = 'dropshadow';
}
