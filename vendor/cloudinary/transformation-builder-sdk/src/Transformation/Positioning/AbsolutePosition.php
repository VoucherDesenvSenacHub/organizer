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
 * Class AbsolutePosition
 */
class AbsolutePosition extends BasePosition
{
    use PointTrait;

    /**
     * AbsolutePosition constructor.
     *
     * @param mixed      $x
     * @param mixed|null $y
     */
    public function __construct($x = null, mixed $y = null)
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
        if (! isset($this->qualifiers[Point::getName()])) {
            $this->addQualifier(new Point());
        }

        $this->qualifiers[Point::getName()]->setPointValue($value);

        return $this;
    }
}
