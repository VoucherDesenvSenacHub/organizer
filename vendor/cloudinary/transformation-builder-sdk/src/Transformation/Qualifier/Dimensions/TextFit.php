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
use Cloudinary\Transformation\Expression\Expression;
use Cloudinary\Transformation\Qualifier\Dimensions\Height;
use Cloudinary\Transformation\Qualifier\Dimensions\Width;

/**
 * Class TextFit
 */
class TextFit extends BaseAction
{
    /**
     * TextFit constructor.
     *
     * @param int|string|Expression      $width  The width in pixels.
     * @param int|string|Expression|null $height The height in pixels.
     */
    public function __construct($width, Expression|int|string|null $height = null)
    {
        parent::__construct(CropMode::fit());

        $this->width($width);
        $this->height($height);
    }

    /**
     * TextFit named constructor.
     *
     * @param int|string|Expression      $width  The width in pixels.
     * @param int|string|Expression|null $height The height in pixels.
     *
     * @return $this
     */
    public static function size(Expression|int|string $width, Expression|int|string|null $height = null): TextFit|static
    {
        return new TextFit($width, $height);
    }

    /**
     * Sets the width of the text.
     *
     * @param int|string|Expression $width The width in pixels.
     *
     */
    public function width(Expression|int|string $width): static
    {
        $this->setDimension(ClassUtils::verifyInstance($width, Width::class));

        return $this;
    }

    /**
     * Sets the height of the text.
     *
     * @param int|string|Expression $height The height in pixels.
     *
     */
    public function height(Expression|int|string $height): static
    {
        $this->setDimension(ClassUtils::verifyInstance($height, Height::class));

        return $this;
    }

    /**
     * Internal setter for the dimensions.
     *
     * @param mixed|null $value The dimension.
     *
     *
     * @internal
     */
    protected function setDimension(mixed $value = null): static
    {
        $this->addQualifier($value);

        return $this;
    }
}
