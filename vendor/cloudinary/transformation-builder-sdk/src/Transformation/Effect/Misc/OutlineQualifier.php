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
 * Class OutlineQualifier
 *
 */
class OutlineQualifier extends EffectQualifier
{
    protected array $valueOrder = [0, 'mode', 'width', 'blur_level'];

    public function __construct(...$values)
    {
        parent::__construct(MiscEffect::OUTLINE, $values);
    }

    /**
     * Sets the outline mode.
     *
     * @param ?string $mode The outline mode.
     *
     */
    public function mode(?string $mode): static
    {
        $this->value->setSimpleValue('mode', $mode);

        return $this;
    }
    /**
     * Sets the outline width.
     *
     * @param int|string|null $width The width in pixels.
     *
     */
    public function width(int|string|null $width): static
    {
        $this->value->setSimpleValue('width', $width);

        return $this;
    }

    /**
     * Sets the outline blur level.
     *
     * @param int|string|null $blurLevel The level of blur.
     *
     */
    public function blurLevel(int|string|null $blurLevel): static
    {
        $this->value->setSimpleValue('blur_level', $blurLevel);

        return $this;
    }
}
