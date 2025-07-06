<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

use Cloudinary\Transformation\BaseComponent;

/**
 * Defines how to implement a background gradient fade effect.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#content_aware_padding" target="_blank">
 * Content aware padding</a>
 *
 *
 * @api
 */
class Gradient extends BaseComponent
{
    /**
     * Base the gradient fade effect on the predominant colors in the image.
     */
    public const PREDOMINANT_GRADIENT = 'predominant_gradient';

    /**
     * Base the effect on the colors that contrast the predominant colors in the image.
     */
    public const PREDOMINANT_GRADIENT_CONTRAST = 'predominant_gradient_contrast';

    /**
     * Base the gradient fade effect on the predominant colors in the border pixels of the image.
     */
    public const BORDER_GRADIENT = 'border_gradient';

    /**
     * Base the effect on the colors that contrast the predominant colors in the border pixels of the image.
     */
    public const BORDER_GRADIENT_CONTRAST = 'border_gradient_contrast';

    /**
     * @var string $type The type of gradient fade.
     */
    protected string $type;

    /**
     * @var int $numberOfColors The number of predominant colors to use (2 or 4).
     */
    protected int $numberOfColors;

    /**
     * @var string $direction The direction of fade.
     */
    protected string $direction;

    /**
     * Gradient constructor.
     */
    public function __construct(?string $type = null, ?int $numberOfColors = null, ?string $direction = null)
    {
        parent::__construct();

        $this->type($type);
        $this->numberOfColors($numberOfColors);
        $this->direction($direction);
    }

    /**
     * Sets the type of gradient fade.
     *
     * @param string $type The type of gradient fade.
     *
     */
    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Sets the number of predominant colors to use (2 or 4).
     *
     * @param int $numberOfColors The number of predominant colors to use (2 or 4).
     *
     */
    public function numberOfColors(int $numberOfColors): static
    {
        $this->numberOfColors = $numberOfColors;

        return $this;
    }

    /**
     * Sets the direction of fade.
     *
     * @param string $direction The direction of fade.  Use the constants defined in the GradientDirection class.
     *
     *
     * @see GradientDirection
     */
    public function direction(string $direction): static
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return ! empty($this->type) ?
            implode(':', array_filter([$this->type, $this->numberOfColors, $this->direction])) :
            '';
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        // TODO: Implement jsonSerialize() method.
        return [];
    }
}
