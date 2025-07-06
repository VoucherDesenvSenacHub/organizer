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

use Cloudinary\Transformation\Qualifier\Dimensions\Dimensions;

/**
 * Class Region
 */
class Region extends BaseAction
{
    public const FACES = "faces";
    public const GRAVITY = "gravity";
    public const CUSTOM  = "custom";

    use RegionTrait;
    use PixelEffectRegionTrait;

    /**
     * Region constructor.
     */
    public function __construct(
        int|string|null $x = null,
        int|string|null $y = null,
        int|string|null $width = null,
        int|string|null $height = null
    ) {
        parent::__construct();

        $this->x($x)->y($y)->width($width)->height($height);
    }

    /**
     * Internal setter for the point value.
     *
     *
     *
     * @internal
     */
    public function setPointValue($value): static
    {
        if (! isset($this->qualifiers[Point::getName()])) {
            $this->addQualifier(new Point());
        }

        $this->qualifiers[Point::getName()]->setPointValue($value);

        return $this;
    }

    /**
     * Internal setter for the dimensions.
     *
     *
     *
     * @internal
     */
    public function setDimension($value): static
    {
        if (! isset($this->qualifiers[Dimensions::getName()])) {
            $this->addQualifier(new Dimensions());
        }

        $this->qualifiers[Dimensions::getName()]->addQualifier($value);

        return $this;
    }

    public function getRegionType(): string
    {
        if (isset($this->qualifiers[GravityQualifier::getName()])) {
            $gravityQualifier = $this->qualifiers[GravityQualifier::getName()];

            if ((string)$gravityQualifier->getValue() === FocalGravity::FACES) {
                return self::FACES;
            }

            return self::GRAVITY;
        }

        return self::CUSTOM;
    }
}
