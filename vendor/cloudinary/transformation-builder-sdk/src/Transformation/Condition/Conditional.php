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

/**
 * Class Condition
 *
 * Represents conditional transformation.
 *
 * @api
 */
class Conditional extends CommonTransformation
{
    /**
     * Condition named constructor.
     */
    public static function ifCondition(
        BaseExpressionComponent|Conditional|string $expression,
        BaseAction|Transformation $action
    ): Conditional {
        $ct = new static();

        $ct->setIfCondition($expression);
        $ct->addAction($action);

        return $ct;
    }

    /**
     * Specifies a condition to be met before applying a transformation.
     *
     * @see https://cloudinary.com/documentation/conditional_transformations
     *
     * @param string|BaseExpressionComponent $expression The conditional expression
     *
     */
    public function setIfCondition(BaseExpressionComponent|string $expression): static
    {
        return $this->addAction(ClassUtils::forceInstance($expression, IfCondition::class));
    }

    /**
     * Specifies a transformation that is applied in the case that the initial condition is evaluated as false.
     *
     * @see https://cloudinary.com/documentation/conditional_transformations
     *
     *
     */
    public function otherwise(Transformation|Action $action): static
    {
        return $this->addAction(new IfElse())->addAction($action);
    }

    /**
     * Finishes the conditional transformation.
     *
     * @see https://cloudinary.com/documentation/conditional_transformations
     *
     */
    protected function endIfCondition(): static
    {
        return $this->addAction(new EndIfCondition());
    }

    /**
     * Serializes transformation to URL.
     *
     * @param string|ImageTransformation|null $withTransformation Optional transformation to append.
     *
     */
    public function toUrl(ImageTransformation|string|null $withTransformation = null): string
    {
        $t = new Transformation();

        $t->addAction(new EndIfCondition());
        $t->addTransformation($withTransformation);

        return parent::toUrl($t);
    }
}
