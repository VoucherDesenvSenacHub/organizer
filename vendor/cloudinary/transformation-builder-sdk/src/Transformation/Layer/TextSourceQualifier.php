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
use Cloudinary\Transformation\Argument\Text\Text;
use Cloudinary\Transformation\Argument\Text\TextStyleTrait;

/**
 * Class TextSourceQualifier
 */
class TextSourceQualifier extends BaseSourceQualifier
{
    use TextStyleTrait;

    /**
     * @var string $sourceType The type of the layer.
     */
    protected string $sourceType = 'text';

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = ['text_style', 'source_value', 'text'];

    /**
     * TextSourceQualifier constructor.
     *
     * @param string|Text|null            $text  The text.
     * @param array|string|TextStyle|null $style The text style.
     */
    public function __construct(string|Text|null $text = null, array|string|TextStyle|null $style = null)
    {
        parent::__construct();

        $this->text($text)->textStyle($style);
    }

    /**
     * Sets the text.
     *
     * @param string|Text|null $text The text.
     *
     * @return $this
     */
    public function text(string|Text|null $text): static
    {
        $this->value->setValue(ClassUtils::verifyInstance($text, Text::class));

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
        if (is_array($style)) {
            $style = TextStyle::fromParams($style);
        }

        $this->value->setValue(ClassUtils::forceInstance($style, TextStyle::class));

        return $this;
    }

    /**
     * Text style can be set to a public ID of the text asset that contains style.
     *
     * @param SourceValue|string|null $publicId The public ID of the text asset.
     *
     * @return $this
     */
    public function styleFromPublicId(SourceValue|string|null $publicId): static
    {
        $this->value->setValue(ClassUtils::verifyInstance($publicId, SourceValue::class));

        return $this;
    }

    /**
     * Gets the text style.
     *
     */
    protected function getStyle(): TextStyle
    {
        if (! $this->value->getSimpleValue('text_style')) {
            $this->value->setValue(new TextStyle());
        }

        return $this->value->getSimpleValue('text_style');
    }

    /**
     * Internal setter for text style property.
     *
     * @param string  $styleName The style name.
     * @param ?string $value     The style.
     * @param bool    $named     Indicates whether the property is a named property.
     * @param string|null $defaultValue The default value of the property. Used for omitting values that are default.
     * @internal
     */
    public function setStyleProperty(
        string $styleName,
        ?string $value,
        bool $named = false,
        ?string $defaultValue = null
    ): static {
        $this->getStyle()->setStyleProperty($styleName, $value, $named, $defaultValue);

        return $this;
    }
}
