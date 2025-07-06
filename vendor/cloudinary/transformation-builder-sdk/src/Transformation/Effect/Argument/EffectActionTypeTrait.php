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
 * Trait EffectTypeTrait
 */
trait EffectActionTypeTrait
{
    /**
     * Setter of the effect type.
     *
     * @param string $type The type to set.
     *
     * @return $this
     */
    public function type(string $type): static
    {
        $this->qualifiers[EffectQualifier::getName()]->type($type);

        return $this;
    }
}
