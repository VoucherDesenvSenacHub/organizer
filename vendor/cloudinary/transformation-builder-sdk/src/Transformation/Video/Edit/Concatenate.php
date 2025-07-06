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
 * Indicates that the video should be concatenated on to the container video and not added as an overlay.
 *
 * @api
 */
class Concatenate extends VideoOverlay
{
    /**
     * Concatenate constructor.
     *
     * @param BaseSource|string $source The source of the video to concatenate.
     */
    public function __construct($source = null)
    {
        parent::__construct($source);

        $this->concatenate();
    }

    /**
     * Concatenate video.
     *
     * @param mixed $source The video source.
     *
     */
    public static function videoSource(mixed $source): VideoSource
    {
        return ClassUtils::verifyInstance($source, VideoSource::class);
    }

    /**
     * Concatenate audio.
     *
     * @param mixed $source The audio source.
     *
     */
    public static function audioSource(mixed $source): AudioSource
    {
        return ClassUtils::verifyInstance($source, AudioSource::class);
    }

    /**
     * Concatenate image.
     *
     * @param mixed $source The image source.
     *
     */
    public static function imageSource(mixed $source): ImageSource
    {
        return ClassUtils::verifyInstance($source, ImageSource::class);
    }


    /**
     * Indicates whether to concatenate the video before the original video.
     *
     *
     * @return $this
     */
    public function prepend(bool $prepend = true): static
    {
        $timeline = Timeline::position(0);
        if (! $prepend) {
            $timeline = null;
        }

        $this->timeline($timeline);

        return $this;
    }

    /**
     * Specifies the video to use as a transition.
     *
     * @param BaseSource|mixed $source A luma matte transition video.
     *
     * @return $this
     */
    public function transition(mixed $source): static
    {
        $this->source->addTransformation(ClassUtils::verifyInstance($source, Transition::class));
        // When using a transition video, splice flag should be omitted.
        $this->source->unsetFlag(LayerFlag::splice());

        return $this;
    }

    /**
     * Sets the duration of the source video to keep.
     *
     * * Always appears in the same component next to the l_{source}, and not next to the fl_layer_apply.
     *
     * @param mixed $duration The length of the part of the video to keep. This can be specified as a float
     *                        representing the time in seconds or a string representing the percentage of the
     *                        video length (for example, "30%" or "30p").
     *
     * @return $this
     */
    public function duration(mixed $duration): static
    {
        $this->source->addQualifier(ClassUtils::verifyInstance($duration, Duration::class));

        return $this;
    }
}
