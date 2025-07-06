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

use Cloudinary\ClassUtils;

/**
 * Trait VideoSpecificTransformationTrait
 *
 * @api
 */
trait VideoSpecificTransformationTrait
{
    use VideoTransformationFlagTrait;

    /**
     * Trims a video (and discards the rest).
     *
     * @param Timeline $range Specify the range of the video to leave.
     *
     *
     * @see https://cloudinary.com/documentation/video_trimming_and_concatenating#trimming_videos
     */
    public function trim(Timeline $range): static
    {
        return $this->addAction($range);
    }

    /**
     * Rounds the corners of a video.
     *
     * @param int|string $radius The radius of the corners in pixels.
     *
     *
     * @see https://cloudinary.com/documentation/video_effects_and_enhancements#rounding
     */
    public function roundCorners(int|string $radius): static
    {
        return $this->addAction(ClassUtils::verifyInstance($radius, RoundCorners::class));
    }

    /**
     * Adds another video, text, image as an overlay over the container video.
     *
     * @param string|BaseSourceContainer|BaseSource $videoLayer The overlay.
     * @param BasePosition|null                     $position   The position of the overlay.
     * @param Timeline|null                         $timeline   The timeline position of the overlay.
     *
     *
     * @see https://cloudinary.com/documentation/video_layers#video_overlays
     */
    public function overlay(
        BaseSource|BaseSourceContainer|string $videoLayer,
        ?BasePosition $position = null,
        ?Timeline $timeline = null
    ): static {
        return $this->addAction(
            ClassUtils::verifyInstance(
                $videoLayer,
                BaseSourceContainer::class,
                VideoOverlay::class,
                $position,
                $timeline
            )
        );
    }

    /**
     * Concatenates another video or image.
     *
     * @param string|Concatenate|BaseSource $videoLayer The source of the video/audio to concatenate.
     *
     *
     * @see https://cloudinary.com/documentation/video_trimming_and_concatenating#concatenating_media
     */
    public function concatenate(Concatenate|BaseSource|string $videoLayer): static
    {
        return $this->addAction(ClassUtils::verifyInstance($videoLayer, Concatenate::class));
    }

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
    ): static {
        return $this->addAction(
            (new VideoOverlay($videoLayer, $position, $timeline))->cutter()
        );
    }

    /**
     * Adds subtitles to the video.
     *
     * @param string $subtitlesId The subtitles file public ID.
     *
     */
    public function addSubtitles(string $subtitlesId): static
    {
        return $this->overlay(VideoSource::subtitles($subtitlesId));
    }

    /**
     * Transcodes the video (or audio) to another format / adjusts encoding properties.
     *
     * @param AudioCodec|AudioFrequency|ToAnimatedAction|VideoCodec|Fps $transcode The new format or encoding property.
     *
     */
    public function transcode(AudioCodec|ToAnimatedAction|AudioFrequency|VideoCodec|Fps $transcode): static
    {
        return $this->addAction($transcode);
    }

    /**
     * Controls the range of acceptable FPS (Frames Per Second) to ensure that video (even when optimized)
     * is delivered with an expected fps level (helps with sync to audio).
     *
     * @param float|int|string|Fps  $min The minimum frame rate.
     * @param float|int|string|null $max The maximum frame rate.
     *
     */
    public function fps(float|int|string|Fps $min, float|int|string|null $max = null): static
    {
        return $this->addAction(ClassUtils::verifyInstance($min, Fps::class, null, $max));
    }

    /**
     * Explicitly sets the keyframe interval of the delivered video.
     *
     * @param mixed $interval Positive float number in seconds.
     *
     */
    public function keyframeInterval(mixed $interval): static
    {
        return $this->addAction(ClassUtils::verifyInstance($interval, KeyframeInterval::class));
    }

    /**
     * Controls the video bitrate.
     *
     * @param int|string  $bitRate The number of bits used to represent the video data per second. By default the video
     *                             uses a variable bitrate (VBR), with this value indicating the maximum bitrate.
     *                             Can be an integer e.g. 120000, or a string supporting "k" and "m"
     *                             (kilobits and megabits respectively) e.g. 250k or 2m.
     * @param string|null $type    The type of bitrate. If "constant" is specified, the video plays with a constant
     *                             bitrate (CBR). Use the constant defined in the BitRate class.
     *
     */
    public function bitRate(int|string $bitRate, ?string $type = null): static
    {
        return $this->addAction(ClassUtils::verifyInstance($bitRate, BitRate::class, null, $type));
    }

    /**
     * Sets the streaming profile to apply to an HLS or MPEG-DASH adaptive bitrate streaming video.
     *
     * The value can be one of the pre-defined streaming profiles or a custom-defined one.
     * You can use the streaming profiles methods of StreamingProfilesTrait to get a list of the available streaming
     * profiles or to create new custom profiles.
     *
     * @param string $streamingProfile The streaming profile.
     *
     *
     * @see https://cloudinary.com/documentation/adaptive_bitrate_streaming#predefined_streaming_profiles
     *
     */
    public function streamingProfile(string $streamingProfile): static
    {
        return $this->addAction(ClassUtils::verifyInstance($streamingProfile, StreamingProfile::class));
    }

    /**
     * Sets the total number of frames to sample from the original video.
     *
     * Relevant when converting videos to animated GIF or WebP format. If not specified, the resulting GIF or WebP
     * samples the whole video (up to 400 frames, at up to 10 frames per second). By default the duration of the
     * animated image is the same as the duration of the video, no matter how many frames are sampled from the original
     * video (use the delay qualifier to adjust the amount of time between frames).
     *
     * @param int|string $value Integer - The total number of frames to sample from the original video. The frames are
     *                          spread out over the length of the video, e.g. 20 takes one frame every 5%.
     *                          String - The number of seconds between each frame to sample from the original video.
     *                          e.g. 2.3s takes one frame every 2.3 seconds.
     *
     */
    public function videoSampling(int|string $value): static
    {
        return $this->addAction(ClassUtils::verifyInstance($value, VideoSampling::class));
    }

    /**
     * Applies the specified video edit action.
     *
     * @param mixed $videoEdit The video edit action.
     *
     */
    public function videoEdit(mixed $videoEdit): static
    {
        return $this->addAction($videoEdit);
    }
}
