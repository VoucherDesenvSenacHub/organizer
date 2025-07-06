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
 * Class Shear
 */
class Shear extends EffectQualifier
{
    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, 'skew_x', 'skew_y'];

    /**
     * Shear constructor.
     */
    public function __construct(float|int|null  $skewX = null, float|int|null $skewY = null)
    {
        parent::__construct(ReshapeQualifier::SHEAR);

        $this->skewX($skewX);
        $this->skewY($skewY);
    }

    /**
     * Sets the angle of skew on the x-axis.
     *
     * @param float|int|null $value The angle of skew on the x-axis in degrees.
     *
     */
    public function skewX(float|int|null $value): static
    {
        $this->value->setSimpleValue('skew_x', $value);

        return $this;
    }

    /**
     * Sets the angle of skew on the y-axis.
     *
     * @param float|int|null $value The angle of skew on the y-axis in degrees.
     *
     */
    public function skewY(float|int|null $value): static
    {
        $this->value->setSimpleValue('skew_y', $value);

        return $this;
    }
}
