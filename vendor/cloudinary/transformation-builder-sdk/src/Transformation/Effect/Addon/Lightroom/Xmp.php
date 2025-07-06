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
 * Class Xmp
 */
abstract class Xmp
{
    /**
     * Created a new instance of the XmpSource class.
     *
     * @param mixed $source The public id of the XMP file.
     *
     */
    public static function source(mixed $source): XmpSourceValue
    {
        return new XmpSourceValue($source);
    }
}
