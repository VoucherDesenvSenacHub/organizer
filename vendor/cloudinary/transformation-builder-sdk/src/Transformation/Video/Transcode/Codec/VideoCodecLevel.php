<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Codec;

/**
 * Defines the video codec level.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_manipulation_and_delivery#video_codec_settings" target="_blank">
 * Video codec settings</a>
 *
 * @api
 */
class VideoCodecLevel
{
    public const VCL_30 = '3.0';
    public const VCL_31 = '3.1';
    public const VCL_40 = '4.0';
    public const VCL_41 = '4.1';
    public const VCL_42 = '4.2';
    public const VCL_50 = '5.0';
    public const VCL_51 = '5.1';
    public const VCL_52 = '5.2';

    /**
     * Video codec level 3.0.
     *
     */
    public static function vcl30(): string
    {
        return self::VCL_30;
    }

    /**
     * Video codec level 3.1.
     *
     */
    public static function vcl31(): string
    {
        return self::VCL_31;
    }

    /**
     * Video codec level 4.0.
     *
     */
    public static function vcl40(): string
    {
        return self::VCL_40;
    }

    /**
     * Video codec level 4.1.
     *
     */
    public static function vcl41(): string
    {
        return self::VCL_41;
    }

    /**
     * Video codec level 4.2.
     *
     */
    public static function vcl42(): string
    {
        return self::VCL_42;
    }

    /**
     * Video codec level 5.0.
     *
     */
    public static function vcl50(): string
    {
        return self::VCL_50;
    }

    /**
     * Video codec level 5.1.
     *
     */
    public static function vcl51(): string
    {
        return self::VCL_51;
    }

    /**
     * Video codec level 5.2.
     *
     */
    public static function vcl52(): string
    {
        return self::VCL_52;
    }
}
