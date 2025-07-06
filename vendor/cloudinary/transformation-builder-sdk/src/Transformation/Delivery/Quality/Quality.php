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
 * Controls the quality of the delivered image or video.
 *
 * **Learn more**:
 * <a href=https://cloudinary.com/documentation/image_optimization#how_to_optimize_image_quality
 * target="_blank">Image quality</a> |
 * <a href=https://cloudinary.com/documentation/video_optimization#how_to_optimize_video_quality
 * target="_blank">Video quality</a>
 *
 * @api
 */
class Quality extends BaseAction
{
    use QualityTrait;
    use QualityBuilderTrait;

    /**
     * Quality constructor.
     *
     */
    public function __construct(mixed $level, ...$values)
    {
        parent::__construct(new QualityQualifier($level, ...$values));
    }

    /**
     * When used together with automatic quality (q_auto):
     * allow switching to PNG8 encoding if the quality algorithm decides that it's more efficient.
     *
     *
     * @see Flag::anyFormat
     */
    public function anyFormat(): Quality
    {
        return $this->setFlag(Flag::anyFormat());
    }

    /**
     * Named Quality constructor.
     *
     * @param mixed $level  The quality level.
     * @param array $values Additional arguments.
     *
     */
    protected static function createQuality(mixed $level, ...$values): Quality
    {
        return new self($level, ...$values);
    }

    /**
     * Sets simple value.
     *
     * @return $this
     *
     * @internal
     */
    protected function setSimpleValue(string $name, mixed $value = null): static
    {
        $this->qualifiers[QualityQualifier::getName()]->setSimpleValue($name, $value);

        return $this;
    }

    /**
     * Sets the simple named value of the quality qualifier.
     *
     * @param string $name  The named argument name.
     * @param mixed  $value The value.
     *
     * @return $this
     *
     * @internal
     */
    protected function setSimpleNamedValue(string $name, mixed $value = null): static
    {
        $this->qualifiers[QualityQualifier::getName()]->setSimpleNamedValue($name, $value);

        return $this;
    }
}
