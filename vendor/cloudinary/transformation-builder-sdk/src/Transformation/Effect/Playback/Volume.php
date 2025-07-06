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

use Cloudinary\TransformationUtils;

/**
 * Controls the volume of an audio or video file.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/audio_transformations#adjust_the_audio_volume" target="_blank">
 * Adjust the audio volume</a>
 *
 * @api
 */
class Volume extends LimitedEffectQualifier
{
    public const MUTE = 'mute';

    /**
     * Volume constructor.
     *
     * @param mixed $volume
     */
    public function __construct($volume = null)
    {
        parent::__construct(PlaybackEffect::VOLUME, EffectRange::AUDIO_VOLUME);

        $this->setVolume($volume);
    }

    /**
     * Named Volume constructor.
     *
     *
     */
    public static function volume(mixed $volume): Volume
    {
        return new self($volume);
    }

    /**
     * Increases or decreases the volume by the specified number of decibels.
     *
     * @param int $dBOffset The offset in dB.
     *
     */
    public static function byDecibels(int $dBOffset): Volume
    {
        return new self(TransformationUtils::formatSigned($dBOffset) . 'dB');
    }

    /**
     * Increases or decreases the volume by a percentage of the current volume.
     *
     * @param int $level The percentage change of volume (Range: -100 to 400).
     *
     */
    public static function byPercent(int $level): Volume
    {
        return new self($level);
    }

    /**
     * Mutes the volume.
     *
     * You can use this on the base video to deliver a video without sound, or with a video overlay
     * to ensure that only the sound from the base video plays.
     *
     */
    public static function mute(): Volume
    {
        return new self(self::MUTE);
    }

    /**
     * Increases or decreases the volume by a percentage of the current volume.
     *
     * @param int|string $value The percentage change of volume (Range: -100 to 400).
     *
     */
    protected function setVolume(int|string $value): static
    {
        $this->value->setSimpleValue('volume', $value);

        return $this;
    }
}
