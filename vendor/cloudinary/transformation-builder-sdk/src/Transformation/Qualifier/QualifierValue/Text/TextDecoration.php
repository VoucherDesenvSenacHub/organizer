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
 * Class TextDecoration
 */
class TextDecoration
{
    public const UNDERLINE = 'underline';
    public const STRIKETHROUGH = 'strikethrough';

    /**
     * Text decoration underline.
     *
     */
    public static function underline(): string
    {
        return self::UNDERLINE;
    }

    /**
     * Text decoration strikethrough.
     *
     */
    public static function strikethrough(): string
    {
        return self::STRIKETHROUGH;
    }
}
