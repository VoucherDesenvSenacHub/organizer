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
use Cloudinary\Transformation\Argument\LimitedGenericNamedArgument;

/**
 * Class LightroomEffectQualifier
 *
 * This class is used for Adobe Photoshop Lightroom add-on.
 *
 * @internal
 */
class LightroomEffectQualifier extends ValueEffectQualifier
{
    use LightroomEffectTrait;

    /**
     * LightroomEffectQualifier constructor.
     */
    public function __construct()
    {
        parent::__construct(LightroomEffect::LIGHTROOM);
    }

    /**
     * Adds Lightroom Filter
     *
     * @param ?string    $name  The name of the filter.
     * @param mixed      $value The value of the filter.
     * @param array|null $range The valid range of the value.
     *
     * @return $this
     */
    public function addLightroomFilter(?string $name, mixed $value, ?array $range = null): static
    {
        return $this->add(new LimitedGenericNamedArgument($name, $value, $range));
    }

    /**
     * Lightroom XMP file.
     *
     * @param XmpSourceValue|string|null $source The XMP file source (public ID).
     *
     */
    public function xmp(XmpSourceValue|string|null $source): static
    {
        return $this->setEffectValue(ClassUtils::verifyInstance($source, XmpSourceValue::class));
    }
}
