<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Qualifier\Dimensions;

use Cloudinary\ClassUtils;
use Cloudinary\Transformation\AspectRatio;
use Cloudinary\Transformation\Expression\Expression;

/**
 * Trait DimensionsTrait
 *
 * @api
 */
trait DimensionsTrait
{
    /**
     * Sets the width of the asset.
     *
     * @param mixed $width The width in pixels.
     *
     */
    public function width(mixed $width): static
    {
        $this->setDimension(ClassUtils::verifyInstance($width, Width::class));

        return $this;
    }

    /**
     * Sets the height of the asset.
     *
     * @param int|string|Expression $height The height in pixels.
     *
     */
    public function height(mixed $height): static
    {
        $this->setDimension(ClassUtils::verifyInstance($height, Height::class));

        return $this;
    }

    /**
     * Sets the width and height of the asset.
     *
     * @param string $size The size of asset expressed as "width x height".
     *
     * @return $this
     */
    public function size(string $size): static
    {
        [$width, $height] = explode('x', $size);

        $this->width($width)->height($height);

        return $this;
    }

    /**
     * Sets the aspect ratio of the asset.
     *
     * @param float|array|AspectRatio $aspectRatio The new aspect ratio, specified as a percentage or ratio.
     *
     */
    public function aspectRatio(...$aspectRatio): static
    {
        $this->setDimension(ClassUtils::verifyVarArgsInstance($aspectRatio, AspectRatio::class));

        return $this;
    }

    /**
     * Internal setter for the dimensions.
     *
     *
     */
    abstract protected function setDimension(mixed $value): static;
}
