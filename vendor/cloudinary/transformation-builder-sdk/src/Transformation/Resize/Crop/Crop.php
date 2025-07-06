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
 * Class Crop
 */
class Crop extends BaseResizeAction
{
    use CropTrait;

    use FocalGravityTrait;
    use AbsolutePositionTrait;
    use ZoomTrait;

    /**
     * Crop constructor.
     *
     * @param string|CropMode $cropMode
     * @param mixed           $width
     * @param mixed           $height
     * @param mixed           $gravity
     * @param mixed           $x
     * @param mixed           $y
     */
    public function __construct(
        string|CropMode $cropMode,
        mixed $width = null,
        mixed $height = null,
        mixed $gravity = null,
        mixed $x = null,
        mixed $y = null
    ) {
        parent::__construct($cropMode, $width, $height);

        $this->gravity($gravity);
        $this->position($x, $y);
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
        if (! isset($this->qualifiers[AbsolutePosition::getName()])) {
            $this->addQualifier(Position::absolute());
        }

        $this->qualifiers[AbsolutePosition::getName()]->setPointValue($value);

        return $this;
    }
}
