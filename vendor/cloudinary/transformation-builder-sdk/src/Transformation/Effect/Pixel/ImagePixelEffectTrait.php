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

use Cloudinary\Transformation\Argument\Color;

/**
 * Trait ImagePixelEffectTrait
 *
 * @api
 */
trait ImagePixelEffectTrait
{
    /**
     * Applies a pixelation effect to the image.
     *
     * @param int|null $squareSize The width of each pixelation square in pixels.  (Range: 1 to 200, Server default: 5)
     *
     */
    public static function pixelate(?int $squareSize = null): Pixelate
    {
        return new Pixelate($squareSize);
    }

    /**
     * Makes the background of the image transparent (or solid white for formats that do not support transparency).
     * The background is determined as all pixels that resemble the pixels on the edges of the image.
     *
     * @param int|null $tolerance The tolerance used to accommodate variance in the background color.
     *                            (Range: 0 to 100, Server default: 10)
     *
     */
    public static function makeTransparent(?int $tolerance = null): MakeTransparent
    {
        return new MakeTransparent(
            new ToleranceEffectQualifier(PixelEffect::MAKE_TRANSPARENT, EffectRange::PERCENT, $tolerance)
        );
    }

    /**
     * Makes the background of an image transparent (or solid white for JPGs).
     *
     * Use when the background is a uniform color.
     *
     * @param bool              $screen        When true, provides better results for images with near perfect
     *                                         green/blue background.
     * @param string|Color|null $colorToRemove The background color as an RGB/A hex code. Overrides the algorithm's
     *                                         choice of background color. Default: The algorithm's choice - often the
     *                                         edge color of the image.
     *
     *
     * @see RemoveBackground
     */
    public static function removeBackground(
        bool $screen = false,
        Color|string|null $colorToRemove = null
    ): RemoveBackground {
        return new RemoveBackground($screen, $colorToRemove);
    }

    /**
     * Uses the Cloudinary AI Background Removal add-on to make the background of an image transparent.
     *
     *
     * @param bool|null $fineEdges        Enables detailed background removal around a foreground object with fine
     *                                    detail around its edges.
     * @param array     $hints            A list of foreground objects to keep.
     *
     *
     * @see BackgroundRemoval
     */
    public static function backgroundRemoval(?bool $fineEdges = null, array $hints = []): BackgroundRemoval
    {
        return new BackgroundRemoval($fineEdges, $hints);
    }

    /**
     * Applies an ordered dither filter to the image.
     *
     * Use the constants defined in \Cloudinary\Transformation\OrderedDither for $level.
     *
     * @param int|null $level The level of ordered dither.  Use the constants defined in the OrderedDither class.
     *
     *
     * @see Dither
     *
     */
    public static function dither(?int $level = null): Dither
    {
        return new Dither($level);
    }

    /**
     * Applies a gradient fade effect from the top edge of the image.
     *
     * You can specify other edges using the x and y methods of the \Cloudinary\Transformation\GradientFade class.
     *
     * @param int|null    $strength The strength of the fade effect. (Range: 0 to 100, Server default: 20)
     * @param string|null $type     The type of gradient fade: GradientFade::SYMMETRIC or GradientFade::SYMMETRIC_PAD.
     *
     *
     * @see GradientFade
     *
     */
    public static function gradientFade(?int $strength = null, ?string $type = null): GradientFade
    {
        return new GradientFade($strength, $type);
    }

    /**
     * Trims pixels according to the transparency levels of a specified overlay image.
     *
     * Wherever an overlay image is transparent, the original is shown, and wherever an overlay is opaque, the
     * resulting image is transparent.
     *
     * @param mixed|null $source The public ID of the source.
     *
     *
     * @see CutOut
     *
     */
    public static function cutOut(mixed $source = null): CutOut
    {
        return new CutOut($source);
    }
}
