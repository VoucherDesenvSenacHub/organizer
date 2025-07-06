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
 * Defines the supported operators for arithmetic expressions.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/user_defined_variables#supported_arithmetic_operators" target="_blank">
 * Supported arithmetic operators</a>
 *
 *
 * @api
 */
class ArithmeticOperator extends BaseOperator
{
    public const ADD      = 'add';
    public const SUBTRACT = 'sub';
    public const MULTIPLY = 'mul';
    public const DIVIDE = 'div';
    public const MODULO = 'mod';
    public const POWER = 'pow';

    /**
     * @var array $operators The supported arithmetic operators.
     */
    protected static array $operators = [];
    /**
     * @var array $friendlyRepresentations The user-friendly representations of the arithmetic operators.
     */
    protected static array $friendlyRepresentations = [
        '+' => self::ADD,
        '-' => self::SUBTRACT,
        '*' => self::MULTIPLY,
        '/' => self::DIVIDE,
        '%' => self::MODULO,
        '^' => self::POWER,
    ];

    /**
     * Add
     *
     * '+'
     *
     */
    public static function add(): ArithmeticOperator
    {
        return new self(self::ADD);
    }

    /**
     * Alias for ArithmeticOperator::add.
     *
     * +
     *
     * @see ArithmeticOperator::add
     */
    public static function plus(): ArithmeticOperator
    {
        return self::add();
    }

    /**
     * Subtract
     *
     * -
     *
     */
    public static function subtract(): ArithmeticOperator
    {
        return new self(self::SUBTRACT);
    }

    /**
     * Alias for ArithmeticOperator::subtract.
     *
     * -
     *
     * @see ArithmeticOperator::subtract
     */
    public static function minus(): ArithmeticOperator
    {
        return self::subtract();
    }

    /**
     * Multiply
     *
     * *
     *
     */
    public static function multiply(): ArithmeticOperator
    {
        return new self(self::MULTIPLY);
    }

    /**
     * Divide
     *
     * /
     *
     */
    public static function divide(): ArithmeticOperator
    {
        return new self(self::DIVIDE);
    }

    /**
     * Modulo (remainder)
     *
     * %
     *
     */
    public static function modulo(): ArithmeticOperator
    {
        return new self(self::MODULO);
    }

    /**
     * Power (to the power of)
     *
     * ^
     *
     */
    public static function power(): ArithmeticOperator
    {
        return new self(self::POWER);
    }
}
