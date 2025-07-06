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

/**
 * Class BorderValue
 */
class BorderValue extends QualifierMultiValue
{
    protected const VALUE_DELIMITER = '_';

    /**
     * @var array $argumentOrder The order of the arguments.
     */
    protected array $argumentOrder = ['width', 'style', 'color'];

    /**
     * BorderValue constructor.
     *
     * @param string          $color
     */
    public function __construct(mixed $color = null, int|string|null $width = null, ?string $style = null)
    {
        parent::__construct();

        $this->width($width);
        $this->style($style);
        $this->color($color);
    }

    /**
     * Sets the style of the border.
     *
     * @param string|null $style The border style.  Currently only "solid" is supported.
     *
     * @return $this
     */
    public function style(?string $style): static
    {
        return $this->setSimpleValue('style', $style);
    }

    /**
     * Sets the width of the border.
     *
     * @param int|string|null $width The width of the border in pixels.
     *
     * @return $this
     */
    public function width(int|string|null $width): static
    {
        return $this->setSimpleValue('width', $width && is_numeric($width) ? "{$width}px" : $width);
    }

    /**
     * Sets the color of the border.
     *
     * @param mixed $color The border color.
     *
     * @return $this
     *
     * @see Color
     */
    public function color(mixed $color): static
    {
        return $this->setSimpleValue('$color', ClassUtils::verifyInstance($color, ColorValue::class));
    }

}
