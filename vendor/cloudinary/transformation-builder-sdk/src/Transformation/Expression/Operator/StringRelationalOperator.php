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
 * The relational operators for evaluating string expressions.
 *
 * @api
 */
class StringRelationalOperator extends BaseOperator
{
    public const EQUAL = 'eq';
    public const NOT_EQUAL = 'ne';
    public const IN        = 'in';
    public const NOT_IN = 'nin';

    /**
     * The supported string relational operators.
     *
     * @var array $operators
     */
    protected static array $operators = [];

    /**
     * The user-friendly representations of the string relational operators.
     *
     * @var array $friendlyRepresentations
     */
    protected static array $friendlyRepresentations = [
        '='   => self::EQUAL,
        '!='  => self::NOT_EQUAL,
        'in'  => self::IN,
        'nin' => self::NOT_IN,
    ];

    /**
     * String Equals.
     *
     */
    public static function equal(): StringRelationalOperator
    {
        return new static(self::EQUAL);
    }

    /**
     * String does not equal.
     *
     */
    public static function notEqual(): StringRelationalOperator
    {
        return new static(self::NOT_EQUAL);
    }

    /**
     * Is in (a list of strings).
     *
     */
    public static function in(): StringRelationalOperator
    {
        return new static(self::IN);
    }

    /**
     * Is not in (a list of strings).
     *
     */
    public static function notIn(): StringRelationalOperator
    {
        return new static(self::NOT_IN);
    }
}
