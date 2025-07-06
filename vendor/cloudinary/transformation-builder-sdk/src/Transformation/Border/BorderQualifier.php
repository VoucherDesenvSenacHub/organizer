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
use Cloudinary\Transformation\Argument\Color;
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Adds a solid border around an image or video.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#borders" target="_blank">
 * Adding image borders</a>
 *
 * @property BorderValue $value
 *
 * @api
 */
class BorderQualifier extends BaseQualifier
{
    protected const VALUE_CLASS = BorderValue::class;

    /**
     * @var string $key Serialization key.
     */
    protected static string $key = 'bo';

    use BorderStyleTrait;

    /**
     * Sets the width of the border.
     *
     * @param int|string|null $width The width in pixels.
     *
     * @return $this
     */
    public function width(int|string|null $width): static
    {
        $this->value->width($width);

        return $this;
    }

    /**
     * Sets the style of the border.
     *
     * @param string $style The style of the border.  Currently only "solid" is supported.
     *
     * @return $this
     */
    public function style(string $style): static
    {
        $this->value->style($style);

        return $this;
    }

    /**
     * Sets the color of the border.
     *
     * @param mixed $color The color of the border.
     *
     * @return $this
     */
    public function color(mixed $color): static
    {
        $this->value->color($color);

        return $this;
    }

    /**
     * Creates a new instance using provided qualifiers array.
     *
     * @param array|string $border The qualifiers of border.
     *
     */
    public static function fromParams(array|string $border): BorderQualifier
    {
        if (is_array($border)) {
            $borderWidth = ArrayUtils::get($border, 'width', 2);
            $borderColor = ArrayUtils::get($border, 'color', Color::black());

            return new self($borderColor, $borderWidth, 'solid');
        }

        $border = ArrayUtils::build($border);

        return new self(...$border);
    }
}
