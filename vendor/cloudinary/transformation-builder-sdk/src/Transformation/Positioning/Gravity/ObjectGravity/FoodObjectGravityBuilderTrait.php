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
 * Trait FoodObjectGravityBuilderTrait
 *
 * @api
 */
trait FoodObjectGravityBuilderTrait
{
    /**
     * Gravity food.
     *
     */
    public static function food(): string
    {
        return ObjectGravity::FOOD;
    }

    /**
     * Gravity banana.
     *
     */
    public static function banana(): string
    {
        return ObjectGravity::BANANA;
    }

    /**
     * Gravity apple.
     *
     */
    public static function apple(): string
    {
        return ObjectGravity::APPLE;
    }

    /**
     * Gravity sandwich.
     *
     */
    public static function sandwich(): string
    {
        return ObjectGravity::SANDWICH;
    }

    /**
     * Gravity orange.
     *
     */
    public static function orange(): string
    {
        return ObjectGravity::ORANGE;
    }

    /**
     * Gravity broccoli.
     *
     */
    public static function broccoli(): string
    {
        return ObjectGravity::BROCCOLI;
    }

    /**
     * Gravity carrot.
     *
     */
    public static function carrot(): string
    {
        return ObjectGravity::CARROT;
    }

    /**
     * Gravity hotdog.
     *
     */
    public static function hotdog(): string
    {
        return ObjectGravity::HOTDOG;
    }

    /**
     * Gravity pizza.
     *
     */
    public static function pizza(): string
    {
        return ObjectGravity::PIZZA;
    }

    /**
     * Gravity donut.
     *
     */
    public static function donut(): string
    {
        return ObjectGravity::DONUT;
    }

    /**
     * Gravity cake.
     *
     */
    public static function cake(): string
    {
        return ObjectGravity::CAKE;
    }
}
