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
 * Class AudioSourceQualifier
 */
class AudioSourceQualifier extends BaseSourceQualifier
{
    /**
     * @var string $sourceType The type of the layer.
     */
    protected string $sourceType = 'audio';

    /**
     * AudioSourceQualifier constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct();

        $this->audio($source);
    }

    /**
     * Sets the audio source.
     *
     * @param string|SourceValue|null $source The audio source.
     *
     * @return $this
     */
    public function audio(SourceValue|string|null $source): static
    {
        $this->value->setValue(ClassUtils::verifyInstance($source, SourceValue::class));

        return $this;
    }
}
