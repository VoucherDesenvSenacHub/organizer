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
 * Defines the video codec profile.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_manipulation_and_delivery#video_codec_settings" target="_blank">
 * Video codec settings</a>
 *
 * @api
 */
class VideoCodecProfile
{
    public const BASELINE = 'baseline';
    public const MAIN = 'main';
    public const HIGH = 'high';

    /**
     * Video codec profile baseline.
     *
     */
    public static function baseline(): string
    {
        return self::BASELINE;
    }

    /**
     * Video codec profile main.
     *
     */
    public static function main(): string
    {
        return self::MAIN;
    }

    /**
     * Video codec profile high.
     *
     */
    public static function high(): string
    {
        return self::HIGH;
    }
}
