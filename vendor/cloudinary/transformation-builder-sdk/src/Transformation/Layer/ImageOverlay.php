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
 * Class ImageOverlay
 */
class ImageOverlay extends BasePositionalSourceContainer
{
    use ImageSourceTrait;

    /**
     * @var ?BlendMode $blendMode Layer blend mode.
     */
    protected ?BlendMode $blendMode;

    /**
     * ImageOverlay constructor.
     *
     * @param BaseSource|string     $source    The source.
     * @param ?BasePosition         $position  Layer position.
     * @param BlendMode|string|null $blendMode Layer blend mode.
     */
    public function __construct($source = null, ?BasePosition $position = null, BlendMode|string|null $blendMode = null)
    {
        parent::__construct($source, $position);
        $this->blendMode($blendMode);
    }

    /**
     * Sets layer blend mode.
     *
     * @param BlendMode|string|null $blendMode The blend mode.
     *
     */
    public function blendMode(BlendMode|string|null $blendMode = null): static
    {
        $this->blendMode = ClassUtils::verifyInstance($blendMode, EffectQualifier::class, BlendMode::class);

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
        $this->source = ClassUtils::verifyInstance($source, BaseSource::class, ImageSource::class);

        return $this;
    }

    /**
     * Sets the position of the layer.
     *
     * @param BasePosition|null $position The position.
     *
     */
    public function position(?BasePosition $position = null): static
    {
        $this->position = ClassUtils::verifyInstance($position, BasePosition::class, AbsolutePosition::class);

        return $this;
    }

    protected function getSubActionQualifiers(): array
    {
        $subActionQualifiers = parent::getSubActionQualifiers();

        $subActionQualifiers['additional'] = ArrayUtils::mergeNonEmpty(
            $subActionQualifiers['additional'],
            $this->blendMode ? $this->blendMode->getStringQualifiers() : []
        );

        return $subActionQualifiers;
    }
}
