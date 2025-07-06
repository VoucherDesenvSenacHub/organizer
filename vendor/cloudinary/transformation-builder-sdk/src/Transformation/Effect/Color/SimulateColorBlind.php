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
 * Class SimulateColorBlind
 */
class SimulateColorBlind extends ValueEffectQualifier
{
    /**
     * Color blind condition: deuteranopia (Server default).
     */
    public const DEUTERANOPIA = 'deuteranopia';

    /**
     * Color blind condition: protanopia.
     */
    public const PROTANOPIA = 'protanopia';

    /**
     * Color blind condition: tritanopia.
     */
    public const TRITANOPIA = 'tritanopia';

    /**
     * Color blind condition: tritanomaly.
     */
    public const TRITANOMALY = 'tritanomaly';

    /**
     * Color blind condition: deuteranomaly.
     */
    public const DEUTERANOMALY = 'deuteranomaly';

    /**
     * Color blind condition: cone_monochromacy.
     */
    public const CONE_MONOCHROMACY = 'cone_monochromacy';

    /**
     * Color blind condition: rod_monochromacy.
     */
    public const ROD_MONOCHROMACY = 'rod_monochromacy';

    /**
     * SimulateColorBlind constructor.
     *
     * @param string $condition
     */
    public function __construct($condition = null)
    {
        parent::__construct(ColorEffect::SIMULATE_COLOR_BLIND);

        $this->condition($condition);
    }

    /**
     * Sets the color blind condition.
     *
     * @param string $condition The color blind condition to simulate
     *
     */
    public function condition(string $condition): static
    {
        $this->setEffectValue($condition);

        return $this;
    }

    /**
     * Color blind condition: deuteranopia (Server default).
     *
     */
    public static function deuteranopia(): string
    {
        return self::DEUTERANOPIA;
    }

    /**
     * Color blind condition: protanopia.
     *
     */
    public static function protanopia(): string
    {
        return self::PROTANOPIA;
    }

    /**
     * Color blind condition: tritanopia
     *
     */
    public static function tritanopia(): string
    {
        return self::TRITANOPIA;
    }

    /**
     * Color blind condition: tritanomaly
     *
     */
    public static function tritanomaly(): string
    {
        return self::TRITANOMALY;
    }

    /**
     * Color blind condition: deuteranomaly
     *
     */
    public static function deuteranomaly(): string
    {
        return self::DEUTERANOMALY;
    }

    /**
     * Color blind condition: cone monochromacy
     *
     */
    public static function coneMonochromacy(): string
    {
        return self::CONE_MONOCHROMACY;
    }

    /**
     * Color blind condition: rod monochromacy
     *
     */
    public static function rodMonochromacy(): string
    {
        return self::ROD_MONOCHROMACY;
    }
}
