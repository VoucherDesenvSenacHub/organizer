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

/**
 * Class Outline
 */
class Outline extends ColoredEffectAction
{
    /**
     * Outline constructor.
     *
     */
    public function __construct($mode = null, $width = null, $blurLevel = null)
    {
        parent::__construct(new OutlineQualifier());

        $this->mode($mode);
        $this->width($width);
        $this->blurLevel($blurLevel);
    }

    /**
     * Sets the outline mode.
     *
     * @param int|string|null $mode The outline mode.
     *
     */
    public function mode(int|string|null $mode): static
    {
        $this->qualifiers[OutlineQualifier::getName()]->mode($mode);

        return $this;
    }

    /**
     * Sets the outline width.
     *
     * @param int|string|null $width The width in pixels.
     *
     */
    public function width(int|string|null $width): static
    {
        $this->qualifiers[OutlineQualifier::getName()]->width($width);

        return $this;
    }

    /**
     * Sets the outline blur level.
     *
     * @param int|string|null $blurLevel The level of blur.
     *
     */
    public function blurLevel(int|string|null $blurLevel): static
    {
        $this->qualifiers[OutlineQualifier::getName()]->blurLevel($blurLevel);

        return $this;
    }
}
