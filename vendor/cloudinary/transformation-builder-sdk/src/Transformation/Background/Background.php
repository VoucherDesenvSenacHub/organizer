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
use Cloudinary\Transformation\Argument\ColorValue;
use Cloudinary\Transformation\Qualifier\BaseQualifier;
use Cloudinary\Transformation\Qualifier\Value\ColorValueTrait;

/**
 * Defines the background color to use instead of transparent background areas or when resizing with padding.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#setting_background_color" target="_blank">
 * Setting background for images</a> |
 * <a href="https://cloudinary.com/documentation/video_effects_and_enhancements#background_color" target="_blank">
 * Setting background for videos</a>
 *
 * @api
 */
class Background extends BaseQualifier
{
    use AutoBackgroundTrait;
    use AutoGradientBackgroundTrait;
    use ColorValueTrait;

    /**
     * @var string $name The name.
     */
    protected static string $name = 'background';

    /**
     * Background constructor.
     *
     */
    public function __construct($color)
    {
        parent::__construct(ClassUtils::verifyInstance($color, ColorValue::class));
    }

    /**
     * Sets the background color.
     *
     * @param string $color The color. Can be RGB, HEX, named color, etc.
     *
     *
     */
    public static function color(string $color): Background
    {
        return new self($color);
    }

    /**
     * Applies blurred background (Relevant only for videos).
     *
     * @param int|null $intensity  The intensity of the blur.
     * @param int|null $brightness The brightness of the background.
     *
     *
     */
    public static function blurred(?int $intensity = null, ?int $brightness = null): BlurredBackground
    {
        return new BlurredBackground($intensity, $brightness);
    }

    /**
     * Applies background color automatically.
     *
     * @param string|null $autoBackground The type of the background color. See AutoBackground class.
     *
     *
     * @see AutoBackground
     */
    public static function auto(?string $autoBackground = null): AutoBackground
    {
        return ClassUtils::forceInstance($autoBackground, AutoBackground::class);
    }

    /**
     * Applies generative AI background.
     *
     * @param array|string|null $prompt           Use natural language to describe what generate in the image.
     * @param bool|null         $ignoreForeground Whether to take foreground elements into account.
     *
     */
    public static function generativeFill(
        array|string|null $prompt = null,
        ?bool $ignoreForeground = null
    ): GenerativeFillBackground {
        return new GenerativeFillBackground($prompt, $ignoreForeground);
    }
}
