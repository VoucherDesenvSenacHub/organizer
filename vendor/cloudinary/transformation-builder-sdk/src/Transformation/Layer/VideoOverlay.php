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
 * Defines how the video layer is applied.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#video_overlays" target="_blank">
 * Video overlays</a>
 *
 * @api
 */
class VideoOverlay extends BasePositionalSourceContainer
{
    /**
     * @var ?Timeline $timeline The timeline position of the overlay.
     */
    protected ?Timeline $timeline;

    /**
     * BaseLayerContainer constructor.
     *
     * @param BaseSource|string|null $source Overlay source.
     * @param BasePosition|null $position Overlay position.
     * @param Timeline|null     $timeline Overlay timeline position.
     */
    public function __construct(
        BaseSource|string|null $source = null,
        BasePosition|null $position = null,
        Timeline|null $timeline = null
    ) {
        parent::__construct($source, $position);

        $this->timeline($timeline);
    }

    /**
     * Sets the timeline position of the overlay.
     *
     * @param Timeline|null $timeline The timeline position of the overlay.
     *
     */
    public function timeline(?Timeline $timeline = null): BasePositionalSourceContainer
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
     * Indicates that the video should be used as a cutter for the main video.
     *
     * @return $this
     */
    public function cutter(): static
    {
        $this->source->setFlag(LayerFlag::cutter());

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
        $this->source = ClassUtils::verifyInstance($source, BaseSource::class, VideoSource::class);

        return $this;
    }

    /**
     * Sets the layer position.
     *
     * @param Position|BasePosition|null $position The Position of the layer.
     *
     */
    public function position(Position|BasePosition|null $position = null): static
    {
        $this->position = ClassUtils::verifyInstance($position, BasePosition::class, AbsolutePosition::class);

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
