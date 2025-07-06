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
 * Class BaseExpressionBuilder
 *
 * @api
 */
abstract class BaseExpression extends BaseExpressionComponent
{
    /**
     * @var ExpressionComponent|string|null  $exprValue The expression value.
     */
    protected ExpressionComponent|string|null $exprValue;

    /**
     * ExpressionComponent constructor.
     *
     */
    public function __construct($exprUserVariableName)
    {
        parent::__construct();

        $this->exprValue = $exprUserVariableName;
    }

    /**
     * Internal expression builder.
     *
     * @param ArithmeticOperator|string|null $operator The operator to use for building the expression.
     *
     */
    protected function buildExpression(ArithmeticOperator|string|null $operator): ExpressionOperator
    {
        return new ExpressionOperator(new ExpressionComponent($this->exprValue, $operator));
    }

    /**
     * Sets the right operand.
     *
     *
     */
    protected function setRightOperand($rightOperand): Expression
    {
        $this->exprValue->setRightOperand($rightOperand);

        return new Expression($this->exprValue);
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return ExpressionUtils::normalize($this->exprValue);
    }


    /**
     * Serializes to JSON.
     *
     */
    public function jsonSerialize(): array
    {
        return $this->exprValue->jsonSerialize();
    }
}
