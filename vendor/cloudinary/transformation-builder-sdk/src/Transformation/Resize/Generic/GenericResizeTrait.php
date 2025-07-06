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
 * Trait GenericResizeTrait
 *
 * @api
 */
trait GenericResizeTrait
{
    /**
     * Generic resize builder.
     *
     * @param string $resizeName Provide future (not supported in the current version) resize name.
     * @param mixed  $width      The required width of a transformed asset.
     * @param mixed  $height     The required height of a transformed asset.
     *
     */
    public static function generic(
        string $resizeName,
        mixed $width = null,
        mixed $height = null
    ): static {
        return static::createGenericResize($resizeName, $width, $height);
    }

    /**
     * Creates GenericResize instance.
     *
     *
     *
     * @internal
     */
    protected static function createGenericResize(...$args): static
    {
        return new static(...$args);
    }
}
