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
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class BaseLayer
 */
abstract class BaseSource extends BaseAction
{
    /**
     * @var CommonTransformation $transformation Transformation of the source.
     */
    protected CommonTransformation $transformation;

    /**
     * Sets layer transformation.
     *
     * @param CommonTransformation $t The transformation to set.
     *
     */
    public function transformation(CommonTransformation $t): static
    {
        $this->transformation = clone $t;

        return $this;
    }

    /**
     * Sets stack position of the layer.
     *
     * @param string $position The stack position.
     *
     * @return $this
     */
    public function setStackPosition(string $position): static
    {
        $this->qualifiers['source']->setStackPosition($position);

        return $this;
    }

    /**
     * Adds (chains) a transformation action.
     *
     * @param BaseAction|BaseQualifier|mixed $action The transformation action to add.
     *                                               If BaseQualifier is provided, it is wrapped with action.
     *
     */
    public function addAction(mixed $action): static
    {
        $this->getTransformation()->addAction($action);

        return $this;
    }

    /**
     * Adds a flag as a separate action.
     *
     * @param string|FlagQualifier $flag The flag to add.
     *
     */
    public function addFlag(FlagQualifier|string $flag): static
    {
        $this->getTransformation()->addFlag($flag);

        return $this;
    }


    /**
     * Adds (appends) a transformation.
     *
     * Appended transformation is nested.
     *
     * @param CommonTransformation|BaseAction $transformation The transformation to add.
     *
     */
    public function addTransformation(CommonTransformation|BaseAction $transformation): static
    {
        $this->getTransformation()->addTransformation($transformation);

        return $this;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        $all = parent::__toString();

        return ArrayUtils::implodeUrl([$all, $this->getTransformation(), Flag::layerApply()]);
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        return [
            'source'         => $this::getName(),
            'transformation' => $this->transformation,
        ];
    }

    /**
     * Gets the transformation.
     *
     *
     * @internal
     */
    abstract public function getTransformation(): CommonTransformation;

    /**
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    abstract protected function getSourceQualifier(
    ): BaseSourceQualifier|ImageSourceQualifier|VideoSourceQualifier|FetchSourceQualifier;
}
