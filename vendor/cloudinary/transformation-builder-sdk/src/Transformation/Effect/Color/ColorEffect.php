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
 * Class Effect
 */
abstract class ColorEffect
{
    // Image effects
    public const BLACKWHITE = 'blackwhite';
    public const COLORIZE   = 'colorize';
    public const GRAYSCALE = 'grayscale';
    public const NEGATE    = 'negate';
    public const SEPIA  = 'sepia';
    // Accessibility
    public const ASSIST_COLOR_BLIND = 'assist_colorblind';
    public const SIMULATE_COLOR_BLIND = 'simulate_colorblind';

    use ImageColorEffectTrait;
}
