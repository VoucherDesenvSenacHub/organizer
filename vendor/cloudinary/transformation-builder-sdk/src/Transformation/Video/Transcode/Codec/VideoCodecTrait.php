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
 * Trait VideoCodecTrait
 *
 * @api
 */
trait VideoCodecTrait
{
    /**
     * Auto video codec.
     *
     */
    public static function auto(): VideoCodec
    {
        return new VideoCodec(VideoCodec::AUTO);
    }

    /**
     * Video codec vp8.
     *
     */
    public static function vp8(): VideoCodec
    {
        return new VideoCodec(VideoCodec::VP8);
    }

    /**
     * Video codec vp9.
     *
     */
    public static function vp9(): VideoCodec
    {
        return new VideoCodec(VideoCodec::VP9);
    }

    /**
     * Video codec proRes (Apple ProRes 422 HQ).
     *
     */
    public static function proRes(): VideoCodec
    {
        return new VideoCodec(VideoCodec::PRO_RES);
    }

    /**
     * Video codec h264.
     *
     */
    public static function h264(?string $profile = null, ?string $level = null): VideoCodec
    {
        return (new VideoCodec(VideoCodec::H264))->profile($profile)->level($level);
    }

    /**
     * Video codec h265.
     *
     */
    public static function h265(): VideoCodec
    {
        return new VideoCodec(VideoCodec::H265);
    }

    /**
     * Video codec theora.
     *
     */
    public static function theora(): VideoCodec
    {
        return new VideoCodec(VideoCodec::THEORA);
    }
}
