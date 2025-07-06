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

/**
 * Trait OffsetTrait
 *
 * @api
 */
trait OffsetTrait
{
    /**
     * Sets the x offset.
     *
     * @param float|int|string|null $x The x offset.
     *
     * @return $this
     */
    public function offsetX(float|int|string|null $x): static
    {
        return $this->setOffsetValue(ClassUtils::verifyInstance($x, X::class));
    }

    /**
     * Sets the y offset.
     *
     * @param float|int|string|null $y The y offset.
     *
     * @return $this
     */
    public function offsetY(float|int|string|null $y): static
    {
        return $this->setOffsetValue(ClassUtils::verifyInstance($y, Y::class));
    }

    /**
     * Sets the x and y offset.
     *
     * @param float|int|string|null $x The x offset.
     * @param float|int|string|null $y The y offset.
     *
     */
    public function offset(float|int|string|null $x = null, float|int|string|null $y = null): static
    {
        return $this->offsetX($x)->offsetY($y);
    }

    /**
     * @internal
     *
     *
     */
    abstract public function setOffsetValue($value): static;
}
