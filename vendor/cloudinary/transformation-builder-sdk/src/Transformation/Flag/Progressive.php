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
 * Class Progressive
 */
class Progressive
{
    /**
     * Default mode.
     */
    public const PROGRESSIVE = '';

    /**
     * A smart optimization of the decoding time, compression level and progressive rendering (less iterations).
     * This is the default mode when using q_auto.
     */
    public const SEMI = 'semi';

    /**
     *  Delivers a preview very quickly, and in a single later phase improves the image to the required resolution.
     */
    public const STEEP = 'steep';

    /**
     *  Use this to deliver a non-progressive image. This is the default mode when setting a specific value for quality.
     */
    public const NONE = 'none';


    /**
     * Default mode.
     *
     */
    public static function progressive(): string
    {
        return self::PROGRESSIVE;
    }

    /**
     * A smart optimization of the decoding time, compression level and progressive rendering (less iterations).
     * This is the default mode when using q_auto.
     *
     */
    public static function semi(): string
    {
        return self::SEMI;
    }

    /**
     * Delivers a preview very quickly, and in a single later phase improves the image to the required resolution.
     *
     */
    public static function steep(): string
    {
        return self::STEEP;
    }

    /**
     * Use this to deliver a non-progressive image. This is the default mode when setting a specific value for quality.
     *
     */
    public static function none(): string
    {
        return self::NONE;
    }
}
