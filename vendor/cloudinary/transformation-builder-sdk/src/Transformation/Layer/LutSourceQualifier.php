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

use Cloudinary\ClassUtils;

/**
 * Class LutSourceQualifier
 */
class LutSourceQualifier extends BaseSourceQualifier
{
    /**
     * @var string $sourceType The type of the layer.
     */
    protected string $sourceType = 'lut';

    /**
     * LutLayerQualifier constructor.
     *
     */
    public function __construct($lutId)
    {
        parent::__construct();

        $this->lut($lutId);
    }

    /**
     * Sets the lut source.
     *
     * @param string|SourceValue|null $lutId The public ID of the LUT asset.
     *
     * @return $this
     */
    public function lut(SourceValue|string|null $lutId): static
    {
        $this->value->setValue(ClassUtils::verifyInstance($lutId, SourceValue::class));

        return $this;
    }
}
