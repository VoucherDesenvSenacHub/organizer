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
 * Trait IndoorObjectGravityBuilderTrait
 *
 * @api
 */
trait IndoorObjectGravityBuilderTrait
{
    /**
     * Gravity indoor.
     *
     */
    public static function indoor(): string
    {
        return ObjectGravity::INDOOR;
    }

    /**
     * Gravity book.
     *
     */
    public static function book(): string
    {
        return ObjectGravity::BOOK;
    }

    /**
     * Gravity clock.
     *
     */
    public static function clock(): string
    {
        return ObjectGravity::CLOCK;
    }

    /**
     * Gravity vase.
     *
     */
    public static function vase(): string
    {
        return ObjectGravity::VASE;
    }

    /**
     * Gravity scissors.
     *
     */
    public static function scissors(): string
    {
        return ObjectGravity::SCISSORS;
    }

    /**
     * Gravity teddyBear.
     *
     */
    public static function teddyBear(): string
    {
        return ObjectGravity::TEDDY_BEAR;
    }

    /**
     * Gravity hairDrier.
     *
     */
    public static function hairDrier(): string
    {
        return ObjectGravity::HAIR_DRIER;
    }

    /**
     * Gravity toothbrush.
     *
     */
    public static function toothbrush(): string
    {
        return ObjectGravity::TOOTHBRUSH;
    }
}
