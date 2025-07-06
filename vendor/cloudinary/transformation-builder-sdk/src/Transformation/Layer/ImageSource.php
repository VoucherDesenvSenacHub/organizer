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
 * Defines how to modify an image layer.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/layers#layer_transformation_syntax target="_blank">
 * Image overlays</a>
 *
 * @api
 */
class ImageSource extends AssetBasedSource implements ImageTransformationInterface
{
    use ImageTransformationTrait;
    use ImageSourceTrait;

    /**
     * ImageLayer constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct($source);
    }

    /**
     * Gets the transformation.
     *
     * @internal
     */
    public function getTransformation(): CommonTransformation|ImageTransformation
    {
        if (! isset($this->transformation)) {
            $this->transformation = new ImageTransformation();
        }

        return $this->transformation;
    }

    /**
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): ImageSourceQualifier|BaseSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new ImageSourceQualifier(null);
        }

        return $this->qualifiers['source'];
    }
}
