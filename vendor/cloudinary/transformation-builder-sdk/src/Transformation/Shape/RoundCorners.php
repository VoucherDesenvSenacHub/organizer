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
 * Round one or more corners of an image or video.
 *
 * **Learn more**:
 * <a href=https://cloudinary.com/documentation/effects_and_artistic_enhancements#rounding_corners_and_creating_circular_images
 * target="_blank">Rounded images</a> |
 * <a href=
 * https://cloudinary.com/documentation/video_effects_and_enhancements#rounding
 * target="_blank">Rounded videos</a>
 *
 * @api
 */
class RoundCorners extends BaseAction
{
    use CornerRadiusTrait;
    use CornersTrait;

    /**
     * RoundCorners constructor.
     *
     */
    public function __construct(...$qualifiers)
    {
        parent::__construct(ClassUtils::verifyVarArgsInstance($qualifiers, CornerRadius::class));
    }

    /**
     * Sets the corner radius.
     *
     * @param int|array|CornerRadius $radius The corner(s) radius.
     *
     */
    public function setRadius(int|array|CornerRadius $radius): static
    {
        return $this->addQualifier(ClassUtils::verifyVarArgsInstance($radius, CornerRadius::class));
    }

    /**
     * Sets a simple unnamed value specified by name (for uniqueness) and the actual value.
     *
     * @param string     $name  The name of the argument.
     * @param mixed|null $value The value of the argument.
     *
     * @return $this
     *
     * @internal
     */
    public function setSimpleValue(string $name, mixed $value = null): static
    {
        $this->qualifiers[CornerRadius::getName()]->setSimpleValue($name, $value);

        return $this;
    }

    /**
     * Internal named constructor.
     *
     * @param int|string|array|mixed $radius The corner(s) radius.
     *
     *
     * @internal
     */
    protected static function createWithRadius(...$radius): static
    {
        return new static(CornerRadius::byRadius(...$radius));
    }
}
