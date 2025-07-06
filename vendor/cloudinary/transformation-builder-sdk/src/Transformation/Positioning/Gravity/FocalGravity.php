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
 * Defines the area to keep when automatically resizing an image.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/resizing_and_cropping#adjusting_the_automatic_gravity_focal_preference
 * target="_blank">Focal gravity</a>
 *
 * @api
 */
class FocalGravity extends GravityQualifier implements FocalGravityInterface
{
    use FocalGravityBuilderTrait;

    //TODO: handle aggressive auto gravity

    /**
     * FocalGravity constructor.
     *
     * @param array $fallBacks
     */
    public function __construct($focalGravity, ...$fallBacks)
    {
        parent::__construct();

        $this->setGravity($focalGravity, ...$fallBacks);
    }

    /**
     * Sets the gravity.
     *
     * @param string|FocalGravity $focalGravity The gravity.
     * @param array               $fallBacks    Fallback gravities.
     *
     *
     * @internal
     */
    protected function setGravity(string|FocalGravity $focalGravity, ...$fallBacks): static
    {
        $this->setQualifierValue($focalGravity, ...$fallBacks);

        return $this;
    }

    /**
     * Adds fallback gravities.
     *
     * @param array $fallBacks The fallback gravities.
     *
     *
     * @internal
     */
    protected function addFallBacks(...$fallBacks): static
    {
        $this->value->addValues(...$fallBacks);

        return $this;
    }
}
