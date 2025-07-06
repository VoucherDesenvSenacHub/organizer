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
 * Controls the audio codec or removes the audio channel.
 *
 * **Learn more**: <a href="https://cloudinary.com/documentation/audio_transformations#audio_codec_settings"
 * target="_blank">Audio codec settings</a>
 *
 * @api
 */
class AudioCodec extends BaseQualifier
{
    /**
     * Removes the audio channel.
     */
    public const NONE = 'none';

    /**
     * Sets the audio codec to aac (mp4 or flv only).
     */
    public const AAC = 'aac';

    /**
     * Sets the audio codec to vorbis (ogv or webm only).
     */
    public const VORBIS = 'vorbis';

    /**
     * Sets the audio codec to mp3 (mp4 or flv only).
     */
    public const MP3 = 'mp3';

    /**
     * Removes the audio channel
     *
     */
    public static function none(): AudioCodec
    {
        return new static(static::NONE);
    }

    /**
     * mp4 or flv only
     *
     */
    public static function aac(): AudioCodec
    {
        return new static(static::AAC);
    }

    /**
     * ogv or webm only
     *
     */
    public static function vorbis(): AudioCodec
    {
        return new static(static::VORBIS);
    }

    /**
     * mp4 or flv only
     *
     */
    public static function mp3(): AudioCodec
    {
        return new static(static::MP3);
    }
}
