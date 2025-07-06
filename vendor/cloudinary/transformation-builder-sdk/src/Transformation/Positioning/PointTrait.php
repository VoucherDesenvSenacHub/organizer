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
 * Trait PointTrait
 *
 * @api
 */
trait PointTrait
{
    /**
     * Sets the x dimension of the point.
     *
     * @param float|int|string|null $x The value of the x dimension.
     *
     * @return $this
     */
    public function x(float|int|string|null $x): static
    {
        return $this->setPointValue(ClassUtils::verifyInstance($x, X::class));
    }

    /**
     * Sets the y dimension of the point.
     *
     * @param float|int|string|null $y The value of the y dimension.
     *
     * @return $this
     */
    public function y(float|int|string|null $y): static
    {
        return $this->setPointValue(ClassUtils::verifyInstance($y, Y::class));
    }

    /**
     * Sets the x and y dimensions of the point.
     *
     * @param float|int|string|null $x The value of the x dimension.
     * @param float|int|string|null $y The value of the y dimension.
     *
     */
    public function point(float|int|string|null $x = null, float|int|string|null $y = null): static
    {
        return $this->x($x)->y($y);
    }

    /**
     * Internal setter for the point value.
     *
     *
     *
     * @internal
     */
    abstract public function setPointValue(mixed $value): static;
}
