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
 * Trait OutdoorObjectGravityBuilderTrait
 *
 * @api
 */
trait OutdoorObjectGravityBuilderTrait
{
    /**
     * Gravity outdoor.
     *
     */
    public static function outdoor(): string
    {
        return ObjectGravity::OUTDOOR;
    }

    /**
     * Gravity trafficLight.
     *
     */
    public static function trafficLight(): string
    {
        return ObjectGravity::TRAFFIC_LIGHT;
    }

    /**
     * Gravity stopSign.
     *
     */
    public static function stopSign(): string
    {
        return ObjectGravity::STOP_SIGN;
    }

    /**
     * Gravity parkingMeter.
     *
     */
    public static function parkingMeter(): string
    {
        return ObjectGravity::PARKING_METER;
    }

    /**
     * Gravity fireHydrant.
     *
     */
    public static function fireHydrant(): string
    {
        return ObjectGravity::FIRE_HYDRANT;
    }

    /**
     * Gravity bench.
     *
     */
    public static function bench(): string
    {
        return ObjectGravity::BENCH;
    }
}
