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

/**
 * Class FontStyle
 */
class FontStyle
{
    public const NORMAL = 'normal';
    public const ITALIC = 'italic';

    /**
     * Font style normal.
     *
     */
    public static function normal(): string
    {
        return self::NORMAL;
    }

    /**
     * Font style italic.
     *
     */
    public static function italic(): string
    {
        return self::ITALIC;
    }
}
