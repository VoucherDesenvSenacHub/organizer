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
 * Defines how to modify a fetched video layer.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/video_layers#layer_transformations target="_blank">
 * Video overlays</a>
 *
 * @api
 */
class FetchVideoSource extends VideoSource
{
    /**
     * VideoLayer constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct($source);

        $this->setSource($source);
    }
    /**
     * Sets the source of the layer.
     *
     * @param string|BaseSourceQualifier $source The source.
     *
     * @return $this
     */
    public function setSource(BaseSourceQualifier|string $source): static
    {

        if ($source instanceof FetchSourceQualifier) {
            $this->getSourceQualifier()->fetchUrl($source->getValue());

            return $this;
        }

        $this->getSourceQualifier()->fetchUrl((string)$source);


        return $this;
    }

    /**
     * Gets the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): FetchSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = (new FetchSourceQualifier(null))->assetType("video");
        }

        return $this->qualifiers['source'];
    }
}
