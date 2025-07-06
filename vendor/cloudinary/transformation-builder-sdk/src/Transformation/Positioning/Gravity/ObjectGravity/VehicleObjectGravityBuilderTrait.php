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
 * Trait VehicleObjectGravityBuilderTrait
 *
 * @api
 */
trait VehicleObjectGravityBuilderTrait
{
    /**
     * Gravity vehicle.
     *
     */
    public static function vehicle(): string
    {
        return ObjectGravity::VEHICLE;
    }

    /**
     * Gravity bicycle.
     *
     */
    public static function bicycle(): string
    {
        return ObjectGravity::BICYCLE;
    }

    /**
     * Gravity car.
     *
     */
    public static function car(): string
    {
        return ObjectGravity::CAR;
    }

    /**
     * Gravity motorbike.
     *
     */
    public static function motorbike(): string
    {
        return ObjectGravity::MOTORBIKE;
    }

    /**
     * Gravity aeroplane.
     *
     */
    public static function aeroplane(): string
    {
        return ObjectGravity::AEROPLANE;
    }

    /**
     * Gravity bus.
     *
     */
    public static function bus(): string
    {
        return ObjectGravity::BUS;
    }

    /**
     * Gravity train.
     *
     */
    public static function train(): string
    {
        return ObjectGravity::TRAIN;
    }

    /**
     * Gravity truck.
     *
     */
    public static function truck(): string
    {
        return ObjectGravity::TRUCK;
    }

    /**
     * Gravity boat.
     *
     */
    public static function boat(): string
    {
        return ObjectGravity::BOAT;
    }
}
