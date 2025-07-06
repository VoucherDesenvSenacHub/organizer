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
 * Trait BorderStyleTrait
 *
 * @api
 */
trait BorderStyleTrait
{
    /**
     * Adds a border around the image.
     *
     * @param int|null    $width The width in pixels.
     * @param string|null $color The color of the border.
     *
     */
    public static function solid(?int $width = null, ?string $color = null): Border
    {
        return (new Border())->style('solid')->width($width)->color($color);
    }
}
