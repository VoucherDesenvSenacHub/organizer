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

use Cloudinary\ArrayUtils;
use Cloudinary\ClassUtils;

/**
 * Defines how the audio layer is applied.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#audio_overlays" target="_blank">
 * Audio overlays</a>
 *
 * @api
 */
class AudioOverlay extends BaseSourceContainer
{
    /**
     * @var ?Timeline $timeline The timeline position of the overlay.
     */
    protected ?Timeline $timeline;

    /**
     * BaseLayerContainer constructor.
     *
     * @param BaseSource|string $source
     */
    public function __construct($source = null, ?Timeline $timeline = null) {
        parent::__construct($source);

        $this->timeline($timeline);
    }

    /**
     * Sets the timeline position of the overlay.
     *
     * @param Timeline|null $timeline The timeline position of the overlay.
     *
     */
    public function timeline(?Timeline $timeline = null): static
    {
        $this->timeline = $timeline;

        return $this;
    }

    /**
     * Indicates that the video should be concatenated on to the container video and not added as an overlay.
     *
     * @return $this
     */
    protected function concatenate(): static
    {
        $this->source->setFlag(LayerFlag::splice());

        return $this;
    }

    /**
     * Sets the source.
     *
     * @param BaseSource|string|null $source The source.
     *
     */
    public function source(BaseSource|string|null $source): static
    {
        $this->source = ClassUtils::verifyInstance($source, BaseSource::class, AudioSource::class);

        return $this;
    }

    protected function getSubActionQualifiers(): array
    {
        $subActionQualifiers = parent::getSubActionQualifiers();

        $subActionQualifiers['additional'] = ArrayUtils::mergeNonEmpty(
            $subActionQualifiers['additional'],
            $this->timeline? $this->timeline->getStringQualifiers(): []
        );

        return $subActionQualifiers;
    }
}
