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
 * Trait BackgroundTrait
 *
 * @api
 */
trait AutoBackgroundTrait
{
    /**
     * Selects the predominant color while taking only the image border pixels into account.
     *
     */
    public static function border(): AutoBackground
    {
        return new AutoBackground(AutoBackground::BORDER);
    }

    /**
     * Selects the predominant color while taking all pixels in the image into account.
     *
     */
    public static function predominant(): AutoBackground
    {
        return new AutoBackground(AutoBackground::PREDOMINANT);
    }
}
