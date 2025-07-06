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
 * Automatically identifies the most interesting regions to include when resizing.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/resizing_and_cropping#automatic_cropping_g_auto" target="_blank">
 * Automatic gravity for images</a> |
 * <a href="https://cloudinary.com/documentation/video_resizing_and_cropping#automatic_gravity_for_crops_g_auto" target="_blank">
 * Automatic gravity for videos</a>
 *
 * @api
 */
class AutoGravity extends GravityQualifier
{
    public const AUTO = 'auto';
    public const CLASSIC = 'classic';
    public const SUBJECT = 'subject';

    public static function classic(): string
    {
        return self::CLASSIC;
    }

    public static function subject(): string
    {
        return self::SUBJECT;
    }

    /**
     * @param mixed $gravity The gravity to use.
     *
     */
    public static function object(mixed $gravity): AutoGravityObject
    {
        return new AutoGravityObject($gravity);
    }

    /**
     * Adds fallback gravities (usually AutoGravity).
     *
     * @param array|AutoGravity|ObjectGravity|string|mixed $fallbackGravities The fallback gravities.
     *
     */
    public function autoFocus(...$fallbackGravities): AutoGravity
    {
        return $this->add(...$fallbackGravities);
    }
}
