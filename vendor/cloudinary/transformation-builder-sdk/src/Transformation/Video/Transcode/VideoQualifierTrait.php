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
 * Trait VideoQualifierTrait
 *
 * @api
 */
trait VideoQualifierTrait
{
    /**
     * Controls the video bitrate.
     *
     * Supported codecs: h264, h265 (MPEG-4); vp8, vp9 (WebM).
     *
     * @param int|string  $bitRate The number of bits used to represent the video data per second. By default the video
     *                             uses a variable bitrate (VBR), with this value indicating the maximum bitrate.
     *                             The value can be an integer e.g. 120000, or a string supporting "k" and "m"
     *                             (kilobits and megabits respectively) e.g. 250k or 2m.
     * @param string|null $type    The type of bitrate. If "constant" is specified, the video plays with a constant
     *                             bitrate (CBR). Use the constant defined in the BitRate class.
     *
     *
     * @see BitRate
     */
    public static function bitRate(int|string $bitRate, ?string $type = null): BitRate
    {
        return new BitRate($bitRate, $type);
    }

    /**
     * Controls the range of acceptable FPS (Frames Per Second) to ensure that video (even when optimized) is
     * delivered with an expected FPS level (helps with sync to audio).
     *
     * @param int|string|null $min The minimum frame rate.
     * @param int|string|null $max The maximum frame rate.
     *
     */
    public static function fps(int|string|null $min = null, int|string|null $max = null): Fps
    {
        return new Fps($min, $max);
    }

    /**
     * Controls the range of acceptable FPS (Frames Per Second) to ensure that video (even when optimized) is
     * delivered with an expected FPS level (helps with sync to audio).
     *
     * @param int|null $min The minimum frame rate.
     * @param int|null $max The maximum frame rate.
     *
     */
    public static function fpsRange(?int $min = null, ?int $max = null): Fps
    {
        return static::fps($min, $max);
    }

    /**
     * Sets the keyframe interval of the delivered video.
     *
     * @param float|int|string $interval The keyframe interval in seconds.
     *
     */
    public static function keyframeInterval(float|int|string $interval): KeyframeInterval
    {
        return new KeyframeInterval($interval);
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
     * @see https://cloudinary.com/documentation/adaptive_bitrate_streaming#predefined_streaming_profiles
     */
    public static function streamingProfile(string $streamingProfile): StreamingProfile
    {
        return ClassUtils::verifyInstance($streamingProfile, StreamingProfile::class);
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
    public static function videoSampling(int|string $value): VideoSampling
    {
        return new VideoSampling($value);
    }
}
