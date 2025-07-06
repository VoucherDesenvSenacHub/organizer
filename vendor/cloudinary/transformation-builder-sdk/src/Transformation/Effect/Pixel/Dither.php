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
 * Class Dither
 */
class Dither extends LimitedEffectQualifier
{
    public const THRESHOLD_1X1_NON_DITHER = 0;
    public const CHECKERBOARD_2X1_DITHER  = 1;
    public const ORDERED_2X2_DISPERSED   = 2;
    public const ORDERED_3X3_DISPERSED = 3;
    public const ORDERED_4X4_DISPERSED = 4;
    public const ORDERED_8X8_DISPERSED = 5;
    public const HALFTONE_4X4_ANGLED   = 6;
    public const HALFTONE_6X6_ANGLED = 7;
    public const HALFTONE_8X8_ANGLED = 8;
    public const HALFTONE_4X4_ORTHOGONAL = 9;
    public const HALFTONE_6X6_ORTHOGONAL = 10;
    public const HALFTONE_8X8_ORTHOGONAL = 11;
    public const HALFTONE_16X16_ORTHOGONAL = 12;
    public const CIRCLES_5X5_BLACK         = 13;
    public const CIRCLES_5X5_WHITE  = 14;
    public const CIRCLES_6X6_BLACK = 15;
    public const CIRCLES_6X6_WHITE = 16;
    public const CIRCLES_7X7_BLACK = 17;
    public const CIRCLES_7X7_WHITE = 18;

    /**
     * Dither constructor.
     *
     */
    public function __construct($type)
    {
        parent::__construct(PixelEffect::ORDERED_DITHER, EffectRange::ORDERED_DITHER);

        $this->type($type);
    }

    /**
     * Sets the type of the dither.
     *
     * @param int|null $type The type.
     *
     */
    public function type(?int $type): Dither
    {
        return $this->setEffectValue($type);
    }

    /**
     * Dither type threshold 1x1 non dither.
     *
     */
    public static function threshold1x1NonDither(): int
    {
        return self::THRESHOLD_1X1_NON_DITHER;
    }

    /**
     * Dither type checkerboard 2x1 dither.
     *
     */
    public static function checkerboard2x1Dither(): int
    {
        return self::CHECKERBOARD_2X1_DITHER;
    }

    /**
     * Dither type ordered 2x2 dispersed.
     *
     */
    public static function ordered2x2Dispersed(): int
    {
        return self::ORDERED_2X2_DISPERSED;
    }

    /**
     * Dither type ordered 3x3 dispersed.
     *
     */
    public static function ordered3x3Dispersed(): int
    {
        return self::ORDERED_3X3_DISPERSED;
    }

    /**
     * Dither type ordered 4x4 dispersed.
     *
     */
    public static function ordered4x4Dispersed(): int
    {
        return self::ORDERED_4X4_DISPERSED;
    }

    /**
     * Dither type ordered 8x8 dispersed.
     *
     */
    public static function ordered8x8Dispersed(): int
    {
        return self::ORDERED_8X8_DISPERSED;
    }

    /**
     * Dither type ordered 8x8 dispersed.
     *
     */
    public static function halftone4x4Angled(): int
    {
        return self::HALFTONE_4X4_ANGLED;
    }

    /**
     * Dither type halftone 6x6 angled.
     *
     */
    public static function halftone6x6Angled(): int
    {
        return self::HALFTONE_6X6_ANGLED;
    }

    /**
     * Dither type halftone 8x8 angled.
     *
     */
    public static function halftone8x8Angled(): int
    {
        return self::HALFTONE_8X8_ANGLED;
    }

    /**
     * Dither type halftone 4x4 orthogonal.
     *
     */
    public static function halftone4x4Orthogonal(): int
    {
        return self::HALFTONE_4X4_ORTHOGONAL;
    }

    /**
     * Dither type halftone 6x6 orthogonal.
     *
     */
    public static function halftone6x6Orthogonal(): int
    {
        return self::HALFTONE_6X6_ORTHOGONAL;
    }

    /**
     * Dither type halftone 8x8 orthogonal.
     *
     */
    public static function halftone8x8Orthogonal(): int
    {
        return self::HALFTONE_8X8_ORTHOGONAL;
    }

    /**
     * Dither type halftone 16x16 orthogonal.
     *
     */
    public static function halftone16x16Orthogonal(): int
    {
        return self::HALFTONE_16X16_ORTHOGONAL;
    }

    /**
     * Dither type circles 5x5 black.
     *
     */
    public static function circles5x5Black(): int
    {
        return self::CIRCLES_5X5_BLACK;
    }

    /**
     * Dither type circles 5x5 white.
     *
     */
    public static function circles5x5White(): int
    {
        return self::CIRCLES_5X5_WHITE;
    }

    /**
     * Dither type circles 6x6 black.
     *
     */
    public static function circles6x6Black(): int
    {
        return self::CIRCLES_6X6_BLACK;
    }

    /**
     * Dither type circles 6x6 white.
     *
     */
    public static function circles6x6White(): int
    {
        return self::CIRCLES_6X6_WHITE;
    }

    /**
     * Dither type circles 7x7 black.
     *
     */
    public static function circles7x7Black(): int
    {
        return self::CIRCLES_7X7_BLACK;
    }

    /**
     * Dither type circles 7x7 white.
     *
     */
    public static function circles7x7White(): int
    {
        return self::CIRCLES_7X7_WHITE;
    }
}
