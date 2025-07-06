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
 * Trait VideoTransformationFlagTrait
 *
 * @api
 */
trait VideoTransformationFlagTrait
{
    /**
     * Don't stream a video that is currently being generated on the fly. Wait until the video is fully generated.
     *
     */
    public function noStream(): static
    {
        return $this->addAction(Flag::noStream());
    }

    /**
     * Causes the video download to begin immediately, streaming it as a fragmented video file.
     *
     * @param string|null $filename The attachment's filename
     *
     *
     * @see Flag::streamingAttachment
     */
    public function streamingAttachment(?string $filename = null): static
    {
        return $this->addAction(Flag::streamingAttachment($filename));
    }

    /**
     * Deliver an HLS adaptive bitrate streaming file as HLS v3 instead of the default version (HLS v4).
     *
     *
     * @see Flag::hlsv3
     */
    public function hlsv3(): static
    {
        return $this->addAction(Flag::hlsv3());
    }

    /**
     * Keep the Display Aspect Ratio metadata of the uploaded video.
     *
     */
    public function keepDar(): static
    {
        return $this->addAction(Flag::keepDar());
    }

    /**
     * Convert the audio channel to mono.
     *
     */
    public function mono(): static
    {
        return $this->addAction(Flag::mono());
    }

    /**
     * Truncate (trim) a video file based on the start time defined in the metadata.
     *
     */
    public function truncateTS(): static
    {
        return $this->addAction(Flag::truncateTS());
    }

    /**
     * Create a waveform image (in the format specified by the file extension) from the audio or video file.
     *
     */
    public function waveform(): static
    {
        return $this->addAction(Flag::waveform());
    }
}
