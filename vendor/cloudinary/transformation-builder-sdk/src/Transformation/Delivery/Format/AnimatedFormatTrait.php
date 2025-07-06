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
 * Trait AnimatedFormatTrait
 *
 * @api
 */
trait AnimatedFormatTrait
{
    /**
     * Animated image format webp.
     *
     */
    public static function webp(): static
    {
        return static::createFormat(Format::WEBP)->setFlag(Flag::animatedWebP());
    }

    /**
     * Animated image format gif.
     *
     */
    public static function gif(): static
    {
        return static::createFormat(Format::GIF);
    }

    /**
     * Animated image format png.
     *
     */
    public static function png(): static
    {
        return static::createFormat(Format::PNG)->setFlag(Flag::animatedPng());
    }

    /**
     * Animated image auto format.
     *
     */
    public static function auto(): static
    {
        return static::createFormat(Format::AUTO);
    }

    /**
     * Named constructor.
     *
     * @param string|array $format The format.
     *
     *
     * @internal
     */
    protected static function createFormat(...$format): static
    {
        return new static(...$format);
    }


}
