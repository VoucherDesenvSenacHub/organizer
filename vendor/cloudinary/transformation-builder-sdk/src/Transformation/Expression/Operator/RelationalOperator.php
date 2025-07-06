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
 * The relational operators for evaluating numeric expressions.
 *
 * @api
 */
class RelationalOperator extends BaseOperator
{
    public const EQUAL = 'eq';
    public const NOT_EQUAL = 'ne';
    public const LESS_THAN = 'lt';
    public const GREATER_THAN = 'gt';
    public const LESS_THAN_OR_EQUAL = 'lte';
    public const GREATER_THAN_OR_EQUAL = 'gte';

    /**
     * The supported relational operators.
     *
     * @var array $operators
     */
    protected static array $operators = [];

    /**
     * The user-friendly representations of the relational operators.
     *
     * @var array $friendlyRepresentations
     */
    protected static array $friendlyRepresentations = [
        '='  => self::EQUAL,
        '!=' => self::NOT_EQUAL,
        '<'  => self::LESS_THAN,
        '>'  => self::GREATER_THAN,
        '<=' => self::LESS_THAN_OR_EQUAL,
        '>=' => self::GREATER_THAN_OR_EQUAL,
    ];

    /**
     * Equals.
     *
     */
    public static function equal(): RelationalOperator
    {
        return new static(self::EQUAL);
    }

    /**
     * Does not equal.
     *
     */
    public static function notEqual(): RelationalOperator
    {
        return new static(self::NOT_EQUAL);
    }

    /**
     * Less than.
     *
     */
    public static function lessThan(): RelationalOperator
    {
        return new static(static::LESS_THAN);
    }

    /**
     * Greater than.
     *
     */
    public static function greaterThan(): RelationalOperator
    {
        return new static(self::GREATER_THAN);
    }

    /**
     * Less than or equals.
     *
     */
    public static function lessThanOrEqual(): RelationalOperator
    {
        return new static(self::LESS_THAN_OR_EQUAL);
    }

    /**
     * Greater than or equals.
     *
     */
    public static function greaterThanOrEqual(): RelationalOperator
    {
        return new static(self::GREATER_THAN_OR_EQUAL);
    }
}
