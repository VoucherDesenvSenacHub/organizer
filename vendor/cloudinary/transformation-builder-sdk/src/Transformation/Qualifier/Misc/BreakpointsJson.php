<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Qualifier\Misc;

use Cloudinary\Transformation\Qualifier\BaseQualifier;
use Cloudinary\TransformationUtils;

/**
 * Class BreakpointsJson
 *
 * An alias for w_auto:breakpoints:json qualifier
 *
 * @api
 */
class BreakpointsJson extends BaseQualifier
{
    public const DEFAULT_BYTES_STEP = 20000;
    public const DEFAULT_MIN_WIDTH  = 375;
    public const DEFAULT_MAX_WIDTH  = 3840;
    public const DEFAULT_MAX_IMAGES = 5;
    /**
     * @var string $name The name of the qualifier. Actually width qualifier is used for this purpose.
     */
    protected static string $name = 'width';

    /**
     * @var string $name The key of the qualifier.
     */
    protected static string $key = 'w';

    /**
     * @var int The minimum width needed for this image. Default: 50.
     */
    protected int $minWidth;

    /**
     * @var int The maximum width needed for this image. If specifying a width bigger than the original image,
     * the width of the original image is used instead. Default: 1000.
     */
    protected int $maxWidth;

    /**
     * @var int The minimum number of bytes between two consecutive breakpoints (images). Default: 20000.
     */
    protected int $bytesStep;

    /**
     * @var int The maximum number of breakpoints to find, between 3 and 200. This means that there might be size
     * differences bigger than the given bytes_step value between consecutive images. Default: 20.
     */
    protected int $maxImages;

    /**
     * BreakpointsJson qualifier constructor.
     *
     * @param int|null $minWidth  The minimum width needed for this image. Default: 50.
     * @param int|null $maxWidth  The maximum width needed for this image. If specifying a width bigger than the
     *                            original image, the width of the original image is used instead. Default: 1000.
     * @param int|null $bytesStep The minimum number of bytes between two consecutive breakpoints (images). Default:
     *                            20000.
     * @param int|null $maxImages The maximum number of breakpoints to find, between 3 and 200. This means that there
     *                            might be size differences bigger than the given bytes_step value between consecutive
     *                            images. Default: 20.
     *
     */
    public function __construct(
        ?int $minWidth = null,
        ?int $maxWidth = null,
        ?int $bytesStep = null,
        ?int $maxImages = null
    ) {
        parent::__construct();

        $this->minWidth($minWidth);
        $this->maxWidth($maxWidth);
        $this->bytesStep($bytesStep);
        $this->maxImages($maxImages);
    }

    /**
     * Sets the minimum width.
     *
     * @param ?int $minWidth The minimum width needed for this image. Default: 50.
     *
     */
    public function minWidth(?int $minWidth): static
    {
        $this->minWidth = $minWidth ?: self::DEFAULT_MIN_WIDTH;

        return $this;
    }

    /**
     * Sets the maximum width.
     *
     * @param ?int $maxWidth The maximum width needed for this image. If specifying a width bigger than the original
     *                       image, the width of the original image is used instead. Default: 1000.
     *
     */
    public function maxWidth(?int $maxWidth): static
    {
        $this->maxWidth = $maxWidth ?: self::DEFAULT_MAX_WIDTH;

        return $this;
    }

    /**
     * Sets the size step (in bytes).
     *
     * @param ?int $bytesStep The minimum number of bytes between two consecutive breakpoints (images). Default: 20000.
     *
     */
    public function bytesStep(?int $bytesStep): static
    {
        $this->bytesStep = $bytesStep ?: self::DEFAULT_BYTES_STEP;

        return $this;
    }

    /**
     * Sets the maximum amount of breakpoints.
     *
     * @param ?int $maxImages The maximum number of breakpoints to find, between 3 and 200. This means that there might
     *                        be size differences bigger than the given bytes_step value between consecutive images.
     *                        Default: 20.
     *
     */
    public function maxImages(?int $maxImages): static
    {
        $this->maxImages = $maxImages ?: self::DEFAULT_MAX_IMAGES;

        return $this;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return self::getKey() . '_auto:breakpoints_' . "{$this->minWidth}_{$this->maxWidth}_" .
               TransformationUtils::bytesToKB($this->bytesStep) . "_{$this->maxImages}:json";
    }

    /**
     * Serializes to json.
     *
     * @return array[]
     */
    public function jsonSerialize(): array
    {
        // TODO: finalize serialization
        return [
            self::$name =>
                [
                    'auto' =>
                        [
                            'breakpoints' =>
                                [
                                    'min_width'  => $this->minWidth,
                                    'max_width'  => $this->maxWidth,
                                    'bytes_step' => $this->bytesStep,
                                    'max_images' => $this->maxImages,

                                ],
                        ],
                ],
        ];
    }
}
