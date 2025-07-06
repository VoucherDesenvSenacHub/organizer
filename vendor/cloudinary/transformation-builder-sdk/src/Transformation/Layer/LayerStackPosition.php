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
 * Defines the position of a layer - overlay or underlay.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/layers#layer_transformation_syntax target="_blank">
 * Applying overlays to images</a> |
 * <a href=https://cloudinary.com/documentation/video_layers#image_overlays target="_blank">
 * Applying overlays to videos</a>
 *
 * @api
 */
class LayerStackPosition
{
    public const OVERLAY = 'overlay';
    public const UNDERLAY = 'underlay';
}
