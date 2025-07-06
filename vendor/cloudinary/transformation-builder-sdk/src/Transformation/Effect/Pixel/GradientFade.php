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
 * Class GradientFade
 *
 * Applies a gradient fade effect from one edge of the image.
 *
 * Use ->horizontalStartPoint() for x or ->verticalStartPoint() for y to indicate from which edge to fade and how much
 * of the image should be faded. Values of x and y can be specified as a percentage (Range: 0.0 to 1.0), or in pixels
 * (integer values). Positive values fade from the top (y) or left (x). Negative values fade from the bottom (y) or
 * right (x). By default, the gradient is applied to the top 50% of the image (y = 0.5). Only one direction can be
 * specified but the fade can be applied symmetrically using the mode qualifier. To apply different amounts of fade to
 * multiple edges, use chained fade effects.
 *
 * @see ImagePixelEffectTrait::gradientFade()
 *
 * @api
 */
class GradientFade extends StrengthEffectAction
{
    use EffectActionTypeTrait;

    /**
     * Instructs the gradient fade to be applied symmetrically (to opposite edges of the image).
     */
    public const SYMMETRIC = 'symmetric';

    /**
     * Instructs the gradient fade to be applied symmetrically (to opposite edges of the image) including
     * background padding.
     */
    public const SYMMETRIC_PAD = 'symmetric_pad';

    /**
     * GradientFade constructor.
     *
     * @param int|string $strength
     * @param string     $type
     */
    public function __construct($strength = null, $type = null)
    {
        parent::__construct(new GradientFadeQualifier($strength, $type));
    }

    /**
     * Instructs the gradient fade to be applied symmetrically (to opposite edges of the image).
     *
     */
    public static function symmetric(): string
    {
        return self::SYMMETRIC;
    }

    /**
     * Instructs the gradient fade to be applied symmetrically (to opposite edges of the image) including
     * background padding.
     *
     */
    public static function symmetricPad(): string
    {
        return self::SYMMETRIC_PAD;
    }

    /**
     * Sets the horizontal start point (x).
     *
     * @param float|int|string $x The value of the x dimension.
     *
     * @return $this
     */
    public function horizontalStartPoint(float|int|string $x): static
    {
        return $this->setPointValue(ClassUtils::verifyInstance($x, X::class));
    }

    /**
     * Sets the vertical start point (y).
     *
     * @param float|int|string $y The value of the y dimension.
     *
     * @return $this
     */
    public function verticalStartPoint(float|int|string $y): static
    {
        return $this->setPointValue(ClassUtils::verifyInstance($y, Y::class));
    }

    /**
     * Internal setter for the point value.
     *
     *
     *
     * @internal
     */
    protected function setPointValue(mixed $value): static
    {
        if (! isset($this->qualifiers[Point::getName()])) {
            $this->addQualifier(new Point());
        }

        $this->qualifiers[Point::getName()]->setPointValue($value);

        return $this;
    }
}
