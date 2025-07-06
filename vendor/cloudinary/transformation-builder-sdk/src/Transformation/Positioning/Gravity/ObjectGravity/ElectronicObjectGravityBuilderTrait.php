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
 * Trait ElectronicObjectGravityBuilderTrait
 *
 * @api
 */
trait ElectronicObjectGravityBuilderTrait
{
    /**
     * Gravity electronic.
     *
     */
    public static function electronic(): string
    {
        return ObjectGravity::ELECTRONIC;
    }

    /**
     * Gravity tvMonitor.
     *
     */
    public static function tvMonitor(): string
    {
        return ObjectGravity::TV_MONITOR;
    }

    /**
     * Gravity laptop.
     *
     */
    public static function laptop(): string
    {
        return ObjectGravity::LAPTOP;
    }

    /**
     * Gravity mouse.
     *
     */
    public static function mouse(): string
    {
        return ObjectGravity::MOUSE;
    }

    /**
     * Gravity remote.
     *
     */
    public static function remote(): string
    {
        return ObjectGravity::REMOTE;
    }

    /**
     * Gravity keyboard.
     *
     */
    public static function keyboard(): string
    {
        return ObjectGravity::KEYBOARD;
    }

    /**
     * Gravity cellphone.
     *
     */
    public static function cellphone(): string
    {
        return ObjectGravity::CELLPHONE;
    }
}
