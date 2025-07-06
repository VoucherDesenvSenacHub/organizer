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

/**
 * Class GenericNamedArgument
 */
class GenericNamedArgument extends BaseNamedArgument
{
    /**
     * GenericNamedArgument constructor.
     *
     * @param string $name                The name of the argument.
     * @param mixed  $value               The value of the argument.
     * @param string $nameValueDelimiter  The delimiter between name and value.
     * @param string $innerValueDelimiter Inner value delimiter.
     */
    public function __construct(
        string $name,
        mixed $value,
        string $nameValueDelimiter = self::ARG_NAME_VALUE_DELIMITER,
        string $innerValueDelimiter = self::ARG_INNER_VALUE_DELIMITER
    ) {
        parent::__construct();

        $this->argName = $name;
        $this->setValue($value);
        $this->nameValueDelimiter  = $nameValueDelimiter;
        $this->innerValueDelimiter = $innerValueDelimiter;
    }

    /**
     * Sets the named argument value.
     *
     *
     */
    public function setValue($value): static
    {
        $this->argMultiValue = $value;

        return $this;
    }
}
