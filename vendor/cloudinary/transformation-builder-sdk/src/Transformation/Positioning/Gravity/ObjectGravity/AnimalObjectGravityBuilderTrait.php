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
 * Trait AnimalObjectGravityBuilderTrait
 *
 * @api
 */
trait AnimalObjectGravityBuilderTrait
{
    /**
     * Gravity animal.
     *
     */
    public static function animal(): string
    {
        return ObjectGravity::ANIMAL;
    }

    /**
     * Gravity bird.
     *
     */
    public static function bird(): string
    {
        return ObjectGravity::BIRD;
    }

    /**
     * Gravity cat.
     *
     */
    public static function cat(): string
    {
        return ObjectGravity::CAT;
    }

    /**
     * Gravity dog.
     *
     */
    public static function dog(): string
    {
        return ObjectGravity::DOG;
    }

    /**
     * Gravity horse.
     *
     */
    public static function horse(): string
    {
        return ObjectGravity::HORSE;
    }

    /**
     * Gravity sheep.
     *
     */
    public static function sheep(): string
    {
        return ObjectGravity::SHEEP;
    }

    /**
     * Gravity cow.
     *
     */
    public static function cow(): string
    {
        return ObjectGravity::COW;
    }

    /**
     * Gravity elephant.
     *
     */
    public static function elephant(): string
    {
        return ObjectGravity::ELEPHANT;
    }

    /**
     * Gravity bear.
     *
     */
    public static function bear(): string
    {
        return ObjectGravity::BEAR;
    }

    /**
     * Gravity zebra.
     *
     */
    public static function zebra(): string
    {
        return ObjectGravity::ZEBRA;
    }

    /**
     * Gravity giraffe.
     *
     */
    public static function giraffe(): string
    {
        return ObjectGravity::GIRAFFE;
    }
}
