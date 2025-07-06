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
 * Trait PositioningQualifierTrait
 *
 * @api
 */
trait PositioningQualifierTrait
{
    /**
     * Sets the x position in pixels.
     *
     * @param int $x The x position.
     *
     */
    public static function x(int $x): X
    {
        return new X($x);
    }

    /**
     * Sets the y position in pixels.
     *
     * @param int $y The y position.
     *
     */
    public static function y(int $y): Y
    {
        return new Y($y);
    }
}
