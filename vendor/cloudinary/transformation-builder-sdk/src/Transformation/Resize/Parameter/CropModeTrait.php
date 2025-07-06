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
 * Trait CropModeTrait
 */
trait CropModeTrait
{
    /**
     * Changes the size of the asset exactly to the given width and height without necessarily retaining the original
     * aspect ratio.
     *
     * All original parts are visible but might be stretched or shrunk.
     *
     */
    public static function scale(): CropMode
    {
        return new CropMode(CropMode::SCALE);
    }

    /**
     * Resizes the asset so that it takes up as much space as possible within a bounding box defined by the given
     * width and height qualifiers.
     *
     * The original aspect ratio is retained and all of the original asset is visible.
     *
     */
    public static function fit(): CropMode
    {
        return new CropMode(CropMode::FIT);
    }

    /**
     * Resizes the asset so that it takes up as much space as possible within a bounding box defined by the given
     * width and height qualifiers, but only if the original asset is larger than the given limit (width and height).
     *
     * The asset is scaled down, the original aspect ratio is retained and all of the original asset is visible.
     *
     */
    public static function limitFit(): CropMode
    {
        return new CropMode(CropMode::LIMIT_FIT);
    }

    /**
     * Resizes the asset so that it takes up as much space as possible within a bounding box defined by the given
     * width and height qualifiers, but only if the original asset is smaller than the given minimum (width and height).
     *
     * The asset is scaled up, the original aspect ratio is retained and all of the original asset is visible.
     *
     */
    public static function minimumFit(): CropMode
    {
        return new CropMode(CropMode::MINIMUM_FIT);
    }

    /**
     * Resizes the asset to fill the given width and height while retaining the original aspect ratio.
     *
     * If the proportions of the original asset do not match the given width and height, padding is added to the asset
     * to reach the required size.
     *
     */
    public static function pad(): CropMode
    {
        return new CropMode(CropMode::PAD);
    }

    /**
     * Resizes the asset to fill the given width and height while retaining the original aspect ratio, but only if the
     * original asset is larger than the given limit (width and height).
     *
     * The asset is scaled down.  If the proportions of the original asset do not match the given width and height,
     * padding is added to the asset to reach the required size.
     *
     */
    public static function limitPad(): CropMode
    {
        return new CropMode(CropMode::LIMIT_PAD);
    }

    /**
     * Resizes the asset to fill the given width and height while retaining the original aspect ratio, but only if the
     * original asset is smaller than the given minimum (width and height).
     *
     * The asset is scaled up.  If the proportions of the original asset do not match the given width and height,
     * padding is added to the asset to reach the required size.
     *
     */
    public static function minimumPad(): CropMode
    {
        return new CropMode(CropMode::MINIMUM_PAD);
    }

    /**
     * Creates an asset with the exact given width and height without distorting the asset.
     *
     * This option first scales as much as needed to at least fill both of the given dimensions. If the requested
     * aspect ratio is different than the original, cropping will occur on the dimension that exceeds the requested
     * size after scaling.
     *
     */
    public static function fill(): CropMode
    {
        return new CropMode(CropMode::FILL);
    }

    /**
     * Creates an asset with the exact given width and height without distorting the asset, but only if the original
     * asset is larger than the specified resolution limits.
     *
     * The asset is scaled down to fill the given width and height without distorting the asset, and then the dimension
     * that exceeds the request is cropped. If the original dimensions are both smaller than the requested size, it is
     * not resized at all.
     *
     */
    public static function limitFill(): CropMode
    {
        return new CropMode(CropMode::LIMIT_FILL);
    }

    /**
     * Tries to prevent a "bad crop" by first attempting to use the fill mode, but adds padding if it is determined
     * that more of the original asset needs to be included in the final asset.
     *
     * Only supported in conjunction with automatic cropping (g_auto).
     *
     */
    public static function fillPad(): CropMode
    {
        return new CropMode(CropMode::FILL_PAD);
    }

    /**
     * Extracts a given width and height out of the original asset.
     *
     * The original proportions are retained and so is the size of the graphics.
     *
     */
    public static function crop(): CropMode
    {
        return new CropMode(CropMode::CROP);
    }

    /**
     * Generates a thumbnail using face detection in combination with the 'face' or 'faces' gravity.
     *
     */
    public static function thumbnail(): CropMode
    {
        return new CropMode(CropMode::THUMBNAIL);
    }

    /**
     * Crops your image based on automatically calculated areas of interest within each specific photo.
     *
     * For details, see the Imagga Crop and Scale add-on documentation.
     *
     *
     * @see https://cloudinary.com/documentation/imagga_crop_and_scale_addon#smartly_crop_images
     */
    public static function imaggaCrop(): CropMode
    {
        return new CropMode(CropMode::IMAGGA_CROP);
    }

    /**
     * Scales your image based on automatically calculated areas of interest within each specific photo.
     *
     * For details, see the Imagga Crop and Scale add-on documentation.
     *
     *
     * @see https://cloudinary.com/documentation/imagga_crop_and_scale_addon#smartly_scale_images
     */
    public static function imaggaScale(): CropMode
    {
        return new CropMode(CropMode::IMAGGA_SCALE);
    }

    /**
     * For future compatibility.
     *
     *
     */
    public static function generic($cropModeName): CropMode
    {
        return new CropMode($cropModeName);
    }
}
