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
 * Interface LayerFlagInterface
 */
interface LayerFlagInterface
{
    public const CUTTER = 'cutter';
    public const LAYER_APPLY = 'layer_apply';
    public const NO_OVERFLOW = 'no_overflow';
    public const REGION_RELATIVE = 'region_relative';
    public const RELATIVE        = 'relative';
    public const REPLACE_IMAGE = 'replace_image';
    public const SPLICE        = 'splice';
    public const TEXT_NO_TRIM = 'text_no_trim';
    public const TEXT_DISALLOW_OVERFLOW = 'text_disallow_overflow';
    public const TILED                  = 'tiled';
}
