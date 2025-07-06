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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class ListQualifierMultiValue
 *
 * This class represents a complex list value of the cloudinary transformation qualifier.
 *
 * @used-by BaseQualifier
 */
class ListQualifierMultiValue extends QualifierMultiValue
{
    protected const VALUE_DELIMITER = ';';
}
