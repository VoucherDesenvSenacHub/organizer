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
 * Trait FocalGravityBuilderTrait
 *
 * @api
 */
trait FocalGravityBuilderTrait
{
    /**
     * Detects the largest face in an image with the Advanced Facial Attribute Detection add-on and makes it the focus
     * of the transformation.
     *
     * For details, see the Advanced Facial Attribute Detection add-on documentation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     *
     * @see https://cloudinary.com/documentation/advanced_facial_attributes_detection_addon#face_detection_based_cropping
     */
    public static function advancedFace(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::ADVANCED_FACE, ...$fallback);
    }

    /**
     * Detects all faces in an image with the Advanced Facial Attribute Detection add-on and makes them the focus
     * of the transformation.
     *
     * For details, see the Advanced Facial Attribute Detection add-on documentation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     *
     * @see https://cloudinary.com/documentation/advanced_facial_attributes_detection_addon#face_detection_based_cropping
     */
    public static function advancedFaces(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::ADVANCED_FACES, ...$fallback);
    }

    /**
     * Detects all eyes in an image with the Advanced Facial Attribute Detection add-on and makes them the focus of
     * the transformation.
     *
     * For details, see the Advanced Facial Attribute Detection add-on documentation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     *
     * @see https://cloudinary.com/documentation/advanced_facial_attributes_detection_addon#eyes_detection_based_cropping
     */
    public static function advancedEyes(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::ADVANCED_EYES, ...$fallback);
    }

    /**
     * Detects human bodies in the asset and makes them the focus of the transformation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function body(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::BODY, ...$fallback);
    }

    /**
     * Detects the largest face in the asset and makes it the focus of the transformation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function face(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::FACE, ...$fallback);
    }

    /**
     * Detects all the faces in the asset and makes them the focus of the transformation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function faces(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::FACES, ...$fallback);
    }

    /**
     * Gives priority to areas of the asset that do not contain faces.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function noFaces(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::NO_FACES, ...$fallback);
    }

    /**
     * Uses custom coordinates that were previously specified (for example, as part of the image upload method) and
     * makes them the focus of the transformation.
     *
     * Defaults to 'center' gravity if no custom coordinates have been specified.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function custom(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::CUSTOM, ...$fallback);
    }

    /**
     * Crops the image while giving higher priority to custom coordinates (custom coordinates don't override the
     * automatic cropping).
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function customNoOverride(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::CUSTOM_NO_OVERRIDE, ...$fallback);
    }

    /**
     * Detects all text elements in an image using the OCR Text Detection and Extraction add-on and uses the detected
     * bounding box coordinates as the focus of the transformation.
     *
     * For details, see the OCR Text Detection and Extraction add-on documentation.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     *
     * @see https://cloudinary.com/documentation/ocr_text_detection_and_extraction_addon
     */
    public static function ocrText(...$fallback): FocalGravity
    {
        return self::createWithFocalGravity(FocalGravity::OCR_TEXT, ...$fallback);
    }

    /**
     * Alias for Gravity::ocrText()
     *
     *
     *
     * @see FocalGravity::ocrText
     */
    public static function ocr(...$fallback): FocalGravity
    {
        return self::ocrText(...$fallback);
    }

    /**
     * Creates a new instance of the FocalGravity class.
     *
     * @param string $gravity  The main gravity.
     * @param array  $fallback Fallback gravities.
     *
     */
    protected static function createWithFocalGravity(string $gravity, ...$fallback): FocalGravity
    {
        return new FocalGravity($gravity, ...$fallback);
    }
}
