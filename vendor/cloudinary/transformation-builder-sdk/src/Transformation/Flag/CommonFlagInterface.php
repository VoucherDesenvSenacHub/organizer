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
 * Interface CommonFlagInterface
  *
 * @internal
 */
interface CommonFlagInterface
{
    public const ATTACHMENT = 'attachment';
    public const IGNORE_ASPECT_RATIO = 'ignore_aspect_ratio';
    public const FORCE_ICC           = 'force_icc';
    public const FORCE_STRIP  = 'force_strip';
    public const GET_INFO    = 'getinfo';
    public const IMMUTABLE_CACHE = 'immutable_cache';
    public const KEEP_ATTRIBUTION = 'keep_attribution';
    public const KEEP_IPTC        = 'keep_iptc';
}
