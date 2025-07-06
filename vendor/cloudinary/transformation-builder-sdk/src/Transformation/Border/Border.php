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
use Cloudinary\ClassUtils;

/**
 * Adds a solid border around an image or video.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#borders" target="_blank">
 * Adding image borders</a>
 *
 * @api
 */
class Border extends BaseAction
{
    protected const MAIN_QUALIFIER = BorderQualifier::class;

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
        $this->getMainQualifier()->width($width);

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
        $this->getMainQualifier()->style($style);

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
        $this->getMainQualifier()->color($color);

        return $this;
    }

    /**
     * Rounds the specified corners of an image.
     *
     * Only $radiusOrTopLeft specified: All four corners are rounded equally according to the value.<br>
     * Only $radiusOrTopLeft and $topRight specified: Round the top-left & bottom-right corners according
     * to $radiusOrTopLeft, round the top-right & bottom-left corners according to $topRight.<br>
     * Only $radiusOrTopLeft, $topRight and $bottomRight specified: Round the top-left corner according
     * to $radiusOrTopLeft, round the top-right & bottom-left corners according to $topRight, round the bottom-right
     * corner according to $bottomRight.<br>
     * All qualifiers specified: Each corner is rounded accordingly.
     *
     * @param int|string|CornerRadius|RoundCorners $radiusOrTopLeft The radius in pixels of the top left corner or all
     *                                                              the corners if no other corners are specified.
     * @param int|null                             $topRight        The radius in pixels of the top right corner.
     * @param int|null                             $bottomRight     The radius in pixels of the bottom right corner.
     * @param int|null                             $bottomLeft      The radius in pixels of the bottom left corner.
     *
     *
     * @see RoundCorners
     */
    public function roundCorners(
        int|string|CornerRadius|RoundCorners $radiusOrTopLeft,
        ?int $topRight = null,
        ?int $bottomRight = null,
        ?int $bottomLeft = null
    ): static {
        $qualifiers = ArrayUtils::safeFilter([$radiusOrTopLeft, $topRight, $bottomRight, $bottomLeft]);

        return $this->addQualifier(ClassUtils::verifyVarArgsInstance($qualifiers, RoundCorners::class));
    }
}
