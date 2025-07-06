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
 * Class BasePositionalSourceContainer
 *
 * This is a base class for all source (layer) containers (overlays/underlays) having position.
 *
 * @internal
 */
abstract class BasePositionalSourceContainer extends BaseSourceContainer
{

    /**
     * @var ?BasePosition $position Layer position.
     */
    protected ?BasePosition $position;

    /**
     * BaseLayerContainer constructor.
     *
     * @param BaseSource|string|null $source   The source.
     * @param BasePosition|null      $position Layer position.
     */
    public function __construct(BaseSource|string|null $source = null, ?BasePosition $position = null)
    {
        parent::__construct();

        $this->source($source);
        $this->position($position);
    }

    /**
     * Sets the source position.
     *
     * @param Position|null $position The Position of the layer.
     *
     */
    abstract public function position(?BasePosition $position = null): static;

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
        $subActionQualifiers = parent::getSubActionQualifiers();

        $subActionQualifiers['additional'] = ArrayUtils::mergeNonEmpty(
            $subActionQualifiers['additional'],
            $this->position ? $this->position->getStringQualifiers() : []
        );

        return $subActionQualifiers;
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();

        $result['position'] = $this->position;

        return $result;
    }
}
