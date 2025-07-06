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
 * Class GenericArgument
 */
class GenericArgument extends GenericNamedArgument
{
    /**
     * GenericArgument constructor.
     *
     * @param string|null $name                The name of the argument.
     * @param mixed       $value               The value of the argument.
     * @param string      $innerValueDelimiter Inner value delimiter.
     */
    public function __construct(
        ?string $name,
        mixed $value,
        string $innerValueDelimiter = self::ARG_INNER_VALUE_DELIMITER
    ) {
        parent::__construct($name, $value, self::ARG_NAME_VALUE_DELIMITER, $innerValueDelimiter);
    }
}
