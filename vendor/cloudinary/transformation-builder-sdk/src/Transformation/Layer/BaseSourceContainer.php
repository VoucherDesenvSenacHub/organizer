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

/**
 * Class BaseSourceContainer
 *
 * This is a base class for all source (layer) containers (overlays/underlays).
 *
 * @internal
 */
abstract class BaseSourceContainer extends BaseAction
{
    /**
     * @var ?BaseSource $source The source of the layer.
     */
    protected ?BaseSource $source;

    /**
     * BaseSourceContainer constructor.
     *
     * @param BaseSource|string|null $source   The source.
     */
    public function __construct(BaseSource|string|null $source = null)
    {
        parent::__construct();

        $this->source($source);
    }

    /**
     * Sets the source.
     *
     * @param BaseSource|string|null $source The source.
     *
     */
    abstract public function source(BaseSource|string|null $source): static;

    /**
     * Sets stack position of the source.
     *
     * @param string $stackPosition The stack position.
     *
     * @return $this
     */
    public function setStackPosition(string $stackPosition): static
    {
        $this->source->setStackPosition($stackPosition);

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
        $sourceTransformation = $this->source ? $this->source->getTransformation() : null;
        $additionalQualifiers = $this->getStringQualifiers();

        $additionalQualifiers [] = Flag::layerApply();

        return [
            'source'         => $sourceQualifiers,
            'transformation' => $sourceTransformation,
            'additional'     => $additionalQualifiers,
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
     *
     */
    public function jsonSerialize(): array
    {
        return [
            'source'   => $this->source,
        ];
    }
}
