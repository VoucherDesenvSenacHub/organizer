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
 * Trait FormatTrait
 *
 * @api
 */
trait VideoFormatTrait
{
    /**
     * Video format mp4.
     *
     */
    public static function videoMp4(): static
    {
        return static::createFormat(Format::MP4);
    }

    /**
     * Video format ts.
     *
     */
    public static function videoTs(): static
    {
        return static::createFormat(Format::TS);
    }

    /**
     * Video format mov.
     *
     */
    public static function videoMov(): static
    {
        return static::createFormat(Format::MOV);
    }

    /**
     * Video format flv.
     *
     */
    public static function videoFlv(): static
    {
        return static::createFormat(Format::FLV);
    }

    /**
     * Video format webm.
     *
     */
    public static function videoWebm(): static
    {
        return static::createFormat(Format::WEBM);
    }

    /**
     * Video format ogv.
     *
     */
    public static function videoOgv(): static
    {
        return static::createFormat(Format::OGV);
    }

    /**
     * Video format m3u8.
     *
     */
    public static function videoM3u8(): static
    {
        return static::createFormat(Format::M3U8);
    }

    /**
     * Video format mpd.
     *
     */
    public static function videoMpd(): static
    {
        return static::createFormat(Format::MPD);
    }

    /**
     * Video format mkv.
     *
     */
    public static function videoMkv(): static
    {
        return static::createFormat(Format::MKV);
    }

    /**
     * Video format avi.
     *
     */
    public static function videoAvi(): static
    {
        return static::createFormat(Format::AVI);
    }

    /**
     * Video format 3gp.
     *
     */
    public static function video3gp(): static
    {
        return static::createFormat(Format::F_3GP);
    }

    /**
     * Video format 3g2.
     *
     */
    public static function video3g2(): static
    {
        return static::createFormat(Format::F_3G2);
    }

    /**
     * Video format wmv.
     *
     */
    public static function videoWmv(): static
    {
        return static::createFormat(Format::WMV);
    }

    /**
     * Video format mpeg.
     *
     */
    public static function videoMpeg(): static
    {
        return static::createFormat(Format::MPEG);
    }
}
