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
 * Defines how to modify an audio layer.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#audio_overlays" target="_blank">
 * Video overlays</a>
 *
 * @api
 */
class AudioSource extends AssetBasedSource
{
    use VideoTransformationTrait; // FIXME: keep only relevant audio transformations.
    use AudioSourceTrait;

    /**
     * AudioSource constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct(ClassUtils::verifyInstance($source, AudioSourceQualifier::class));
    }

    /**
     * Getter for the audio (video) transformation.
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
    protected function getSourceQualifier(): AudioSourceQualifier
    {
        if (! isset($this->qualifiers['source'])) {
            $this->qualifiers['source'] = new AudioSourceQualifier(null);
        }

        return $this->qualifiers['source'];
    }


    /**
     * Named constructor.
     *
     * @param string|BaseSource $source The layer source.
     *
     */
    protected static function createWithSource(BaseSource|string $source): BaseSource|string|static
    {
        return $source;
    }
}
