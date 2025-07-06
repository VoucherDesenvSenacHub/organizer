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
 * Class SourceBasedEffectAction
 *
 * This is a base class for all source based effects.
 *
 * @internal
 */
abstract class SourceBasedEffectAction extends EffectAction
{
    /**
     * @var ?BaseSource $source The source of the layer.
     */
    protected ?BaseSource $source;

    /**
     * @var ?BasePosition $position Layer position.
     */
    protected ?BasePosition $position;

    /**
     * BaseLayerContainer constructor.
     *
     * @param EffectQualifier|string $effect   The effect name.
     * @param BaseSource|string|null $source   The source.
     * @param BasePosition|null          $position Layer position.
     */
    public function __construct($effect, BaseSource|string|null $source = null, ?BasePosition $position = null)
    {
        parent::__construct($effect);

        $this->source($source);
        $this->position($position);
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

    /**
     * Collects source based action grouped by sub-actions.
     *
     *  Typical source based action consists of 2 to 3 components.
     *
     *  For example, if we take:
     *      l_logo/c_scale,w_100/e_screen,fl_layer_apply,fl_no_overflow,g_south,y_20
     *
     *  We can see:
     *      - source part (l_).
     *      - nested transformation (optional).
     *      - fl_layer_apply part with position, blend mode, and additional flags/qualifiers.
     *
     * Occasionally the source part(l_) has additional qualifiers/flags, they come with the source itself.
     *
     * @return array An array of grouped qualifiers
     *
     * @internal
     */
    protected function getSubActionQualifiers(): array
    {
        $sourceQualifiers     = $this->source ? $this->source->getStringQualifiers() : [];
        $sourceTransformation = $this->source?->getTransformation();
        $positionQualifiers   = $this->position ? $this->position->getStringQualifiers() : [];
        $additionalQualifiers = $this->getStringQualifiers();

        $additionalQualifiers [] = Flag::layerApply();

        return [
            'source'         => $sourceQualifiers,
            'transformation' => $sourceTransformation,
            'additional'     => ArrayUtils::mergeNonEmpty($positionQualifiers, $additionalQualifiers),
        ];
    }

    /**
     * Serializes to Cloudinary URL format
     *
     * @return string
     */
    public function __toString()
    {
        $subActions = $this->getSubActionQualifiers();

        return ArrayUtils::implodeUrl([
                                          ArrayUtils::implodeActionQualifiers(...$subActions['source']),
                                          $subActions['transformation'],
                                          ArrayUtils::implodeActionQualifiers(...$subActions['additional']),
                                      ]);
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        return [
            'source'   => $this->source,
            'position' => $this->position,
        ];
    }
}
