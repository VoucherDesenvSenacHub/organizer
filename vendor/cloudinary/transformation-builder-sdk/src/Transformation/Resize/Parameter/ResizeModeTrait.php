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
 * Trait ResizeModeTrait
 *
 * @api
 */
trait ResizeModeTrait
{
    /**
     * Modifies percentage-based width & height qualifiers of overlays and underlays (e.g., 1.0) to be relative to the
     * overlaid region. Currently regions are only defined when using gravity 'face', 'faces' or 'custom'.
     *
     */
    public static function regionRelative(): FlagQualifier
    {
        return new FlagQualifier(Flag::REGION_RELATIVE);
    }

    /**
     * Modifies percentage-based width & height qualifiers of overlays and underlays (e.g., 1.0) to be relative to the
     * containing image instead of the added layer.
     *
     */
    public static function relative(): FlagQualifier
    {
        return new FlagQualifier(Flag::RELATIVE);
    }
}
