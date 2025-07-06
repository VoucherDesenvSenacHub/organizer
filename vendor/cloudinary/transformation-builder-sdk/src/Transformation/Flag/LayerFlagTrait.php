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
 * Trait LayerFlagTrait
 *
 * @api
 */
trait LayerFlagTrait
{
    use ResizeModeTrait;

    /**
     * Trims pixels according to the transparency levels of a given overlay image.
     *
     * Wherever the overlay image is transparent, the original is shown, and wherever the overlay is opaque, the
     * resulting image is transparent.
     *
     */
    public static function cutter(): FlagQualifier
    {
        return new FlagQualifier(self::CUTTER);
    }

    /**
     * Applies all chained transformations, until a transformation component that includes this flag, on the last added
     * overlay or underlay instead of applying on the containing image.
     *
     */
    public static function layerApply(): FlagQualifier
    {
        return new FlagQualifier(self::LAYER_APPLY);
    }

    /**
     * Replaces the first image embedded in a PDF with the image stipulated as an overlay,
     * instead of adding it as another overlay.
     *
     */
    public static function replaceImage(): FlagQualifier
    {
        return new FlagQualifier(self::REPLACE_IMAGE);
    }

    /**
     * Splices the video stipulated as an overlay on to the end of the container video instead of adding it as an
     * overlay.
     *
     */
    public static function splice(): FlagQualifier
    {
        return new FlagQualifier(self::SPLICE);
    }

    /**
     * Prevents Cloudinary from extending the image canvas beyond the original dimensions when overlaying text and
     * other images.
     *
     */
    public static function noOverflow(): FlagQualifier
    {
        return new FlagQualifier(self::NO_OVERFLOW);
    }

    /**
     * By default, text overlays are trimmed tightly to the text with no excess padding. This flag adds a small amount
     * of padding around the text overlay string.
     *
     */
    public static function textNoTrim(): FlagQualifier
    {
        return new FlagQualifier(self::TEXT_NO_TRIM);
    }

    /**
     * Returns an error if the text overlay exceeds the image boundaries.
     *
     */
    public static function textDisallowOverflow(): FlagQualifier
    {
        return new FlagQualifier(self::TEXT_DISALLOW_OVERFLOW);
    }

    /**
     * Tiles the added overlay over the entire image.
     *
     */
    public static function tiled(): FlagQualifier
    {
        return new FlagQualifier(self::TILED);
    }
}
