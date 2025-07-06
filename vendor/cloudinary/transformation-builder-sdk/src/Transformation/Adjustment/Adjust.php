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
 * Adjusts the visual appearance of an image or video.
 *
 * @api
 */
abstract class Adjust
{
    // Common adjustments
    public const BRIGHTNESS = 'brightness';
    public const CONTRAST   = 'contrast';
    public const SATURATION = 'saturation';
    public const GAMMA      = 'gamma';

    // Image adjustments
    public const RED = 'red';
    public const GREEN = 'green';
    public const BLUE  = 'blue';
    public const BRIGHTNESS_HSB = 'brightness_hsb';
    public const HUE            = 'hue';
    public const TINT    = 'tint';
    public const REPLACE_COLOR = 'replace_color';
    public const RECOLOR       = 'recolor';

    public const AUTO_BRIGHTNESS = 'auto_brightness';
    public const AUTO_COLOR      = 'auto_color';
    public const AUTO_CONTRAST = 'auto_contrast';
    public const FILL_LIGHT    = 'fill_light';
    public const IMPROVE    = 'improve';
    public const VIBRANCE = 'vibrance';
    public const VIESUS_CORRECT = 'viesus_correct';

    public const SHARPEN = 'sharpen';
    public const UNSHARP_MASK = 'unsharp_mask';

    public const OPACITY_THRESHOLD = 'opacity_threshold';

    use CommonAdjustmentTrait;
    use ImageAdjustmentTrait;
}
