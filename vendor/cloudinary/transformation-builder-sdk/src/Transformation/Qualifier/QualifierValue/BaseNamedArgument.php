<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

use Cloudinary\ArrayUtils;
use Cloudinary\Transformation\BaseComponent;

/**
 * Class BaseNamedArgument
 */
abstract class BaseNamedArgument extends BaseComponent
{
    public const ARG_NAME_VALUE_DELIMITER = '_';
    public const ARG_INNER_VALUE_DELIMITER = ':';

    /**
     * @var string $argName The name of the argument.
     */
    protected string $argName;

    /**
     * @var mixed $argMultiValue The value of the argument.
     */
    protected mixed $argMultiValue = [];

    /**
     * @var string $nameValueDelimiter Run-time settable name-value delimiter.
     */
    protected string $nameValueDelimiter;

    /**
     * @var string $innerValueDelimiter Run-time settable inner value delimiter.
     */
    protected string $innerValueDelimiter;

    /**
     * BaseNamedArgument constructor.
     *
     * @param $value
     */
    public function __construct(...$value)
    {
        parent::__construct();

        $this->nameValueDelimiter = static::ARG_NAME_VALUE_DELIMITER;
        $this->innerValueDelimiter = static::ARG_INNER_VALUE_DELIMITER;

        $this->addValues(...$value);
    }


    /**
     *
     * @return $this
     */
    public function addValues(...$values): static
    {
        $this->argMultiValue = array_merge($this->argMultiValue, $values);

        return $this;
    }

    /**
     * Gets the multi value of the argument.
     *
     */
    public function getMultiValue(): array
    {
        return $this->argMultiValue;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return ArrayUtils::implodeFiltered(
            $this->nameValueDelimiter ?: static::ARG_NAME_VALUE_DELIMITER,
            [
                $this->getArgName(),
                ArrayUtils::implodeFiltered(
                    $this->innerValueDelimiter ?: static::ARG_INNER_VALUE_DELIMITER,
                    ArrayUtils::build(ArrayUtils::flatten($this->argMultiValue))
                ),
            ]
        );
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        return ['name' => $this->getArgName(), 'value' => ArrayUtils::flatten($this->argMultiValue)];
    }

    /**
     * Gets the argument name.
     *
     *
     * @internal
     */

    protected function getArgName(): string
    {
        if (!isset($this->argName)){
            $this->argName = $this->getFullName();
        }

        return $this->argName;
    }
}
