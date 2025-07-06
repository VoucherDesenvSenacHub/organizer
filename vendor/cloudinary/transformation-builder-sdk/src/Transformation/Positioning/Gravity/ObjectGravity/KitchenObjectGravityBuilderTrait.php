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
 * Trait KitchenObjectGravityBuilderTrait
 *
 * @api
 */
trait KitchenObjectGravityBuilderTrait
{
    /**
     * Gravity kitchen.
     *
     */
    public static function kitchen(): string
    {
        return ObjectGravity::KITCHEN;
    }

    /**
     * Gravity bottle.
     *
     */
    public static function bottle(): string
    {
        return ObjectGravity::BOTTLE;
    }

    /**
     * Gravity wineGlass.
     *
     */
    public static function wineGlass(): string
    {
        return ObjectGravity::WINE_GLASS;
    }

    /**
     * Gravity cup.
     *
     */
    public static function cup(): string
    {
        return ObjectGravity::CUP;
    }

    /**
     * Gravity fork.
     *
     */
    public static function fork(): string
    {
        return ObjectGravity::FORK;
    }

    /**
     * Gravity knife.
     *
     */
    public static function knife(): string
    {
        return ObjectGravity::KNIFE;
    }

    /**
     * Gravity spoon.
     *
     */
    public static function spoon(): string
    {
        return ObjectGravity::SPOON;
    }

    /**
     * Gravity bowl.
     *
     */
    public static function bowl(): string
    {
        return ObjectGravity::BOWL;
    }
}
