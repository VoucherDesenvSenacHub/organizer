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
 * Defines how to modify a video layer.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#video_overlays" target="_blank">
 * Video overlays</a>
 *
 * @api
 */
class VideoSource extends AssetBasedSource
{
    use VideoTransformationTrait;
    use VideoSourceTrait;
    use AudioSourceTrait;
    use ImageSourceTrait;

    /**
     * VideoLayer constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct(ClassUtils::verifyInstance($source, VideoSourceQualifier::class));
    }

    /**
     * Getter for the video transformation.
     *
     * Creates a new VideoTransformation if not initialized.
     *
     *
     * @internal
     */
    public function getTransformation(): VideoTransformation
    {
        if (! isset($this->transformation)) {
            $this->transformation = new VideoTransformation();
        }

        return $this->transformation;
    }

    /**
     * Getter for the layer qualifier.
     *
     *
     * @internal
     */
    protected function getSourceQualifier(): VideoSourceQualifier|BaseSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new VideoSourceQualifier(null);
        }

        return $this->qualifiers['source'];
    }
}
