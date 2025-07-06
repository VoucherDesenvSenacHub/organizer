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
 * Determines how to crop, scale, and/or zoom the delivered asset according to the requested dimensions.
 *
 * **Learn more**:
 * <a href=https://cloudinary.com/documentation/resizing_and_cropping
 * target="_blank">Resizing images</a> |
 * <a href=https://cloudinary.com/documentation/video_resizing_and_cropping
 * target="_blank">Resizing videos</a>
 *
 * @api
 */
class Resize extends BaseResizeAction
{
    use ResizeTrait;
}
