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
 * Class MinMaxRange
 */
class MinMaxRange extends QualifierMultiValue
{
    public const VALUE_DELIMITER = '-';

    /**
     * @var array $argumentOrder The order of the arguments.
     */
    protected array $argumentOrder = ['min', 'max'];

    /**
     * MinMaxRange constructor.
     */
    public function __construct(int|float|string|null $min, int|float|string|null $max = null)
    {
        parent::__construct();

        $this->min($min);
        $this->max($max);
    }

    /**
     * Sets the minimum value.
     *
     * @param int|float|string|null $min The minimum value.
     *
     * @return $this
     */
    public function min(int|float|string|null $min): static
    {
        return $this->setSimpleValue('min', $min);
    }

    /**
     * Sets the maximum value.
     *
     * @param int|float|string|null $max The maximum value.
     *
     * @return $this
     */
    public function max(int|float|string|null $max): static
    {
        return $this->setSimpleValue('max', $max);
    }
}
