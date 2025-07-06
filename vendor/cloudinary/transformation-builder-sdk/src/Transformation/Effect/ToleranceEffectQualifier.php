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
 * Class ToleranceEffectQualifier
 *
 * This class is used for all effects that have a tolerance value.
 *
 * @internal
 */
class ToleranceEffectQualifier extends LimitedEffectQualifier
{
    /**
     * Setter of the effect level of tolerance.
     *
     * @param int $tolerance The level of tolerance to set.
     *
     *
     * @internal
     */
    public function tolerance(int $tolerance): LimitedEffectQualifier
    {
        $this->setEffectValue($tolerance);

        return $this;
    }
}
