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
 * Trait LogicalOperatorsTrait
 *
 * @api
 */
trait LogicalOperatorBuilderTrait
{
    /**
     * Logical AND operator
     *
     * '&&'
     *
     */
    public function and_(): ExpressionOperator
    {
        return $this->buildExpression(LogicalOperator::andOperator());
    }

    /**
     * Logical OR operator
     *
     * '||'
     *
     */
    public function or_(): ExpressionOperator
    {
        return $this->buildExpression(LogicalOperator::orOperator());
    }
}
