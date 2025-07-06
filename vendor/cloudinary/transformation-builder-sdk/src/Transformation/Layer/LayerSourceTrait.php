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
 * Trait LayerSourceTrait
 */
trait LayerSourceTrait
{
    /**
     * Sets the source of the layer.
     *
     * @param string|BaseSourceQualifier|SourceValue $source The source.
     *
     */
    public function source(SourceValue|BaseSourceQualifier|string $source): static
    {
        return $this->setSource($source);
    }

    /**
     * Sets the source of the layer.
     *
     * @param string|BaseSourceQualifier|QualifierMultiValue $source The source.
     *
     *
     * @internal
     *
     */
    public function setSource(BaseSourceQualifier|QualifierMultiValue|string $source): static
    {
        if ($source instanceof BaseQualifier) {
            $source = $source->getValue();
        }

        return $this->setSimpleValue('source', $source);
    }
}
