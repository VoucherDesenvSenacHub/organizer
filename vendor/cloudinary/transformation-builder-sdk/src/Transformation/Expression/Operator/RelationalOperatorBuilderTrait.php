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
 * Trait RelationalOperatorsTrait
 *
 * @api
 */
trait RelationalOperatorBuilderTrait
{
    /**
     * Equals.
     *
     */
    public function equal(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::equal());
    }

    /**
     * Does not equal.
     *
     */
    public function notEqual(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::notEqual());
    }

    /**
     * Less than.
     *
     */
    public function lessThan(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::lessThan());
    }

    /**
     * Greater than.
     *
     */
    public function greaterThan(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::greaterThan());
    }

    /**
     * Less than or equals.
     *
     */
    public function lessThanOrEqual(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::lessThanOrEqual());
    }

    /**
     * Greater than or equals.
     *
     */
    public function greaterThanOrEqual(): ExpressionOperator
    {
        return $this->buildExpression(RelationalOperator::greaterThanOrEqual());
    }
}
