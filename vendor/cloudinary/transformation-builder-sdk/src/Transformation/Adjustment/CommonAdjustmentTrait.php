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
 * Trait CommonAdjustmentTrait
 *
 * @api
 */
trait CommonAdjustmentTrait
{
    /**
     * Adjusts the brightness.
     *
     * @param int|null $level The level of brightness (Range: -99 to 100, Server default: 80)
     *
     */
    public static function brightness(?int $level = null): LevelEffectAction
    {
        return EffectAction::withLevel(Adjust::BRIGHTNESS, EffectRange::BRIGHTNESS, $level);
    }

    /**
     * Adjusts the contrast.
     *
     * @param int|null $level The level of contrast (Range: -100 to 100, Server default: 0)
     *
     */
    public static function contrast(?int $level = null): LevelEffectAction
    {
        return EffectAction::withLevel(Adjust::CONTRAST, EffectRange::DEFAULT_RANGE, $level);
    }

    /**
     * Adjusts the color saturation.
     *
     * @param int|null $level The level of color saturation (Range: -100 to 100, Server default: 80).
     *
     */
    public static function saturation(?int $level = null): LevelEffectAction
    {
        return EffectAction::withLevel(Adjust::SATURATION, EffectRange::DEFAULT_RANGE, $level);
    }

    /**
     * Adjusts the gamma level.
     *
     * @param int|null $level The level of gamma (Range: -50 to 150, Server default: 0).
     *
     */
    public static function gamma(?int $level = null): LevelEffectAction
    {
        return EffectAction::withLevel(Adjust::GAMMA, EffectRange::SHIFTED_RANGE, $level);
    }

    /**
     * Applies the 3D LUT file to the asset.
     *
     * @see https://cloudinary.com/documentation/effects_and_artistic_enhancements#3d_luts
     *
     * @param string|null $lutId The 3D LUT file id
     *
     */
    public static function by3dLut(?string $lutId = null): LutLayer
    {
        return ClassUtils::verifyInstance($lutId, LutLayer::class);
    }

    /**
     * Applies any effect.
     *
     * This is a generic way to apply an effect.  For example, you could set $name to "gamma" and $args to 50, and this
     * would have the same effect as calling gamma(50).
     *
     * @param string $name    The effect name.
     * @param mixed  ...$args The qualifiers of the effect.
     *
     */
    public static function generic(string $name, ...$args): EffectAction
    {
        return EffectAction::named($name, ...$args);
    }
}
