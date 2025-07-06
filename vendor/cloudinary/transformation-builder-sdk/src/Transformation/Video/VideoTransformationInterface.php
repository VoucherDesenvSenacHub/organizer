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
 * Interface VideoTransformationInterface
 *
 * @api
 */
interface VideoTransformationInterface extends CommonTransformationInterface
{
    /**
     * Shortens a video to the specified range.
     *
     * @param Timeline $range The part of the video to keep.
     *
     *
     * @see Timeline
     */
    public function trim(Timeline $range): static;

    /**
     * Rounds the corners of a video.
     *
     * @param int|string $radius The radius of the corners in pixels.
     *
     */
    public function roundCorners(int|string $radius): static;

    /**
     * Adds another video, text or image as an overlay over the container video.
     *
     * @param string|BaseSource $videoLayer The overlay.
     * @param BasePosition|null $position   The position of the overlay.
     * @param Timeline|null     $timeline   The timeline position of the overlay.
     *
     */
    public function overlay(
        BaseSource|string $videoLayer,
        ?BasePosition $position = null,
        ?Timeline $timeline = null
    ): static;

    /**
     * Concatenates another video or image.
     *
     * @param string|Concatenate|VideoSource $videoLayer The layer to concatenate.
     *
     */
    public function concatenate(Concatenate|string|VideoSource $videoLayer): static;

    /**
     * Applies the video as a cutter for the main video.
     *
     * @param string|VideoSource $videoLayer The cutter video layer.
     * @param BasePosition|null  $position   The position of the cutter.
     * @param Timeline|null      $timeline   The timeline position of the cutter.
     *
     */
    public function cutter(
        string|VideoSource $videoLayer,
        ?BasePosition $position = null,
        ?Timeline $timeline = null
    ): static;

    /**
     * Adds subtitles to the video.
     *
     * @param string $subtitlesId The subtitles file public ID.
     *
     */
    public function addSubtitles(string $subtitlesId): mixed;

    /**
     * Transcodes the video (or audio) to another format.
     *
     * @param AudioCodec|AudioFrequency|ToAnimatedAction|VideoCodec $transcode The new format.
     *
     */
    public function transcode(AudioCodec|ToAnimatedAction|AudioFrequency|VideoCodec $transcode): static;
}
