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
 * Adjusts the shape of the delivered image.
 *
 * **Learn more**:
 * <a href=https://cloudinary.com/documentation/effects_and_artistic_enhancements#distort
 * target="_blank">Shape changes and distortion effects</a>
 *
 * @api
 */
abstract class Reshape
{
    use ReshapeTrait;
}
