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
 * Defines the mode of blending to use when overlaying an image.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#blending_and_masking_layers" target="_blank">
 * Overlay blending effects</a>
 *
 * @api
 */
class BlendMode extends EffectQualifier
{
    /**
     * @var string $name Serialization name.
     */
    protected static string $name = 'blend_mode';

    /**
     * Each pixel of the image is made darker according to the pixel value of the overlaid image.
     */
    public const MULTIPLY = 'multiply';

    /**
     * Each pixel of the image is made brighter according to the pixel value of the overlaid image.
     */
    public const SCREEN = 'screen';

    /**
     * Each pixel of the image is made darker or brighter according to the pixel value of the overlaid image.
     */
    public const OVERLAY = 'overlay';

    /**
     * Each pixel of the image is 'cut-out' according to the non-transparent pixels of the overlaid
     * image.
     */
    public const MASK = 'mask';

    /**
     * The overlay is slightly distorted to prevent easy removal.
     */
    public const ANTI_REMOVAL = 'anti_removal';

    /**
     * Add an overlay image blended using the 'multiply' blend mode.
     *
     * In this mode, each pixel of the image is made darker according to the pixel value of the overlaid image.
     *
     */
    public static function multiply(): BlendMode
    {
        return new self(self::MULTIPLY);
    }

    /**
     * Add an overlay image blended using the 'screen' blend mode.
     *
     * In this mode, each pixel of the image is made brighter according to the pixel value of the overlaid image.
     *
     */
    public static function screen(): BlendMode
    {
        return new self(self::SCREEN);
    }

    /**
     * Add an overlay image blended using the 'overlay' blend mode.
     *
     * In this mode, each pixel of the image is made darker or brighter according to the pixel value of the overlaid
     * image.
     *
     */
    public static function overlay(): BlendMode
    {
        return new self(self::OVERLAY);
    }

    /**
     * Add an overlay image blended using the 'mask' blend mode.
     *
     * In this mode, each pixel of the image is 'cut-out' according to the non-transparent pixels of the overlaid
     * image.
     *
     */
    public static function mask(): BlendMode
    {
        return new self(self::MASK);
    }

    /**
     * Add an overlay image blended using the 'anti-removal' blend mode.
     *
     * In this mode, the overlay is slightly distorted to prevent easy removal.
     *
     * @param int|null $level The level of distortion. (Range: 1 to 100, Server default: 50)
     *
     */
    public static function antiRemoval(?int $level = null): BlendMode
    {
        return new self(self::ANTI_REMOVAL, $level);
    }
}
