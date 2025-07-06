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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Interface CommonTransformationInterface
 */
interface CommonTransformationInterface extends ComponentInterface
{
    /**
     * Forces format conversion to the given format.
     *
     * (Formerly known as fetch format).
     *
     * @param Format|string|null $format The format in which to deliver the asset.
     *
     *
     * @see Format
     */
    public function format(Format|string|null $format): static;

    /**
     * Controls compression quality.
     *
     * Reducing the quality is a trade-off between visual quality and file size.
     *
     * @param Quality|int|float|string|null  $quality The quality value. (Range 1 to 100)
     *
     */
    public function quality(Quality|int|float|string|null $quality): static;

    /**
     * Applies a filter or an effect on an asset.
     *
     * @param EffectAction|EffectQualifier $effect The effect to apply.
     *
     *
     * @see EffectAction
     * @see EffectQualifier
     */
    public function effect(EffectQualifier|EffectAction $effect): static;

    /**
     * Applies an adjustment effect on an asset.
     *
     * @param EffectAction|EffectQualifier $adjustment The adjustment effect to apply.
     *
     *
     * @see EffectAction
     * @see EffectQualifier
     */
    public function adjust(EffectQualifier|EffectAction $adjustment): static;

    /**
     * Applies a pre-defined transformation of the given name.
     *
     * @param string $transformationName The name of the transformation.
     *
     */
    public function namedTransformation(string $transformationName): static;

    /**
     * Adds a generic qualifier as a separate action.
     *
     * @param string      $shortName The generic qualifier name.
     * @param array|mixed $value     The generic qualifier value.
     *
     */
    public function addGenericQualifier(string $shortName, ...$value): static;

    /**
     * Adds (chains) a transformation action.
     *
     * @param BaseAction|BaseQualifier|mixed $action The transformation action to add.
     *                                               If BaseQualifier is provided, it is wrapped with action.
     *
     */
    public function addAction(mixed $action): static;

    /**
     * Adds (appends) a transformation.
     *
     * Appended transformation is nested.
     *
     * @param CommonTransformation $transformation The transformation to add.
     *
     */
    public function addTransformation(CommonTransformation $transformation): static;

    /**
     * Adds action defined as an array of qualifiers.
     *
     * @param array $qualifiers An associative array of qualifiers
     *
     *
     * @see QualifiersAction
     */
    public function addActionFromQualifiers(array $qualifiers): static;

    /**
     * Defines a new user variable.
     *
     * @param string $name  The variable name
     * @param mixed  $value The variable value
     *
     */
    public function addVariable(string $name, mixed $value): static;

    /**
     * Rotates the asset by the given angle.
     *
     * @param int|string $angle The rotation angle.
     *
     */
    public function rotate(int|string $angle): static;

    /**
     * Specifies a conditional transformation whose condition should be met before applying a transformation.
     *
     * @param Conditional $conditionalTransformation The conditional transformation.
     *
     *
     * @see https://cloudinary.com/documentation/conditional_transformations
     */
    public function conditional(Conditional $conditionalTransformation): static;
}
