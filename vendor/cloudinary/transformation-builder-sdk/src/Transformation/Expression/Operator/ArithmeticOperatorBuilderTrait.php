<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

/**
 * Trait ArithmeticExpressionOperatorsTrait
 *
 * @api
 */
trait ArithmeticOperatorBuilderTrait
{
    /**
     * Add.
     */
    public function add(): ExpressionOperator
    {
        return $this->buildExpression(ArithmeticOperator::add());
    }

    /**
     * Subtract.
     */
    public function subtract(): ExpressionOperator
    {
        return $this->buildExpression(ArithmeticOperator::subtract());
    }

    /**
     * Multiply.
     */
    public function multiply(): ExpressionOperator
    {
        return $this->buildExpression(ArithmeticOperator::multiply());
    }

    /**
     * Divide.
     */
    public function divide(): ExpressionOperator
    {
        return $this->buildExpression(ArithmeticOperator::divide());
    }

    /**
     * Modulo.
     */
    public function modulo(): ExpressionOperator
    {
        return $this->buildExpression(ArithmeticOperator::modulo());
    }
}
