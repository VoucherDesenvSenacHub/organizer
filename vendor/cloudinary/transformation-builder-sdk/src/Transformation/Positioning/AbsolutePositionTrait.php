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
 * Trait AbsolutePositionTrait
 *
 * @api
 */
trait AbsolutePositionTrait
{
    use PointTrait;

    /**
     * Sets the absolute position.
     *
     * @param float|int|string|null $x The x dimension.
     * @param float|int|string|null $y The y dimension.
     *
     * @return $this
     */
    public function position(float|int|string|null $x = null, float|int|string|null $y = null): static
    {
        return $this->point($x, $y);
    }
}
