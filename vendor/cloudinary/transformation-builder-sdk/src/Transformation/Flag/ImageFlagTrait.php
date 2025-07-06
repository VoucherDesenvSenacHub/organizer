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
 * Trait ImageFlagTrait
 *
 * @api
 */
trait ImageFlagTrait
{
    /**
     * Used when delivering a video file as an image format that supports animation, such as animated WebP.
     *
     * Plays all frames rather than just delivering the first one as a static image.
     * Use this flag in addition to the flag or qualifier controlling the delivery format,
     * for example f_auto or fl_awebp.
     *
     * Note: When delivering a video in GIF format, it is delivered as an animated GIF by default and this flag is not
     * necessary. To deliver a single frame of a video in GIF format, use the page qualifier.
     *
     */
    public static function animated(): FlagQualifier
    {
        return new FlagQualifier(self::ANIMATED);
    }

    /**
     * When used together with automatic quality (q_auto):
     * allow switching to PNG8 encoding if the quality algorithm decides that it's more efficient.
     *
     */
    public static function anyFormat(): FlagQualifier
    {
        return new FlagQualifier(self::ANY_FORMAT);
    }

    /**
     * When converting animated images to PNG format, generates an animated PNG from all the frames in the original
     * animated file instead of only from the first still frame.
     *
     * Note that animated PNGs are not supported in all browsers and versions.
     *
     */
    public static function animatedPng(): FlagQualifier
    {
        return new FlagQualifier(self::ANIMATED_PNG);
    }

    /**
     * When converting animated images to WebP format, generate an animated WebP from all the frames in the original
     * animated file instead of only from the first still frame.
     *
     * Note that animated WebPs are not supported in all browsers and versions.
     *
     */
    public static function animatedWebP(): FlagQualifier
    {
        return new FlagQualifier(self::ANIMATED_WEBP);
    }

    /**
     * Trims pixels according to a clipping path included in the original image
     * (e.g., manually created using PhotoShop).
     *
     */
    public static function clip(): FlagQualifier
    {
        return new FlagQualifier(self::CLIP);
    }

    /**
     * Trims pixels according to a clipping path included in the original image (e.g., manually created using PhotoShop)
     * using an evenodd clipping rule.
     *
     */
    public static function clipEvenOdd(): FlagQualifier
    {
        return new FlagQualifier(self::CLIP_EVEN_ODD);
    }

    /**
     * Automatically use lossy compression when delivering animated GIF files.
     *
     * This flag can also be used as a conditional flag for delivering PNG files: it tells Cloudinary to deliver the
     * image in PNG format (as requested) unless there is no transparency channel - in which case deliver in JPEG
     * format.
     *
     */
    public static function lossy(): FlagQualifier
    {
        return new FlagQualifier(self::LOSSY);
    }

    /**
     * When used with automatic fetch_format (f_auto): ensures that images with a transparency channel will be
     * delivered in PNG format.
     *
     */
    public static function preserveTransparency(): FlagQualifier
    {
        return new FlagQualifier(self::PRESERVE_TRANSPARENCY);
    }

    /**
     * Generate PNG images in the PNG8 format.
     *
     */
    public static function png8(): FlagQualifier
    {
        return new FlagQualifier(self::PNG8);
    }

    /**
     * Generates PNG images in the PNG24 format.
     *
     */
    public static function png24(): FlagQualifier
    {
        return new FlagQualifier(self::PNG24);
    }

    /**
     * Generates PNG images in the PNG32 format.
     *
     */
    public static function png32(): FlagQualifier
    {
        return new FlagQualifier(self::PNG32);
    }

    /**
     * Generates a JPG image using the progressive (interlaced) JPG format.
     *
     * This format allows the browser to quickly show a low-quality rendering of the image until the full-quality
     * image is loaded.
     *
     * @param string|null $mode      The mode to determine a specific progressive outcome as follows:
     *                     * semi  - A smart optimization of the decoding time, compression level and progressive
     *                               rendering (less iterations). This is the default mode when using q_auto.
     *                     * steep - Delivers a preview very quickly, and in a single later phase improves the image to
     *                               the required resolution.
     *                     * none  - Use this to deliver a non-progressive image. This is the default mode when setting
     *                               a specific value for quality.
     *
     *@see Progressive
     *
     */
    public static function progressive(?string $mode = null): FlagQualifier
    {
        return new FlagQualifier(self::PROGRESSIVE, $mode);
    }

    /**
     * Reduces the image to one flat pixelated layer (as opposed to the default vector based graphic) in order to enable
     * PDF resizing and overlay manipulations.
     *
     */
    public static function rasterize(): FlagQualifier
    {
        return new FlagQualifier(self::RASTERIZE);
    }

    /**
     * Instructs Cloudinary to run a sanitizer on the image (relevant only for the SVG format).
     *
     */
    public static function sanitize(): FlagQualifier
    {
        return new FlagQualifier(self::SANITIZE);
    }

    /**
     * Instructs Cloudinary to clear all ICC color profile data included with the image.
     *
     */
    public static function stripProfile(): FlagQualifier
    {
        return new FlagQualifier(self::STRIP_PROFILE);
    }

    /**
     * Generates TIFF images using LZW compression and in the TIFF8 format.
     *
     */
    public static function tiff8Lzw(): FlagQualifier
    {
        return new FlagQualifier(self::TIFF8_LZW);
    }

    /**
     * A qualifier that ensures that an alpha channel is not applied to a TIFF image if it is a mask channel.
     *
     * @see https://cloudinary.com/documentation/transformation_reference#fl_ignore_mask_channels
     *
     */
    public static function ignoreMaskChannels(): FlagQualifier
    {
        return new FlagQualifier(self::IGNORE_MASK_CHANNELS);
    }
}
