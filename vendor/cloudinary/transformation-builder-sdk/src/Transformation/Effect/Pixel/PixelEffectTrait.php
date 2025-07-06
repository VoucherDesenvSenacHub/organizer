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
 * Trait PixelEffectTrait
 *
 * @api
 */
trait PixelEffectTrait
{
    /**
     * Applies a blurring filter to the asset.
     *
     * @param int|null $strength The strength of the blur. (Range: 1 to 2000, Server default: 100)
     *
     */
    public static function blur(?int $strength = null): Blur
    {
        return new Blur($strength);
    }

    /**
     * Applies a blurring filter to the faces detected on the asset.
     *
     * @param int|null $strength The strength of the blur. (Range: 1 to 2000, Server default: 100)
     *
     */
    public static function blurFaces(?int $strength = null): Blur
    {
        return (new Blur($strength))->region(Region::faces());
    }

    /**
     * Applies a blurring filter to the region on the asset.
     *
     * @param int|string|null $strength The strength of the blur. (Range: 1 to 2000, Server default: 100)
     * @param int|string|null $x        X.
     * @param int|string|null $y        Y.
     * @param int|string|null $width    Width.
     * @param int|string|null $height   Height.
     *
     */
    public static function blurRegion(
        int|string|null $strength = null,
        int|string|null $x = null,
        int|string|null $y = null,
        int|string|null $width = null,
        int|string|null $height = null
    ): Blur {
        return (new Blur($strength))->region(Region::custom($x, $y, $width, $height));
    }

    /**
     * Applies a vignette effect.
     *
     * @param int|null $strength The strength of the vignette. (Range: 0 to 100, Server default: 20)
     *
     */
    public static function vignette(?int $strength = null): StrengthEffectAction
    {
        return EffectAction::withStrength(PixelEffect::VIGNETTE, EffectRange::PERCENT, $strength);
    }
}
