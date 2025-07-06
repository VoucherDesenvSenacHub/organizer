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
 * Trait FormatTrait
 *
 * @api
 */
trait FormatTrait
{
    use AudioFormatTrait;
    use ImageFormatTrait;
    use VideoFormatTrait;

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

    /**
     * Auto format.
     *
     */
    public static function auto(): static
    {
        return static::createFormat(FormatInterface::AUTO);
    }
}
