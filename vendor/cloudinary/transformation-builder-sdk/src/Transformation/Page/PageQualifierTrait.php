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
 * Trait PageQualifierTrait
 *
 * @api
 */
trait PageQualifierTrait
{
    /**
     * Extracts the specified page(s).
     *
     * @param int|string|array|mixed $page The page(s) to extract.
     *
     */
    public static function page(mixed $page): PageQualifier
    {
        return new PageQualifier($page);
    }
}
