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
 * Defines how to improve an image by automatically adjusting image colors, contrast and brightness.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/effects_and_artistic_enhancements#improve target="_blank">
 * Image improvement effects</a>
 *
 * @api
 */
class Improve extends BlendEffectQualifier
{
    use EffectModeTrait;

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, 'mode', 'value'];

    /**
     * Improve constructor.
     */
    public function __construct(?int $blend = null, ?string $mode = null)
    {
        parent::__construct(Adjust::IMPROVE, EffectRange::PERCENT, $blend);

        $this->mode($mode);
    }

    /**
     * Sets the improve effect to INDOOR mode.
     *
     * Use this mode to get better results on images with indoor lighting and shadows.
     *
     * @param int|null $blend How much to blend the improved result with the original image, where 0 means only use the
     *                   original and 100 means only use the improved result.
     *
     */
    public static function indoor(?int $blend = null): Improve
    {
        return new static($blend, ImproveMode::INDOOR);
    }

    /**
     * Sets the `improve` effect to OUTDOOR mode.
     *
     * @param int|null $blend How much to blend the improved result with the original image, where 0 means only use the
     *                   original and 100 means only use the improved result.
     *
     */
    public static function outdoor(?int $blend = null): Improve
    {
        return new static($blend, ImproveMode::OUTDOOR);
    }
}
