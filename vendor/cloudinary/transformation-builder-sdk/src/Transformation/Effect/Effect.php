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

use Cloudinary\ArrayUtils;

/**
 * Defines effects that you can apply to transform your assets.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/effects_and_artistic_enhancements target="_blank">
 * Image effects</a> |
 * <a href=https://cloudinary.com/documentation/video_effects_and_enhancements target="_blank">
 * Video effects</a>
 *
 * @api
 */
abstract class Effect
{
    use CommonEffectTrait;
    use ImageEffectTrait;
    use VideoEffectTrait;

    /**
     * A user defined generic effect.
     *
     * @param string $name    The effect name.
     * @param mixed  ...$args Optional effect arguments.
     *
     */
    public static function generic(string $name, ...$args): EffectAction
    {
        return EffectAction::named($name, ...$args);
    }

    /**
     * Creates effect from an array of qualifiers.
     *
     * @param array|string $qualifiers The effect qualifiers.
     *
     */
    public static function fromParams(array|string $qualifiers): EffectAction
    {
        return EffectAction::fromParams(ArrayUtils::build($qualifiers));
    }
}
