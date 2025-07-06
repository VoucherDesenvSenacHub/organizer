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
 * Trait QualityTrait
 *
 * @api
 */
trait QualityTrait
{
    /**
     * Sets the quality level.
     *
     * @param int|string $level The quality value. (Range 1 to 100)
     *
     */
    public static function level(int|string $level): static
    {
        return static::createQuality($level);
    }

    /**
     * Quality auto.
     *
     *
     */
    public static function auto($preset = null): static
    {
        return static::createQuality(QualityQualifier::AUTO, $preset);
    }

    /**
     * Quality good.
     *
     */
    public static function autoGood(): static
    {
        return static::auto(QualityQualifier::GOOD);
    }

    /**
     * Quality best.
     *
     */
    public static function autoBest(): static
    {
        return static::auto(QualityQualifier::BEST);
    }

    /**
     * Quality eco.
     *
     */
    public static function autoEco(): static
    {
        return static::auto(QualityQualifier::ECO);
    }

    /**
     * Quality low.
     *
     */
    public static function autoLow(): static
    {
        return static::auto(QualityQualifier::LOW);
    }

    /**
     * Quality jpegmini.
     *
     * @param int|null $level The quality level. Use the constants defined in the JpegMini class.
     *
     *
     * @see JpegMini
     */
    public static function jpegmini(?int $level = null): static
    {
        return static::createQuality(QualityQualifier::JPEG_MINI, $level);
    }

    /**
     * Quality jpegminiBest.
     *
     * Alias for jpegmini(JpegMini::BEST)
     *
     *
     * @see JpegMini
     */
    public static function jpegminiBest(): static
    {
        return static::jpegmini(JpegMini::BEST);
    }
    /**
     * Quality jpegminiHigh.
     *
     * Alias for jpegmini(JpegMini::HIGH)
     *
     *
     * @see JpegMini
     */
    public static function jpegminiHigh(): static
    {
        return static::jpegmini(JpegMini::HIGH);
    }

    /**
     * Quality jpegminiMedium.
     *
     * Alias for jpegmini(JpegMini::MEDIUM)
     *
     *
     * @see JpegMini
     */
    public static function jpegminiMedium(): static
    {
        return static::jpegmini(JpegMini::MEDIUM);
    }

    /**
     * Creates a new instance.
     *
     * @param array $values
     *
     *
     * @internal
     */
    protected static function createQuality($level, ...$values): static
    {
        return new static($level, ...$values);
    }
}
