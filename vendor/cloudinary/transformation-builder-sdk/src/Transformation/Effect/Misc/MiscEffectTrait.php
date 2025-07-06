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
use Cloudinary\Transformation\Argument\PointValue;

/**
 * Trait MiscEffectTrait
 *
 * @api
 */
trait MiscEffectTrait
{
    /**
     * Applies the selected artistic filter to the image.
     *
     * See the Image Transformations guide for examples of each of the filters.
     *
     * @param string|ArtisticFilter $filter The filter to apply. Use the constants defined in the ArtisticFilter class.
     *
     *
     * @see ArtisticFilter
     * @see https://cloudinary.com/documentation/effects_and_artistic_enhancements#artistic_filter_effects
     */
    public static function artisticFilter(string|ArtisticFilter $filter): mixed
    {
        return ClassUtils::verifyInstance($filter, ArtisticFilter::class);
    }

    /**
     * Applies a cartoon effect to an image.
     *
     * @param mixed $lineStrength          The thickness of the lines. (Range: 0 to 100, Server default: 50)
     * @param mixed $colorReduction        The decrease in the number of colors and corresponding saturation boost of
     *                                     the remaining colors. (Range: 0 to 100, Server default: automatically
     *                                     adjusts according to the line_strength value). Higher reduction values
     *                                     result in a less realistic look. Set $colorReduction to
     *                                     Cartoonify::BLACK_WHITE for a black and white cartoon effect.
     *
     *
     * @see Cartoonify
     */
    public static function cartoonify(mixed $lineStrength = null, mixed $colorReduction = null): Cartoonify
    {
        return new Cartoonify($lineStrength, $colorReduction);
    }

    /**
     * Transfers the style of a source artwork to a target photograph using the Neural Artwork Style Transfer
     * add-on.
     *
     * For details, see the Neural Artwork Style Transfer add-on documentation.
     *
     * @param string    $source        The public ID of the source artwork.
     * @param int|null  $strength      The strength of the style transfer. Higher numbers result in an output that is
     *                                 more highly influenced by the source artwork style. (Range: 0 to 100, Server
     *                                 default:
     *                                 100)
     * @param bool|null $preserveColor When true, style elements of the source artwork, such as brush style and
     *                                 texture,
     *                                 are transferred to the target photo, but the prominent colors from the source
     *                                 artwork are not transferred, so the result retains the original colors of the
     *                                 target photo.
     *
     *
     * @see https://cloudinary.com/documentation/neural_artwork_style_transfer_addon
     */
    public static function styleTransfer(
        string $source,
        ?int $strength = null,
        ?bool $preserveColor = null
    ): StyleTransfer|EffectAction {
        return new StyleTransfer($source, $strength, $preserveColor);
    }

    /**
     * Applies an oil painting effect to the image.
     *
     * @param int|null $strength The strength of the effect. (Range: 0 to 100, Server default: 30)
     *
     */
    public static function oilPaint(?int $strength = null): StrengthEffectAction
    {
        return EffectAction::withStrength(MiscEffect::OIL_PAINT, EffectRange::PERCENT, $strength);
    }

    /**
     * Removes red eyes in the image.
     *
     */
    public static function redEye(): EffectAction
    {
        return EffectAction::named(MiscEffect::RED_EYE);
    }

    /**
     * Removes red eyes with the Advanced Facial Attribute Detection add-on.
     *
     * For details, see the Advanced Facial Attribute Detection add-on documentation.
     *
     *
     * @see https://cloudinary.com/documentation/advanced_facial_attributes_detection_addon
     */
    public static function advancedRedEye(): EffectAction
    {
        return EffectAction::named(MiscEffect::ADVANCED_RED_EYE);
    }

    /**
     * Vectorizes the image.
     *
     * Use the methods in \Cloudinary\Transformation\Vectorize to control different aspects of the vectorize effect.
     *
     * Notes:
     * * To deliver the image as a vector image, make sure to change the format (or URL extension) to a vector format,
     *  such as SVG. However, you can also deliver in a raster format if you just want to get the 'vectorized'
     *  graphic effect.
     * * Large images are scaled down to 1000 pixels in the largest dimension before vectorization.
     *
     * @param int|null   $colors    The number of colors. (Range: 2 to 30, Server default: 10)
     * @param float|null $detail    The level of detail. Specify either a percentage of the original image (Range: 0.0
     *                              to
     *                              1.0) or an absolute number of pixels (Range: 0 to 1000). (Server default: 300)
     * @param float|null $despeckle The size of speckles to suppress. Specify either a percentage of the original image
     *                              (Range: 0.0 to 1.0) or an absolute number of pixels (Range: 0 to 100, Server
     *                              default: 2)
     * @param int|null   $corners   The corner threshold.  Specify 100 for no smoothing (polygon corners), 0 for
     *                              completely smooth corners. (Range: 0 to 100, Default: 25)
     * @param int|null   $paths     The optimization value. Specify 100 for least optimization and the largest file.
     *                              (Range: 0 to 100, Server default: 100).
     *
     *
     * @see Vectorize
     */
    public static function vectorize(
        ?int $colors = null,
        ?float $detail = null,
        ?float $despeckle = null,
        ?int $corners = null,
        ?int $paths = null
    ): Vectorize {
        return new Vectorize($colors, $detail, $despeckle, $corners, $paths);
    }

    /**
     * Adds an outline to a transparent image.
     *
     * For examples, see the Image Transformations guide.
     *
     * @param string|null $mode      The type of outline effect. Use the constants defined in the Outline class.
     *                               (Default: OutlineMode::INNER and OutlineMode::OUTER).
     * @param int|null    $width     The thickness of the outline in pixels. (Range: 1 to 100, Server default: 5)
     * @param int|null    $blurLevel The level of blur of the outline. (Range: 0 to 2000, Server default: 0)
     *
     *
     * @see Outline
     * @see OutlineMode
     * @see https://cloudinary.com/documentation/effects_and_artistic_enhancements#outline
     *
     */
    public static function outline(?string $mode = null, ?int $width = null, ?int $blurLevel = null): Outline
    {
        return new Outline($mode, $width, $blurLevel);
    }

    /**
     * Adds a shadow to the image.
     *
     * The shadow is offset by the x and y values specified in the $position qualifier.
     *
     * @param int|null        $strength The strength of the shadow. (Range: 0 to 100, Server default: 40)
     * @param PointValue|null $position The position of the shadow. (Server default: bottom right)
     * @param string|null     $color    The color of the shadow (Server default: gray)
     *
     * @see Shadow
     *
     */
    public static function shadow(?int $strength = null, ?PointValue $position = null, ?string $color = null): Shadow
    {
        return new Shadow($strength, $position, $color);
    }

    /**
     * Adds a natural looking shadow to an image.
     *
     * @param int|null $azimuth   Value in range 0 - 360 (degrees).
     * @param int|null $elevation Value in range 0 - 90 (degrees).
     * @param int|null $spread    Value in range 0 -100.
     *
     *
     * @see DropShadow
     */
    public static function dropShadow(?int $azimuth = null, ?int $elevation = null, ?int $spread = null): DropShadow
    {
        return new DropShadow($azimuth, $elevation, $spread);
    }
}
