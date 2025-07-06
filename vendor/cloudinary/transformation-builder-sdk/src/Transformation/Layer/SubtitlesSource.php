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
use Cloudinary\Transformation\Argument\Text\TextStyleTrait;

/**
 * Defines how to modify a subtitle layer.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#subtitles" target="_blank">
 * Adding subtitles</a>
 *
 * @api
 */
class SubtitlesSource extends AssetBasedSource
{
    use TextColorTrait;
    use BackgroundColorTrait;
    use TextStyleTrait;

    /**
     * SubtitlesLayer constructor.
     *
     */
    public function __construct($subtitlesId)
    {
        parent::__construct(ClassUtils::verifyInstance($subtitlesId, SubtitlesSourceQualifier::class));
    }

    /**
     * Gets the transformation.
     *
     */
    public function getTransformation(): VideoTransformation
    {
        if (! isset($this->transformation)) {
            $this->transformation = new VideoTransformation();
        }

        return $this->transformation;
    }

    /**
     * Sets the text style of the subtitles.
     *
     * @param array|TextStyle $style The style.
     *
     * @return $this
     */
    public function textStyle(array|TextStyle $style): static
    {
        $this->getSourceQualifier()->textStyle($style);

        return $this;
    }

    /**
     * Internal setter for text style property.
     *
     * @param string $styleName The style name.
     * @param string $value     The style.
     * @param bool   $named     Indicates whether the property is a named property.
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
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): SubtitlesSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new SubtitlesSourceQualifier(null);
        }

        return $this->qualifiers['source'];
    }
}
