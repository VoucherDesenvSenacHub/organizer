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
 * Class TextAlignment
 */
class TextAlignment
{
    /**
     * Align text to the left.
     */
    public const LEFT = 'left';

    /**
     * Align text to the center.
     */
    public const CENTER = 'center';

    /**
     * Align text to the right.
     */
    public const RIGHT = 'right';

    /**
     * Align text to the right in a left-to-right language.
     * Align text to the left in a right-to-left language.
     */
    public const END = 'end';

    /**
     * Align text to the left in a left-to-right language.
     * Align text to the right in a right-to-left language.
     */
    public const START = 'start';

    /**
     * Space out words such that the first word on the line is along the left edge and the last word is along the
     * right edge.
     */
    public const JUSTIFY = 'justify';

    /**
     * Align text to the left.
     *
     */
    public static function left(): string
    {
        return self::LEFT;
    }

    /**
     * Align text to the center.
     *
     */
    public static function center(): string
    {
        return self::CENTER;
    }

    /**
     * Align text to the right.
     *
     */
    public static function right(): string
    {
        return self::RIGHT;
    }

    /**
     * Align text to the right in a left-to-right language.
     * Align text to the left in a right-to-left language.
     *
     */
    public static function end(): string
    {
        return self::END;
    }

    /**
     * Align text to the left in a left-to-right language.
     * Align text to the right in a right-to-left language.
     *
     */
    public static function start(): string
    {
        return self::START;
    }

    /**
     * Space out words such that the first word on the line is along the left edge and the last word is along the
     * right edge.
     *
     */
    public static function justify(): string
    {
        return self::JUSTIFY;
    }
}
