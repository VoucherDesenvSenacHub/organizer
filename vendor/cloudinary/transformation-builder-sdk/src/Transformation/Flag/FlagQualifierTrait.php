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

/**
 * Trait FlagQualifierTrait
 *
 * @api
 */
trait FlagQualifierTrait
{
    /**
     * Sets the flag.
     *
     * @param string     $flagName The name of the flag.
     * @param mixed|null $value    An optional value of the flag.
     *
     */
    public static function flag(string $flagName, mixed $value = null): FlagQualifier
    {
        return new FlagQualifier($flagName, $value);
    }
}
