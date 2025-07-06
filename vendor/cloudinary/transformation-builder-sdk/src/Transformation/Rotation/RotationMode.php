<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

use Cloudinary\Transformation\QualifierMultiValue;
use Cloudinary\Transformation\RotationModeInterface;

/**
 * Defines how to rotate an image.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#rotating_images" target="_blank">
 * Rotate an image</a>
 *
 * @api
 */
class RotationMode extends QualifierMultiValue implements RotationModeInterface
{
    protected const VALUE_DELIMITER = '.';

    use RotationModeTrait;

    public const AUTO_RIGHT = 'auto_right';
    public const AUTO_LEFT  = 'auto_left';
    public const VERTICAL_FLIP = 'vflip';
    public const HORIZONTAL_FLIP = 'hflip';
    public const IGNORE          = 'ignore';

    /**
     * Creates the instance.
     *
     * @param string|RotationMode|array $mode Given mode.
     *
     *
     * @internal
     */
    public static function createWithMode(...$mode): static
    {
        return new static(...$mode);
    }
}
