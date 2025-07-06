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
 * Trait PositionFlagTrait
 *
 * @package Cloudinary\Transformation
 */
trait PositionFlagTrait
{
    /**
     * Tiles the added overlay over the entire image.
     *
     */
    public function tiled(): static
    {
        return $this->setFlag(Flag::tiled());
    }

    /**
     * Prevents Cloudinary from extending the image canvas beyond the original dimensions when overlaying text and
     * other images.
     *
     * @param bool $allowOverflow Indicates whether to allow overflow.
     *
     *
     * @see Flag::noOverflow
     */
    public function allowOverflow(bool $allowOverflow = false): static
    {
        $this->setFlag(Flag::noOverflow(), !$allowOverflow);

        return $this;
    }
}
