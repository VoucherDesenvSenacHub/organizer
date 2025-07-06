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
 * Class LevelEffectQualifier
 *
 * This class is used for all effects that have a level value.
 *
 * @internal
 */
class LevelEffectQualifier extends LimitedEffectQualifier
{
    /**
     * Setter of the effect level.
     *
     * @param int $level The level to set.
     *
     *
     * @internal
     */
    public function level(int $level): LimitedEffectQualifier
    {
        $this->setEffectValue($level);

        return $this;
    }
}
