<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument\Text;

use Cloudinary\Transformation\BorderQualifier;

/**
 * Class Stroke
 */
class Stroke
{
    /**
     * Do not include an outline stroke. (Server default)
     */
    public const NONE = 'none';
    /**
     * Include an outline stroke.
     */
    public const STROKE = 'stroke';

    /**
     * Do not include an outline stroke. (Server default)
     *
     */
    public static function none(): string
    {
        return self::NONE;
    }

    /**
     * Include an outline stroke.
     *
     */
    public static function stroke(): string
    {
        return self::STROKE;
    }

    /**
     * Include an outline stroke.
     *
     */
    public static function solid($width, $color): BorderQualifier
    {
        return (new BorderQualifier())->style('solid')->width($width)->color($color);
    }
}
