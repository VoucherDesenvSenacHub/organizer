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
 * Class StrengthEffectQualifier
 *
 * This class is used for all effects that have a strength value.
 *
 * @internal
 */
class StrengthEffectQualifier extends LimitedEffectQualifier
{
    /**
     * Setter of the effect strength.
     *
     * @param int|string|null $strength The strength to set.
     *
     *
     * @internal
     */
    public function strength(int|string|null $strength): static
    {
        $this->setEffectValue($strength);

        return $this;
    }
}
