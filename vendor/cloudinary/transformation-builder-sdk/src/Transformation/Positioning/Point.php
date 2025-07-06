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
 * Class Point
 */
class Point extends BaseAction
{
    use PointTrait;

    /**
     * Point constructor.
     *
     * @param float|int|string      $x
     * @param float|int|string|null $y
     */
    public function __construct(float|int|string|null $x = null, float|int|string|null $y = null)
    {
        parent::__construct();

        $this->point($x, $y);
    }

    /**
     * Internal setter for the point value.
     *
     *
     *
     * @internal
     */
    public function setPointValue(mixed $value): static
    {
        return $this->addQualifier($value);
    }
}
