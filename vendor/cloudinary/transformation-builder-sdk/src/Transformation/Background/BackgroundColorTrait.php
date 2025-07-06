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
use Cloudinary\Transformation\Argument\ColorValue;

/**
 * Trait BackgroundTrait
 *
 * @api
 */
trait BackgroundColorTrait
{
    /**
     * Sets the color of the background.
     *
     * @param string|Background|ColorValue|null $color The color of the background to set.
     *
     *
     * @see Background
     */
    public function backgroundColor(Background|ColorValue|string|null $color): static
    {
        $this->addQualifier(ClassUtils::verifyInstance($color, Background::class));

        return $this;
    }
}
