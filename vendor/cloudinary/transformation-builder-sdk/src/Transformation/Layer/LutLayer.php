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
 * Defines the 3D lookup table to apply to images and videos.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#3d_luts" target="_blank">
 * Applying 3D LUTs to images</a> | <a
 * href="https://cloudinary.com/documentation/video_effects_and_enhancements#3d_luts"
 * target="_blank"> Applying 3D LUTs to videos</a>
 *
 * @api
 */
class LutLayer extends AssetBasedSource implements AdjustmentInterface
{
    /**
     * LutLayer constructor.
     *
     */
    public function __construct($lut)
    {
        parent::__construct(ClassUtils::verifyInstance($lut, LutSourceQualifier::class));
    }

    /**
     * Gets the transformation.
     *
     */
    public function getTransformation(): Transformation
    {
        if (! isset($this->transformation)) {
            $this->transformation = new Transformation();
        }

        return $this->transformation;
    }

    /**
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): LutSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new LutSourceQualifier(null);
        }

        return $this->qualifiers['source'];
    }
}
