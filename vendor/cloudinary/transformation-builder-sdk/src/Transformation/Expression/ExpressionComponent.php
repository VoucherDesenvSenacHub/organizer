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

/**
 * Class ExpressionComponent
 */
class ExpressionComponent extends BaseExpressionComponent
{
    /**
     * @var string EXPRESSION_DELIMITER The delimiter between expression components.
     */
    protected const EXPRESSION_DELIMITER = '_';

    /**
     * @var mixed $leftOperand The left operand.
     */
    protected mixed $leftOperand;

    /**
     * @var BaseOperator|string|null $operator The operator
     */
    protected BaseOperator|string|null $operator;

    /**
     * @var mixed The right operand.
     */
    protected mixed $rightOperand;

    /**
     * ExpressionComponent constructor.
     *
     */
    public function __construct(
        mixed $leftOperand,
        BaseOperator|string|null $operator = null,
        mixed $rightOperand = null
    ) {
        parent::__construct();

        $this->leftOperand = $leftOperand;
        $this->setOperator($operator);
        $this->setRightOperand($rightOperand);
    }

    /**
     * Sets the expression operator.
     *
     * @param BaseOperator|string|null $operator The operator
     */
    public function setOperator(BaseOperator|string|null $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * Sets the right operand.
     *
     */
    public function setRightOperand(mixed $rightOperand): void
    {
        $this->rightOperand = $rightOperand;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return ArrayUtils::implodeFiltered(
            self::EXPRESSION_DELIMITER,
            [$this->leftOperand, $this->operator, $this->rightOperand]
        );
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        return [
            'left_operand' => $this->leftOperand,
            'operator' => $this->operator,
            'right_operand' => $this->rightOperand,
        ];
    }
}
