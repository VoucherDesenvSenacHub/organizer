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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * The predefined streaming profiles.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/adaptive_bitrate_streaming#predefined_streaming_profiles"
 * target="_blank">Predefined streaming profiles</a>
 *
 * @api
 */
class StreamingProfile extends BaseQualifier
{
    public const SP_4K = '4k';
    public const FULL_HD = 'full_hd';
    public const HD      = 'hd';
    public const SD = 'sd';
    public const FULL_HD_WIFI = 'full_hd_wifi';
    public const FULL_HD_LEAN = 'full_hd_lean';
    public const HD_LEAN      = 'hd_lean';

    /**
     * Streaming profile 4k.
     *
     */
    public static function sp4k(): string
    {
        return self::SP_4K;
    }

    /**
     * Streaming profile full hd.
     *
     */
    public static function fullHd(): string
    {
        return self::FULL_HD;
    }

    /**
     * Streaming profile hd.
     *
     */
    public static function hd(): string
    {
        return self::HD;
    }

    /**
     * Streaming profile sd.
     *
     */
    public static function sd(): string
    {
        return self::SD;
    }

    /**
     * Streaming profile full hd wifi.
     *
     */
    public static function fullHdWifi(): string
    {
        return self::FULL_HD_WIFI;
    }

    /**
     * Streaming profile full hd lean.
     *
     */
    public static function fullHdLean(): string
    {
        return self::FULL_HD_LEAN;
    }

    /**
     * Streaming profile hd lean.
     *
     */
    public static function hdLean(): string
    {
        return self::HD_LEAN;
    }
}
