<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument\Text;

use Cloudinary\Transformation\TextStyle;

/**
 * Trait TextStyleTrait
 */
trait TextStyleTrait
{
    /**
     * Sets the font family of the text.
     *
     * @param ?string $fontFamily The font family. Use the constants defined in the FontFamily class.
     *
     *
     * @see FontFamily
     */
    public function fontFamily(?string $fontFamily): static
    {
        return $this->setStyleProperty('font_family', $fontFamily);
    }

    /**
     * Sets the font size of the text.
     *
     * @param float|int|null $fontSize The font size.
     *
     */
    public function fontSize(float|int|null $fontSize): static
    {
        return $this->setStyleProperty('font_size', $fontSize);
    }

    /**
     * Sets the font weight of the text.
     *
     * @param mixed $fontWeight The font weight. Use the constants defined in the FontWeight class.
     *
     *
     * @see FontWeight
     */
    public function fontWeight(mixed $fontWeight): static
    {
        return $this->setStyleProperty('font_weight', $fontWeight, false, TextStyle::DEFAULT_FONT_WEIGHT);
    }

    /**
     * Sets the font style of the text.
     *
     * @param mixed $fontStyle The font style.  Use the constants defined in the FontStyle class.
     *
     *
     * @see FontStyle
     */
    public function fontStyle(mixed $fontStyle): static
    {
        return $this->setStyleProperty('font_style', $fontStyle, false, TextStyle::DEFAULT_FONT_STYLE);
    }

    /**
     * Sets the text decoration.
     *
     * @param mixed $textDecoration The text decoration.  Use the constants defined in the TextDecoration class.
     *
     *
     * @see TextDecoration
     */
    public function textDecoration(mixed $textDecoration): static
    {
        return $this->setStyleProperty('text_decoration', $textDecoration, false, TextStyle::DEFAULT_TEXT_DECORATION);
    }

    /**
     * Sets the alignment of the text.
     *
     * @param mixed $textAlignment The alignment of the text. Use the constants defined in the TextAlignment class.
     *
     *
     * @see TextAlignment
     */
    public function textAlignment(mixed $textAlignment): static
    {
        return $this->setStyleProperty('text_alignment', $textAlignment, false, TextStyle::DEFAULT_TEXT_ALIGNMENT);
    }

    /**
     * Sets whether to include an outline stroke.
     *
     * @param mixed|string $stroke The stroke determiner. Use the constants defined in the Stroke class.
     *
     *
     * @see Stroke
     */
    public function stroke(mixed $stroke = Stroke::STROKE): static
    {
        return $this->setStyleProperty('stroke', $stroke, false, TextStyle::DEFAULT_STROKE);
    }

    /**
     * Sets the spacing between the letters.
     *
     * @param mixed $letterSpacing The spacing between the letters in pixels.  Can be positive or negative.
     *
     */
    public function letterSpacing(mixed $letterSpacing): static
    {
        return $this->setStyleProperty('letter_spacing', $letterSpacing, true);
    }

    /**
     * Sets the spacing between the lines.
     *
     * @param mixed $lineSpacing The spacing between multiple lines in pixels.
     *
     */
    public function lineSpacing(mixed $lineSpacing): static
    {
        return $this->setStyleProperty('line_spacing', $lineSpacing, true);
    }

    /**
     * Sets the font antialiasing method.
     *
     * @param mixed $fontAntialias    The font antialiasing method.  Use the constants defined in the FontAntialias
     *                                class.
     *
     *
     * @see FontAntialias
     */
    public function fontAntialias(mixed $fontAntialias): static
    {
        return $this->setStyleProperty('antialias', $fontAntialias, true);
    }

    /**
     * Sets the type of font hinting.
     *
     * @param mixed $fontHinting The type of font hinting. Use the constants defined in the FontHinting class.
     *
     *
     * @see FontHinting
     */
    public function fontHinting(mixed $fontHinting): static
    {
        return $this->setStyleProperty('hinting', $fontHinting, true);
    }

    /**
     * Internal setter for text style property.
     *
     * @param string      $styleName    The style name.
     * @param ?string     $value        The style.
     * @param bool        $named        Indicates whether the property is a named property.
     * @param string|null $defaultValue The default value of the property. Used for omitting values that are default.
     *
     *
     * @internal
     */
    public function setStyleProperty(
        string $styleName,
        ?string $value,
        bool $named = false,
        ?string $defaultValue = null
    ): static {
        if ($value === $defaultValue) {
            return $this;
        }

        if ($named) {
            return $this->setSimpleNamedValue($styleName, $value);
        }

        return $this->setSimpleValue($styleName, $value);
    }
}
