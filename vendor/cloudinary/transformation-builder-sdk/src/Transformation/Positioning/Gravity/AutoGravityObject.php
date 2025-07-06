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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class AutoGravityObject
 *
 * @internal
 */
class AutoGravityObject extends QualifierMultiValue
{
    protected const VALUE_DELIMITER = '_';

    /**
     * @var array $argumentOrder The order of the arguments.
     */
    protected array $argumentOrder = ['gravity', 'avoid', 'weight'];

    /**
     * AutoGravityObject constructor.
     *
     * @param string $gravity The AutoGravityObject
     */
    public function __construct($gravity)
    {
        parent::__construct();

        $this->gravity($gravity);
    }

    /**
     * Sets the object gravity.
     *
     *
     * @return $this
     */
    public function gravity($gravity): static
    {
        if ($gravity instanceof BaseQualifier) {
            $gravity = $gravity->getValue();
        }

        return $this->setSimpleValue('gravity', $gravity);
    }

    /**
     * Whether to avoid the object.
     *
     * @return $this
     */
    public function avoid(): static
    {
        return $this->setSimpleValue('avoid', 'avoid');
    }

    /**
     * Sets the object weight.
     *
     * @param int $weight The weight of the object.
     *
     * @return $this
     */
    public function weight(int $weight): static
    {
        return $this->setSimpleValue('weight', $weight);
    }
}
