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
 * Class Position
 *
 * @api
 */
class Position extends BasePosition
{
    use OffsetTrait;
    use PointTrait;
    use CompassGravityBuilderTrait;
    use FocalGravityBuilderTrait;
    use GravityTrait;

    /**
     * Absolute position on the canvas.
     *
     * @param float|int|string|null $x The x coordinate.
     * @param float|int|string|null $y The y coordinate.
     *
     */
    public static function absolute(float|int|string|null $x = null, float|int|string|null $y = null): AbsolutePosition
    {
        return new AbsolutePosition($x, $y);
    }

    /**
     * Named constructor.
     *
     * @param string $direction The compass gravity..
     *
     * @param array  $args      Additional arguments.
     *
     *
     * @internal
     */
    protected static function createWithCompassGravity(string $direction, ...$args): CompassPosition
    {
        return new CompassPosition($direction, ...$args);
    }

    /**
     * Named constructor.
     *
     * @param string $gravity  The focal gravity.
     * @param array  $fallback Fallback gravities.
     *
     *
     * @internal
     */
    protected static function createWithFocalGravity(string $gravity, ...$fallback): FocalPosition
    {
        return new FocalPosition($gravity);
    }

    /**
     *
     * @internal
     *
     */
    public function setOffsetValue($value): static
    {
        if (! isset($this->qualifiers[Offset::getName()])) {
            $this->addQualifier(new Offset());
        }

        $this->qualifiers[Offset::getName()]->addQualifier($value);

        return $this;
    }

    /**
     * Internal setter for the point value.
     *
     *
     *
     * @internal
     */
    public function setPointValue(mixed $value): static
    {
        if (! isset($this->qualifiers[AbsolutePosition::getName()])) {
            $this->addQualifier(self::absolute());
        }

        $this->qualifiers[AbsolutePosition::getName()]->setPointValue($value);

        return $this;
    }
}
