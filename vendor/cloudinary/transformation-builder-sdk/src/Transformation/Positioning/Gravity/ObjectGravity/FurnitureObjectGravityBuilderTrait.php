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
 * Trait FurnitureObjectGravityBuilderTrait
 *
 * @api
 */
trait FurnitureObjectGravityBuilderTrait
{
    /**
     * Gravity furniture.
     *
     */
    public static function furniture(): string
    {
        return ObjectGravity::FURNITURE;
    }

    /**
     * Gravity chair.
     *
     */
    public static function chair(): string
    {
        return ObjectGravity::CHAIR;
    }

    /**
     * Gravity sofa.
     *
     */
    public static function sofa(): string
    {
        return ObjectGravity::SOFA;
    }

    /**
     * Gravity pottedPlant.
     *
     */
    public static function pottedPlant(): string
    {
        return ObjectGravity::POTTED_PLANT;
    }

    /**
     * Gravity bed.
     *
     */
    public static function bed(): string
    {
        return ObjectGravity::BED;
    }

    /**
     * Gravity diningTable.
     *
     */
    public static function diningTable(): string
    {
        return ObjectGravity::DINING_TABLE;
    }

    /**
     * Gravity toilet.
     *
     */
    public static function toilet(): string
    {
        return ObjectGravity::TOILET;
    }
}
