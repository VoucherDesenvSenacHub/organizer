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
 *  Defines the available foreground objects.
 *
 * @api
 */
class ForegroundObject extends BaseArgument
{
    public const AIRPLANE = 'airplane';
    public const BUS      = 'bus';
    public const DINING_TABLE = 'dining_table';
    public const SHEEP        = 'sheep';
    public const BICYCLE = 'bicycle';
    public const CAR     = 'car';
    public const DOG = 'dog';
    public const SOFA = 'sofa';
    public const BIRD = 'bird';
    public const CAT  = 'cat';
    public const HORSE = 'horse';
    public const TRAIN = 'train';
    public const BOAT  = 'boat';
    public const CHAIR = 'chair';
    public const PERSON = 'person';
    public const TV     = 'tv';
    public const BOTTLE = 'bottle';
    public const COW    = 'cow';
    public const POTTED_PLANT = 'potted_plant';
    public const MOTORBIKE    = 'motorbike';

    use ForegroundObjectTrait;
}
