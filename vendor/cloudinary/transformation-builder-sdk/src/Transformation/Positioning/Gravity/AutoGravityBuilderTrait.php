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
 * Trait AutoGravityBuilderTrait
 *
 * @api
 */
trait AutoGravityBuilderTrait
{
    /**
     * Sets automatic gravity.
     *
     * An intelligent algorithm analyzes and prioritizes the most prominent elements of the asset to include.
     *
     * @param mixed ...$fallback Fallback gravities.
     *
     */
    public static function auto(...$fallback): AutoGravity
    {
        return self::createWithAutoGravity(AutoGravity::AUTO, ...$fallback);
    }

    /**
     * Alias for Gravity::auto()
     *
     *
     *
     * @see AutoGravity::auto
     */
    public static function autoGravity(...$fallback): AutoGravity
    {
        return self::auto(...$fallback);
    }

    /**
     * Creates a new instance of the AutoGravity class.
     *
     * @param string $gravity  The main gravity.
     * @param array  $fallback Fallback gravities.
     *
     */
    protected static function createWithAutoGravity(string $gravity, ...$fallback): AutoGravity
    {
        return new AutoGravity($gravity, ...$fallback);
    }
}
