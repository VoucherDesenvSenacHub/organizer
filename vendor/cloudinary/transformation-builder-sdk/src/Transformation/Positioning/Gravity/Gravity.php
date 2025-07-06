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
 * Defines the focal gravity for certain methods of cropping.
 *
 * **Learn more**: <a href=https://cloudinary.com/documentation/resizing_and_cropping#control_gravity
 * target="_blank">
 * Image gravity</a> |
 * <a href=https://cloudinary.com/documentation/video_resizing_and_cropping#control_gravity
 * target="_blank">Video gravity</a>
 *
 * @api
 */
abstract class Gravity
{
    use CompassGravityBuilderTrait;
    use AutoGravityBuilderTrait;
    use FocalGravityBuilderTrait;
    use ObjectGravityBuilderTrait;

    /**
     * Creates a new instance of the ObjectGravity.
     *
     * @param mixed ...$objects The names of the objects.
     *
     */
    public static function focusOn(...$objects): ObjectGravity
    {
        return new ObjectGravity(...$objects);
    }
}
