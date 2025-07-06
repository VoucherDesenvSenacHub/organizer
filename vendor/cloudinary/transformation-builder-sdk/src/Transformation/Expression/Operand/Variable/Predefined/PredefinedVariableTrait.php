<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

/**
 * Trait PredefinedVariableTrait
 *
 * @api
 */
trait PredefinedVariableTrait
{
    /**
     * Predefined variable width.
     *
     */
    public static function width(): static
    {
        return static::pVar(static::WIDTH);
    }

    /**
     * Predefined variable initialWidth.
     *
     */
    public static function initialWidth(): static
    {
        return static::pVar(static::INITIAL_WIDTH);
    }

    /**
     * Predefined variable height.
     *
     */
    public static function height(): static
    {
        return static::pVar(static::HEIGHT);
    }

    /**
     * Predefined variable initialHeight.
     *
     */
    public static function initialHeight(): static
    {
        return static::pVar(static::INITIAL_HEIGHT);
    }

    /**
     * Predefined variable aspectRatio.
     *
     */
    public static function aspectRatio(): static
    {
        return static::pVar(static::ASPECT_RATIO);
    }

    /**
     * Predefined variable initialAspectRatio.
     *
     */
    public static function initialAspectRatio(): static
    {
        return static::pVar(static::INITIAL_ASPECT_RATIO);
    }

    /**
     * Predefined variable trimmedAspectRatio.
     *
     */
    public static function trimmedAspectRatio(): static
    {
        return static::pVar(static::TRIMMED_ASPECT_RATIO);
    }

    /**
     * Predefined variable pageCount.
     *
     */
    public static function pageCount(): static
    {
        return static::pVar(static::PAGE_COUNT);
    }

    /**
     * Predefined variable duration.
     *
     */
    public static function duration(): static
    {
        return static::pVar(static::DURATION);
    }

    /**
     * Predefined variable initialDuration.
     *
     */
    public static function initialDuration(): static
    {
        return static::pVar(static::INITIAL_DURATION);
    }

    /**
     * Predefined variable faceCount.
     *
     */
    public static function faceCount(): static
    {
        return static::pVar(static::FACE_COUNT);
    }

    /**
     * Predefined variable illustrationScore.
     *
     */
    public static function illustrationScore(): static
    {
        return static::pVar(static::ILLUSTRATION_SCORE);
    }

    /**
     * Predefined variable currentPage.
     *
     */
    public static function currentPage(): static
    {
        return static::pVar(static::CURRENT_PAGE);
    }

    /**
     * Predefined variable pageX.
     *
     */
    public static function pageX(): static
    {
        return static::pVar(static::PAGE_X);
    }

    /**
     * Predefined variable pageY.
     *
     */
    public static function pageY(): static
    {
        return static::pVar(static::PAGE_Y);
    }

    /**
     * Predefined variable tags.
     *
     */
    public static function tags(): static
    {
        return static::pVar(static::TAGS);
    }

    /**
     * Predefined variable context.
     *
     */
    public static function context(): static
    {
        return static::pVar(static::CONTEXT);
    }
}
