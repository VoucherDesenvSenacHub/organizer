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
 * Trait ApplianceObjectGravityBuilderTrait
 *
 * @api
 */
trait ApplianceObjectGravityBuilderTrait
{
    /**
     * Gravity appliance.
     *
     */
    public static function appliance(): string
    {
        return ObjectGravity::APPLIANCE;
    }

    /**
     * Gravity microwave.
     *
     */
    public static function microwave(): string
    {
        return ObjectGravity::MICROWAVE;
    }

    /**
     * Gravity oven.
     *
     */
    public static function oven(): string
    {
        return ObjectGravity::OVEN;
    }

    /**
     * Gravity toaster.
     *
     */
    public static function toaster(): string
    {
        return ObjectGravity::TOASTER;
    }

    /**
     * Gravity sink.
     *
     */
    public static function sink(): string
    {
        return ObjectGravity::SINK;
    }

    /**
     * Gravity refrigerator.
     *
     */
    public static function refrigerator(): string
    {
        return ObjectGravity::REFRIGERATOR;
    }
}
