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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Defines the video bitrate in bits per second.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/video_optimization#bitrate_control" target="_blank">
 * Bitrate control</a>
 *
 * @api
 */
class BitRate extends BaseQualifier
{
    protected const CONSTANT = 'constant';

    /**
     * BitRate constructor.
     *
     * @param int|string|null $bitRate The bitrate to set.
     * @param string|null     $type    The type of bitrate.
     */
    public function __construct(int|string|null $bitRate, ?string $type = null)
    {
        parent::__construct();

        $this->bitRate($bitRate)->type($type);
    }

    /**
     * Sets the bitrate.
     *
     * @param int|string|null $bitRate  The bitrate in bits per second. The value supports "k" and "m "for kilobits
     *                             and megabits respectively.
     *
     * @return $this
     */
    public function bitRate(int|string|null $bitRate): static
    {
        $this->value->setSimpleValue('bit_rate', $bitRate);

        return $this;
    }

    /**
     * The type of bitrate.
     *
     * @param ?string $bitRateType  The type of bitrate. If "constant" is specified, the video plays with a constant
     *                             bitrate (CBR).
     *
     * @return $this
     */
    public function type(?string $bitRateType): static
    {
        $this->value->setSimpleValue('bit_rate_type', $bitRateType);

        return $this;
    }

    /**
     * Sets bitrate type to constant
     *
     * @return $this
     */
    public function constant(): static
    {
        $this->type(self::CONSTANT);

        return $this;
    }
}
