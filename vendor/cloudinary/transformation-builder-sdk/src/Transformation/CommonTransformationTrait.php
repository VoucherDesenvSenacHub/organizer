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
use Cloudinary\Transformation\Expression\BaseExpressionComponent;
use Cloudinary\Transformation\Qualifier\GenericQualifier;
use Cloudinary\Transformation\Variable\Variable;

/**
 * Trait TransformationTrait
 *
 * @api
 */
trait CommonTransformationTrait
{
    use TransformationResizeTrait;
    use TransformationDeliveryTrait;
    use CommonTransformationFlagTrait;
    use TransformationCustomFunctionTrait;

    /**
     * Applies a filter or an effect on an asset.
     *
     *
     */
    public function effect(EffectQualifier|EffectAction $effect): static
    {
        return $this->addAction($effect);
    }

    /**
     * Applies adjustment effect on an asset.
     *
     *
     */
    public function adjust(EffectQualifier|EffectAction|Opacity|LutLayer $adjustment): static
    {
        return $this->addAction($adjustment);
    }

    /**
     * Applies a pre-defined named transformation of the given name.
     *
     *
     */
    public function namedTransformation(string $transformationName): static
    {
        return $this->addAction(ClassUtils::verifyInstance($transformationName, NamedTransformation::class));
    }

    /**
     * Adds a generic qualifier as a separate action.
     *
     * @param string      $shortName The generic qualifier name.
     * @param array|mixed $value     The generic qualifier value.
     *
     */
    public function addGenericQualifier(string $shortName, ...$value): static
    {
        return $this->addAction(new GenericQualifier($shortName, ...$value));
    }

    /**
     * Adds action defined as an array of qualifiers.
     *
     * @param array $qualifiers An associative array of qualifiers
     *
     *
     * @see QualifiersAction
     */
    public function addActionFromQualifiers(array $qualifiers): static
    {
        return $this->addAction(new QualifiersAction($qualifiers));
    }

    /**
     * Adds a flag as a separate action.
     *
     * @param string|FlagQualifier $flag The flag to add.
     *
     */
    public function addFlag(FlagQualifier|string $flag): static
    {
        return $this->addAction(ClassUtils::verifyInstance($flag, FlagQualifier::class));
    }

    /**
     * Defines an new user variable.
     *
     * @param Variable|string|null $name  The variable name or the Variable instance.
     * @param mixed|null           $value The variable value.
     *
     */
    public function addVariable(Variable|string|null $name, mixed $value = null): static
    {
        return $this->addAction(ClassUtils::verifyInstance($name, Variable::class, null, $value));
    }

    /**
     * Rotates the asset by the given angle.
     *
     * @param int|string|Rotate $angle The rotation angle.
     *
     */
    public function rotate(int|string|Rotate $angle): static
    {
        return $this->addAction(ClassUtils::verifyInstance($angle, Rotate::class));
    }

    /**
     * Specifies a conditional transformation whose condition should be met before applying a transformation.
     *
     * @param Conditional|BaseExpressionComponent $conditionalTransformation The conditional transformation.
     *
     *
     * @see https://cloudinary.com/documentation/conditional_transformations
     */
    public function conditional(Conditional|BaseExpressionComponent $conditionalTransformation): static
    {
        return $this->addTransformation(ClassUtils::verifyInstance($conditionalTransformation, Conditional::class));
    }
}
