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
 * Trait ForegroundObjectTrait
 *
 * @api
 */
trait ForegroundObjectTrait
{
    /**
     * ForegroundObject airplane.
     *
     */
    public static function airplane(): static
    {
        return new static(ForegroundObject::AIRPLANE);
    }

    /**
     * ForegroundObject bus.
     *
     */
    public static function bus(): static
    {
        return new static(ForegroundObject::BUS);
    }

    /**
     * ForegroundObject diningTable.
     *
     */
    public static function diningTable(): static
    {
        return new static(ForegroundObject::DINING_TABLE);
    }

    /**
     * ForegroundObject sheep.
     *
     */
    public static function sheep(): static
    {
        return new static(ForegroundObject::SHEEP);
    }

    /**
     * ForegroundObject bicycle.
     *
     */
    public static function bicycle(): static
    {
        return new static(ForegroundObject::BICYCLE);
    }

    /**
     * ForegroundObject car.
     *
     */
    public static function car(): static
    {
        return new static(ForegroundObject::CAR);
    }

    /**
     * ForegroundObject dog.
     *
     */
    public static function dog(): static
    {
        return new static(ForegroundObject::DOG);
    }

    /**
     * ForegroundObject sofa.
     *
     */
    public static function sofa(): static
    {
        return new static(ForegroundObject::SOFA);
    }

    /**
     * ForegroundObject bird.
     *
     */
    public static function bird(): static
    {
        return new static(ForegroundObject::BIRD);
    }

    /**
     * ForegroundObject cat.
     *
     */
    public static function cat(): static
    {
        return new static(ForegroundObject::CAT);
    }

    /**
     * ForegroundObject horse.
     *
     */
    public static function horse(): static
    {
        return new static(ForegroundObject::HORSE);
    }

    /**
     * ForegroundObject train.
     *
     */
    public static function train(): static
    {
        return new static(ForegroundObject::TRAIN);
    }

    /**
     * ForegroundObject boat.
     *
     */
    public static function boat(): static
    {
        return new static(ForegroundObject::BOAT);
    }

    /**
     * ForegroundObject chair.
     *
     */
    public static function chair(): static
    {
        return new static(ForegroundObject::CHAIR);
    }

    /**
     * ForegroundObject person.
     *
     */
    public static function person(): static
    {
        return new static(ForegroundObject::PERSON);
    }

    /**
     * ForegroundObject tv.
     *
     */
    public static function tv(): static
    {
        return new static(ForegroundObject::TV);
    }

    /**
     * ForegroundObject bottle.
     *
     */
    public static function bottle(): static
    {
        return new static(ForegroundObject::BOTTLE);
    }

    /**
     * ForegroundObject cow.
     *
     */
    public static function cow(): static
    {
        return new static(ForegroundObject::COW);
    }

    /**
     * ForegroundObject pottedPlant.
     *
     */
    public static function pottedPlant(): static
    {
        return new static(ForegroundObject::POTTED_PLANT);
    }

    /**
     * ForegroundObject motorbike.
     *
     */
    public static function motorbike(): static
    {
        return new static(ForegroundObject::MOTORBIKE);
    }
}
