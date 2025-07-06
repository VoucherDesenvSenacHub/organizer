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
 * Determines the video codec to use.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_manipulation_and_delivery#video_codec_settings" target="_blank">
 * Video codec settings</a>
 *
 * @api
 */
class VideoCodec extends BaseQualifier
{
    use VideoCodecTrait;

    public const AUTO = 'auto';
    public const VP9  = 'vp9';
    public const VP8 = 'vp8';
    public const PRO_RES = 'prores'; // Apple ProRes 422 HQ
    public const H264    = 'h264';
    public const H265    = 'h265';
    public const THEORA  = 'theora';

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = ['codec', 'profile', 'level'];

    /**
     * VideoCodec constructor.
     *
     * @param string $codec The video codec.
     */
    public function __construct($codec)
    {
        parent::__construct();

        $this->codec($codec);
    }

    /**
     * Sets the codec.
     *
     * @param string $codec The codec name.
     *
     * @return $this
     */
    public function codec(string $codec): static
    {
        $this->value->setSimpleValue('codec', $codec);

        return $this;
    }

    /**
     * Sets codec profile.
     *
     * @param string|null $profile The profile. Use the constants defined in the VideoCodecProfile class.
     *
     * @return $this
     *
     * @see VideoCodecProfile
     */
    public function profile(?string $profile): static
    {
        $this->value->setSimpleValue('profile', $profile);

        return $this;
    }

    /**
     * Sets codec level.
     *
     * @param string|null $level The codec level. Use the constants defined in the VideoCodecLevel class.
     *
     *
     * @return $this
     *
     * @see VideoCodecLevel
     */
    public function level(?string $level): static
    {
        $this->value->setSimpleValue('level', $level);

        return $this;
    }

    /**
     * Creates a new VideoCodec instance from an array of qualifiers.
     *
     * @param array|string $qualifiers The video codec qualifiers.
     *
     */
    public static function fromParams(array|string $qualifiers): VideoCodec
    {
        if (is_array($qualifiers)) {
            $codec   = ArrayUtils::get($qualifiers, 'codec');
            $profile = ArrayUtils::get($qualifiers, 'profile');
            $level   = ArrayUtils::get($qualifiers, 'level');
        } else {
            $codec   = $qualifiers;
            $profile = $level = null;
        }

        return (new static($codec))->profile($profile)->level($level);
    }
}
