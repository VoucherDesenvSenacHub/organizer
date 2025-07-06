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

use Cloudinary\ClassUtils;

/**
 * Trait CompassGravityTrait
 *
 * @api
 */
trait CompassGravityBuilderTrait
{
    /**
     * North-west corner (top left).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function northWest(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::NORTH_WEST, ...$args);
    }

    /**
     * North center part (top center).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function north(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::NORTH, ...$args);
    }

    /**
     * North-east corner (top right).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function northEast(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::NORTH_EAST, ...$args);
    }

    /**
     * Middle west part (left).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function west(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::WEST, ...$args);
    }

    /**
     * The center of the image.
     *
     * @param array $args Additional arguments.
     *
     */
    public static function center(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::CENTER, ...$args);
    }

    /**
     * Middle east part (right).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function east(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::EAST, ...$args);
    }

    /**
     * South west corner (bottom left).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function southWest(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::SOUTH_WEST, ...$args);
    }

    /**
     * South center part (bottom center).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function south(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::SOUTH, ...$args);
    }

    /**
     * South east corner (bottom right).
     *
     * @param array $args Additional arguments.
     *
     */
    public static function southEast(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::SOUTH_EAST, ...$args);
    }

    /**
     * Sets the center of gravity to the given x & y coordinates.
     *
     * @param array $args Additional arguments.
     *
     */
    public static function xyCenter(...$args): CompassGravity|CompassPosition
    {
        return static::createWithCompassGravity(Compass::XY_CENTER, ...$args);
    }

    /**
     * Creates a new instance of the CompassGravity class.
     *
     * @param string|CompassGravity $direction The gravity direction.
     * @param array                 $args      Additional arguments.
     *
     */
    public static function compass(string|CompassGravity $direction, ...$args): CompassGravity
    {
        return static::createWithCompassGravity($direction, ...$args);
    }

    /**
     * Creates a new instance of the CompassGravity class.
     *
     * @param string|CompassGravity $direction The gravity direction.
     * @param array                 $args      Additional arguments.
     *
     */
    protected static function createWithCompassGravity(string|CompassGravity $direction, ...$args): CompassGravity
    {
        return ClassUtils::forceInstance($direction, CompassGravity::class, null, $args);
    }
}
