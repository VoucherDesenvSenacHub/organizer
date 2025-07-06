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
 * Controls audio sample frequency.
 *
 * **Learn more**: <a href="https://cloudinary.com/documentation/audio_transformations#audio_frequency_control"
 * target="_blank">Audio frequency control</a>
 *
 *
 * @api
 */
class AudioFrequency extends BaseQualifier
{
    public const FREQ8000 = 8000;
    public const FREQ11025 = 11025;
    public const FREQ16000 = 16000;
    public const FREQ22050 = 22050;
    public const FREQ32000 = 32000;
    public const FREQ37800 = 37800;
    public const FREQ44056 = 44056;
    public const FREQ44100 = 44100;
    public const FREQ47250 = 47250;
    public const FREQ48000 = 48000;
    public const FREQ88200 = 88200;
    public const FREQ96000 = 96000;
    public const FREQ176400 = 176400;
    public const FREQ192000 = 192000;

    /*
     * Initial audio frequency
     */
    public const IAF = 'iaf';

    /**
     * Audio Frequency 8000.
     *
     */
    public static function freq8000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ8000);
    }

    /**
     * Audio Frequency 11025.
     *
     */
    public static function freq11025(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ11025);
    }

    /**
     * Audio Frequency 16000.
     *
     */
    public static function freq16000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ16000);
    }

    /**
     * Audio Frequency 22050.
     *
     */
    public static function freq22050(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ22050);
    }

    /**
     * Audio Frequency 32000.
     *
     */
    public static function freq32000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ32000);
    }

    /**
     * Audio Frequency 37800.
     *
     */
    public static function freq37800(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ37800);
    }

    /**
     * Audio Frequency 44056.
     *
     */
    public static function freq44056(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ44056);
    }

    /**
     * Audio Frequency 44100.
     *
     */
    public static function freq44100(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ44100);
    }

    /**
     * Audio Frequency 47250.
     *
     */
    public static function freq47250(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ47250);
    }

    /**
     * Audio Frequency 48000.
     *
     */
    public static function freq48000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ48000);
    }

    /**
     * Audio Frequency 88200.
     *
     */
    public static function freq88200(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ88200);
    }

    /**
     * Audio Frequency 96000.
     *
     */
    public static function freq96000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ96000);
    }

    /**
     * Audio Frequency 176400.
     *
     */
    public static function freq176400(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ176400);
    }

    /**
     * Audio Frequency 192000.
     *
     */
    public static function freq192000(): AudioFrequency
    {
        return self::createAudioFrequency(self::FREQ192000);
    }

    /**
     * Retain the original audio frequency of the video.
     * This applies when using vc_auto where the audio frequency defaults to 48kHz.
     *
     */
    public static function iaf(): AudioFrequency
    {
        return self::createAudioFrequency(self::IAF);
    }

    /**
     * Creates a new instance of the AudioFrequency class.
     *
     * @param int|string $qualifier The audio frequency.
     *
     */
    protected static function createAudioFrequency(int|string $qualifier): AudioFrequency
    {
        return new self($qualifier);
    }
}
