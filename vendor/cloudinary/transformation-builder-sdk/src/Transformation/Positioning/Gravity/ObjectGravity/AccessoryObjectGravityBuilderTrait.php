<?php /** @noinspection PhpClassConstantAccessedViaChildClassInspection */

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
 * Trait AccessoryObjectGravityBuilderTrait
 *
 * @api
 */
trait AccessoryObjectGravityBuilderTrait
{
    /**
     * Gravity accessory.
     *
     */
    public static function accessory(): string
    {
        return ObjectGravity::ACCESSORY;
    }

    /**
     * Gravity frisbee.
     *
     */
    public static function frisbee(): string
    {
        return ObjectGravity::FRISBEE;
    }

    /**
     * Gravity skis.
     *
     */
    public static function skis(): string
    {
        return ObjectGravity::SKIS;
    }

    /**
     * Gravity snowboard.
     *
     */
    public static function snowboard(): string
    {
        return ObjectGravity::SNOWBOARD;
    }

    /**
     * Gravity sportsBall.
     *
     */
    public static function sportsBall(): string
    {
        return ObjectGravity::SPORTS_BALL;
    }

    /**
     * Gravity kite.
     *
     */
    public static function kite(): string
    {
        return ObjectGravity::KITE;
    }

    /**
     * Gravity baseballBat.
     *
     */
    public static function baseballBat(): string
    {
        return ObjectGravity::BASEBALL_BAT;
    }

    /**
     * Gravity baseballGlove.
     *
     */
    public static function baseballGlove(): string
    {
        return ObjectGravity::BASEBALL_GLOVE;
    }

    /**
     * Gravity skateboard.
     *
     */
    public static function skateboard(): string
    {
        return ObjectGravity::SKATEBOARD;
    }

    /**
     * Gravity surfboard.
     *
     */
    public static function surfboard(): string
    {
        return ObjectGravity::SURFBOARD;
    }

    /**
     * Gravity tennisracket.
     *
     */
    public static function tennisracket(): string
    {
        return ObjectGravity::TENNIS_RACKET;
    }
}
