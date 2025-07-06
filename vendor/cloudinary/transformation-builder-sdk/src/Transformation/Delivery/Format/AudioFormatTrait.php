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
 * Trait AudioFormatTrait
 *
 * @api
 */
trait AudioFormatTrait
{
    /**
     * Audio format mp3.
     *
     */
    public static function audioMp3(): static
    {
        return static::createFormat(Format::MP3);
    }

    /**
     * Audio format aac.
     *
     */
    public static function audioAac(): static
    {
        return static::createFormat(Format::AAC);
    }

    /**
     * Audio format m4a.
     *
     */
    public static function audioM4a(): static
    {
        return static::createFormat(Format::M4A);
    }

    /**
     * Audio format ogg.
     *
     */
    public static function audioOgg(): static
    {
        return static::createFormat(Format::OGG);
    }

    /**
     * Audio format wav.
     *
     */
    public static function audioWav(): static
    {
        return static::createFormat(Format::WAV);
    }

    /**
     * Audio format aiff.
     *
     */
    public static function audioAiff(): static
    {
        return static::createFormat(Format::AIFF);
    }

    /**
     * Audio format flac.
     *
     */
    public static function audioFlac(): static
    {
        return static::createFormat(Format::FLAC);
    }

    /**
     * Audio format amr.
     *
     */
    public static function audioAmr(): static
    {
        return static::createFormat(Format::AMR);
    }

    /**
     * Audio format midi.
     *
     */
    public static function audioMidi(): static
    {
        return static::createFormat(Format::MIDI);
    }
}
