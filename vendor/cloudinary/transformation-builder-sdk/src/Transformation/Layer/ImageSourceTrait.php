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

use Cloudinary\ClassUtils;

/**
 * Trait ImageSourceTrait
 *
 * @api
 */
trait ImageSourceTrait
{
    /**
     * Adds another image layer.
     *
     * @param string $publicId The public ID of the new image layer.
     *
     */
    public static function image(string $publicId): ImageSource|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($publicId, ImageSource::class));
    }

    /**
     * Adds another image layer.
     *
     * @param string|null $fetchUrl The URL of the asset to fetch.
     *
     */
    public static function fetch(?string $fetchUrl): FetchImageSource|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($fetchUrl, FetchImageSource::class));
    }

    /**
     * Applies a look-up table (LUT) file to the image.
     *
     * @param string $lutId The public ID of the LUT file.
     *
     */
    public static function lut(string $lutId): LutLayer|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($lutId, LutLayer::class));
    }

    /**
     * Adds a text layer.
     *
     * @param string|null $text  The text to display.
     * @param string|null $style The text style.
     * @param string|null $color The text color.
     *
     *
     * @see TextSource
     */
    public static function text(?string $text = null, ?string $style = null, ?string $color = null): TextSource|static
    {
        return static::createWithSource(new TextSource($text, $style, $color));
    }

    /**
     * Named constructor.
     *
     * @param string|BaseSource $source The layer source.
     *
     */
    protected static function createWithSource(BaseSource|string $source): BaseSource|string|static
    {
        return $source;
    }
}
