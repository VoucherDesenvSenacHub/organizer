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
 * Class VideoSourceQualifier
 */
class VideoSourceQualifier extends BaseSourceQualifier
{
    /**
     * @var ?string $assetType The asset type of the layer.
     */
    protected ?string $assetType = 'video';

    /**
     * VideoSourceQualifier constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct();

        $this->video($source);
    }

    /**
     * Sets the video source.
     *
     * @param string|SourceValue|null $source The video source.
     *
     * @return $this
     */
    public function video(SourceValue|string|null $source): static
    {
        $this->value->setValue(ClassUtils::verifyInstance($source, SourceValue::class));

        return $this;
    }
}
