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

use Cloudinary\Transformation\Argument\ColorValue;
use Cloudinary\Transformation\Argument\Text\Stroke;
use Cloudinary\Transformation\Argument\Text\TextStyleTrait;

/**
 * Defines how to modify a text layer.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/layers#text_overlays" target="_blank">
 * Adding text captions</a>
 *
 * @api
 */
class TextSource extends BaseSource implements ImageTransformationInterface
{
    use ImageTransformationTrait;

    use TextStyleTrait;
    use TextColorTrait;
    use BackgroundColorTrait {
        BackgroundColorTrait::backgroundColor insteadof ImageTransformationTrait;
    }
    use TextFitTrait;

    /**
     * TextLayer constructor.
     *
     * @param string|null                       $text            The text.
     * @param string|TextStyle|null             $style           The text style.
     * @param string|null                       $color           The text color.
     * @param string|Background|ColorValue|null $backgroundColor Text Background color.
     */
    public function __construct(
        ?string $text = null,
        string|TextStyle|null $style = null,
        ?string $color = null,
        string|Background|ColorValue|null $backgroundColor = null
    ) {
        parent::__construct();

        $this->text($text);
        $this->textStyle($style);
        $this->textColor($color);
        $this->backgroundColor($backgroundColor);
    }

    /**
     * Gets the transformation.
     *
     * @internal
     */
    public function getTransformation(): ImageTransformation|CommonTransformation
    {
        if (! isset($this->transformation)) {
            $this->transformation = new ImageTransformation();
        }

        return $this->transformation;
    }

    /**
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): TextSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new TextSourceQualifier();
        }

        return $this->qualifiers['source'];
    }

    /**
     * Sets the text.
     *
     * @param ?string $text The text.
     *
     * @return $this
     */
    public function text(?string $text): static
    {
        $this->getSourceQualifier()->text($text);

        return $this;
    }

    /**
     * Sets the text style.
     *
     * @param array|string|TextStyle|null $style The text style.
     *
     * @return $this
     */
    public function textStyle(array|string|TextStyle|null $style): static
    {
        $this->getSourceQualifier()->textStyle($style);

        return $this;
    }

    /**
     * Adds a small amount of padding around the text overlay string.
     *
     * @return $this
     *
     * @see Flag::textNoTrim
     */
    public function noTrim(): static
    {
        return $this->addFlag(Flag::textNoTrim());
    }

    /**
     * Returns an error if the text overlay exceeds the image boundaries.
     *
     * @return $this
     *
     * @see Flag::textDisallowOverflow
     */
    public function disallowOverflow(): static
    {
        return $this->addFlag(Flag::textDisallowOverflow());
    }

    /**
     * Internal setter for text style property.
     *
     * @param string $styleName The style name.
     * @param string $value     The style.
     * @param bool   $named     Indicates whether the property is a named property.
     *
     *
     * @internal
     */
    protected function setStyleProperty(
        string $styleName,
        string $value,
        bool $named = false,
        ?string $defaultValue = null
    ): static {
        $this->getSourceQualifier()->setStyleProperty($styleName, $value, $named, $defaultValue);

        return $this;
    }

    /**
     * Sets whether to include an outline stroke.
     *
     * @param BorderQualifier|string|null $stroke The text outline stroke.
     *
     *
     * @see Stroke
     */
    public function stroke(BorderQualifier|string|null $stroke = Stroke::STROKE): static
    {
        if ($stroke instanceof BorderQualifier) {
            $this->addQualifier($stroke);
            $stroke = Stroke::STROKE;
        }

        $this->getSourceQualifier()->setStyleProperty('stroke', $stroke);

        return $this;
    }
}
