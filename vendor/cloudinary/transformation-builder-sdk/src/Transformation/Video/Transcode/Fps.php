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

use Cloudinary\ArrayUtils;
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Controls the range of acceptable FPS (Frames Per Second) to ensure that video (even when optimized) is delivered with
 * an expected FPS level (helps with sync to audio).
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/video_transformation_reference#video_settings
 * target="_blank">Video settings</a>
 *
 * @property MinMaxRange $value
 *
 * @api
 */
class Fps extends BaseQualifier
{
    protected const VALUE_CLASS = MinMaxRange::class;

    /**
     * @var string $key Serialization key.
     */
    protected static string $key = 'fps';

    /**
     * FPS constructor.
     */
    public function __construct($min = null, mixed $max = null)
    {
        parent::__construct($min, $max);
    }

    /**
     * Sets the minimum frame rate.
     *
     * @param int|float|string|null $min The minimum frame rate in frames per second.
     *
     * @return $this
     */
    public function min(int|float|string|null $min): static
    {
        $this->value->min($min);

        return $this;
    }

    /**
     * Sets the maximum frame rate.
     *
     * @param int|float|string|null $max The maximum frame rate in frames per second.
     *
     * @return $this
     */
    public function max(int|float|string|null $max): static
    {
        $this->value->max($max);

        return $this;
    }

    /**
     * Creates a new instance using provided qualifiers array.
     *
     * @param array|string $qualifiers The qualifiers.
     *
     */
    public static function fromParams(array|string $qualifiers): Fps
    {
        $qualifiers = ArrayUtils::build($qualifiers);

        return new static(...$qualifiers);
    }
}
