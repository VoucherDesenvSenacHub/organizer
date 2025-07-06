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
 * Class Shadow
 */
class Shadow extends StrengthEffectAction
{
    public const SHADOW = 'shadow';

    use ColorTrait;
    use OffsetTrait;

    /**
     * Shadow constructor.
     *
     * @param int|null              $strength
     * @param float|int|string|null $offsetX
     * @param float|int|string|null $offsetY
     * @param string|null           $color
     */
    public function __construct(
        ?int $strength = null,
        float|int|string|null $offsetX = null,
        float|int|string|null $offsetY = null,
        ?string $color = null
    ) {
        parent::__construct(new StrengthEffectQualifier(self::SHADOW, EffectRange::PERCENT));
        $this->strength($strength);
        $this->offset($offsetX, $offsetY);
        $this->color($color);
    }

    /**
     *
     * @internal
     *
     */
    public function setOffsetValue($value): static
    {
        $this->addQualifier($value);

        return $this;
    }
}
