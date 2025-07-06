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

use Cloudinary\Transformation\Expression\ExpressionUtils;
use Cloudinary\Transformation\Qualifier\BaseExpressionQualifier;

/**
 * Class AspectRatio
 */
class AspectRatio extends BaseExpressionQualifier
{
    protected const MAX_VALUES = 2;

    public const AR_1X1 = '1:1';
    public const AR_5X4 = '5:4';
    public const AR_4X3 = '4:3';
    public const AR_3X2  = '3:2';
    public const AR_16X9 = '16:9';
    public const AR_3X1         = '3:1';
    public const IGNORE_INITIAL = "ignore_aspect_ratio";

    /**
     * Aspect ratio 1:1.
     *
     */
    public static function ar1x1(): AspectRatio
    {
        return new self(self::AR_1X1);
    }

    /**
     * Aspect ratio 5:4.
     *
     */
    public static function ar5x4(): AspectRatio
    {
        return new self(self::AR_5X4);
    }

    /**
     * Aspect ratio 4:3.
     *
     */
    public static function ar4x3(): AspectRatio
    {
        return new self(self::AR_4X3);
    }

    /**
     * Aspect ratio 3:2.
     *
     */
    public static function ar3x2(): AspectRatio
    {
        return new self(self::AR_3X2);
    }

    /**
     * Aspect ratio 16:9.
     *
     */
    public static function ar16x9(): AspectRatio
    {
        return new self(self::AR_16X9);
    }

    /**
     * Aspect ratio 3:1.
     *
     */
    public static function ar3x1(): AspectRatio
    {
        return new self(self::AR_3X1);
    }

    /**
     * Set to ignore initial aspect ratio.
     *
     */
    public static function ignoreInitialAspectRatio(): AspectRatio
    {
        return new self(self::IGNORE_INITIAL);
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        if ((string)$this->value === ExpressionUtils::normalize(self::IGNORE_INITIAL)) {
            return "";
        }

        return parent::__toString();
    }

}
