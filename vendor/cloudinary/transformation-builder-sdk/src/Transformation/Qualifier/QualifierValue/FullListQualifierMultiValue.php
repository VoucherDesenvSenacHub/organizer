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

use Cloudinary\StringUtils;
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class FullListQualifierMultiValue
 *
 * This class represents a complex list value of the cloudinary transformation qualifier.
 *
 * @used-by BaseQualifier
 */
class FullListQualifierMultiValue extends ListQualifierMultiValue
{
    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        $string = parent::__toString();
        if (! empty($string)
            && count($this->namedArguments) + count($this->arguments) > 1
            && StringUtils::contains($string, self::VALUE_DELIMITER)
        ) {
            return '(' . $string . ')';
        }

        return $string;
    }
}
