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

/**
 * Trait ConditionQualifierTrait
 *
 * @api
 */
trait ConditionQualifierTrait
{
    /**
     * Sets up a conditional transformation.
     *
     * @param string|null $expression The condition to meet in order to apply the transformation.
     *
     *
     * @see IfCondition
     * @see https://cloudinary.com/documentation/conditional_transformations Conditional transformations
     */
    public static function ifCondition(?string $expression): IfCondition
    {
        return new IfCondition($expression);
    }
}
