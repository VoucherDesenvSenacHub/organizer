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

use Cloudinary\ArrayUtils;
use Cloudinary\ClassUtils;
use UnexpectedValueException;

/**
 * Class BaseOperator
 *
 * @api
 */
abstract class BaseOperator extends BaseExpressionComponent
{
    /**
     * @var string $operator The operator.
     */
    protected string $operator;

    protected static array $operators = [];

    protected static array $friendlyRepresentations = [];

    // These static properties are defined in corresponding derived classes, otherwise they will be shared among
    // derived classes

    // protected static $operators;
    // protected static $friendlyRepresentations;

    /**
     * BaseOperator constructor.
     *
     */
    public function __construct($operator)
    {
        parent::__construct();

        $this->setOperator($operator);
    }

    /**
     * Gets supported operators.
     *
     */
    protected static function operators(): array
    {
        return self::getConstants(static::$operators);
    }

    /**
     * Gets friendly representations.
     *
     */
    protected static function friendlyRepresentations(): array
    {
        return static::$friendlyRepresentations;
    }

    /**
     * Sets the operator.
     *
     * @param string $operator The operator to set.
     */
    protected function setOperator(string $operator): void
    {
        if (in_array($operator, static::operators())) {
            $this->operator = $operator;

            return;
        }

        $friendlyRepresentations = static::friendlyRepresentations();

        if (array_key_exists($operator, $friendlyRepresentations)) {
            $this->operator = $friendlyRepresentations[$operator];

            return;
        }

        throw new UnexpectedValueException('Invalid ' . ClassUtils::getBaseName(static::class) . " $operator");
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->operator;
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        return ['operator' => $this->operator];
    }
}
