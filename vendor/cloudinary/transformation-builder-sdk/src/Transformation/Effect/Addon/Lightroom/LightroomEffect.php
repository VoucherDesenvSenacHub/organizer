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
 * Class LightroomEffect
 */
class LightroomEffect extends EffectAction implements LightroomEffectInterface
{
    public const LIGHTROOM = 'lightroom';

    public const SHARPNESS_RANGE            = [0, 150];
    public const SHARPEN_EDGE_MASKING_RANGE = [0, 10];
    public const EXPOSURE_RANGE             = [-5.0, 5.0];
    public const SHARPEN_RADIUS_RANGE       = [0.5, 3.0];

    use LightroomEffectTrait;

    /**
     * Adds Lightroom Filter
     *
     * @param ?string $name  The name of the filter.
     * @param mixed   $value The value of the filter.
     * @param ?array  $range The valid range of the value.
     *
     * @return $this
     */
    protected function addLightroomFilter(?string $name, mixed $value, ?array $range = null): static
    {
        $this->qualifiers[EffectQualifier::getName()]->addLightroomFilter($name, $value, $range);

        return $this;
    }

    /**
     * Lightroom XMP file.
     *
     * @param mixed $source The XMP file source (public ID).
     *
     */
    public function xmp(mixed $source): static
    {
        $this->qualifiers[EffectQualifier::getName()]->xmp($source);

        return $this;
    }
}
