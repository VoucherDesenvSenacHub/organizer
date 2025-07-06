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
 * Class Cartoonify
 *
 * @see MiscEffectTrait::cartoonify
 */
class Cartoonify extends LimitedEffectQualifier
{
    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, 'line_strength', 'color_reduction'];

    /**
     * Use for $colorReduction to achieve a black and white cartoon effect.
     */
    public const BLACK_WHITE = 'bw';

    /**
     * Trim constructor.
     *
     * @param float|int|string|null $lineStrength
     * @param float|int|string|null $colorReduction
     * @param array                 $args
     */
    public function __construct(
        float|int|string|null $lineStrength = null,
        float|int|string|null $colorReduction = null,
        ...$args
    ) {
        parent::__construct(MiscEffect::CARTOONIFY, EffectRange::PERCENT, ...$args);

        $this->lineStrength($lineStrength);
        $this->colorReductionLevel($colorReduction);
    }

    /**
     * Sets the thickness of the lines.
     *
     * @param float|int|string|null $lineStrength The thickness of the lines. (Range: 0 to 100, Server default: 50)
     *
     */
    public function lineStrength(float|int|string|null $lineStrength): static
    {
        $this->value->setSimpleValue('line_strength', $lineStrength);

        return $this;
    }

    /**
     * Sets the decrease in the number of colors and corresponding saturation boost of the remaining colors.
     *
     * @param float|int|string|null $colorReduction The decrease in the number of colors and corresponding saturation
     *                                              boost of the remaining colors. (Range: 0 to 100). Higher reduction
     *                                              values result in a less realistic look. Set $colorReduction to
     *                                              Cartoonify::BLACK_WHITE for a black and white cartoon effect.
     *
     */
    public function colorReductionLevel(float|int|string|null $colorReduction): static
    {
        $this->value->setSimpleValue('color_reduction', $colorReduction);

        return $this;
    }

    /**
     * Creates a black and white cartoon effect.
     *
     */
    public function blackWhite(): static
    {
        return $this->colorReductionLevel(self::BLACK_WHITE);
    }
}
