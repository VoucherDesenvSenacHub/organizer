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
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class CommonTransformation
 */
class CommonTransformation extends BaseComponent implements CommonTransformationInterface
{
    use CommonTransformationTrait;

    /**
     * @var array $actions The components (actions) of the transformation.
     */
    protected array $actions = [];

    /**
     * CommonTransformation constructor.
     *
     * @param mixed $transformation
     */
    public function __construct($transformation = null)
    {
        parent::__construct();

        if ($transformation === null) {
            return;
        }

        if (is_string($transformation)) {
            $this->actions [] = $transformation; // TODO: wrap with some GenericTransformation class
        } elseif (is_array($transformation)) {
            $this->addActionFromQualifiers($transformation);
        } elseif ($transformation instanceof self) {
            $this->addTransformation($transformation);
        } else {
            $this->addAction($transformation);
        }
    }

    /**
     * Transformation named constructor.
     *
     *
     */
    public static function generic($transformation): static
    {
        return new static($transformation);
    }

    /**
     * Creates a new Transformation instance from an array of transformation qualifiers.
     *
     * @param array $qualifiers An array of transformation qualifiers.
     *
     */
    public static function fromParams(array $qualifiers): static
    {
        return (new static())->addActionFromQualifiers($qualifiers);
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
        if ($action instanceof BaseQualifier) {
            $action = new Action($action);
        }

        $this->actions[] = $action;

        return $this;
    }

    /**
     * Adds (appends) a transformation.
     *
     * Appended transformation is nested.
     *
     * @param mixed $transformation The transformation to add.
     *
     */
    public function addTransformation(mixed $transformation): static
    {
        $this->actions[] = ClassUtils::forceInstance($transformation, CommonTransformation::class);

        return $this;
    }

    /**
     * Deep copy of the transformation.
     */
    public function __clone()
    {
        $this->actions = ArrayUtils::deepCopy($this->actions);
    }

    /**
     * Serializes transformation to URL.
     *
     * @param string|ImageTransformation|null $withTransformation Optional transformation to append.
     *
     */
    public function toUrl(ImageTransformation|string|null $withTransformation = null): string
    {
        if ($withTransformation === null) {
            return ArrayUtils::implodeUrl($this->actions);
        }

        if (empty($this->actions)) {
            return (string)$withTransformation;
        }

        $resultingComponents   = ArrayUtils::deepCopy($this->actions);
        $resultingComponents[] = $withTransformation;

        return ArrayUtils::implodeUrl($resultingComponents);
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toUrl();
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        // TODO: Implement jsonSerialize() method.
        return ['name' => $this->getFullName(), 'actions' => $this->actions];
    }
}
