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
 * Trait LightroomEffectTrait
 *
 * @api
 */
trait LightroomEffectTrait
{
    /**
     * Lightroom filter contrast.
     *
     *
     */
    public function contrast(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::CONTRAST, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter saturation.
     *
     *
     */
    public function saturation(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::SATURATION, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter vignetteAmount.
     *
     *
     */
    public function vignetteAmount(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::VIGNETTE_AMOUNT, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter vibrance.
     *
     *
     */
    public function vibrance(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::VIBRANCE, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter highlights.
     *
     *
     */
    public function highlights(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::HIGHLIGHTS, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter shadows.
     *
     *
     */
    public function shadows(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::SHADOWS, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter whites.
     *
     *
     */
    public function whites(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::WHITES, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter blacks.
     *
     *
     */
    public function blacks(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::BLACKS, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter clarity.
     *
     *
     */
    public function clarity(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::CLARITY, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter dehaze.
     *
     *
     */
    public function dehaze(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::DEHAZE, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter texture .
     *
     *
     */
    public function texture(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::TEXTURE, $value, EffectRange::DEFAULT_RANGE);
    }

    /**
     * Lightroom filter sharpness.
     *
     *
     */
    public function sharpness(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::SHARPNESS, $value, LightroomEffect::SHARPNESS_RANGE);
    }

    /**
     * Lightroom filter color noise reduction.
     *
     *
     */
    public function colorNoiseReduction(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::COLOR_NOISE_REDUCTION, $value, EffectRange::PERCENT);
    }

    /**
     * Lightroom filter noise reduction.
     *
     *
     */
    public function noiseReduction(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::NOISE_REDUCTION, $value, EffectRange::PERCENT);
    }

    /**
     * Lightroom filter sharpen detail.
     *
     *
     */

    public function sharpenDetail(int $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::SHARPEN_DETAIL, $value, EffectRange::PERCENT);
    }

    /**
     * Lightroom filter sharpen edge masking.
     *
     *
     */
    public function sharpenEdgeMasking(int $value): static
    {
        return $this->addLightroomFilter(
            LightroomEffect::SHARPEN_EDGE_MASKING,
            $value,
            LightroomEffect::SHARPEN_EDGE_MASKING_RANGE
        );
    }

    /**
     * Lightroom filter exposure.
     *
     *
     */
    public function exposure(float $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::EXPOSURE, $value, LightroomEffect::EXPOSURE_RANGE);
    }

    /**
     * Lightroom filter sharpen radius.
     *
     *
     */
    public function sharpenRadius(float $value): static
    {
        return $this->addLightroomFilter(
            LightroomEffect::SHARPEN_RADIUS,
            $value,
            LightroomEffect::SHARPEN_RADIUS_RANGE
        );
    }

    /**
     * Lightroom filter white balance.
     *
     *
     */
    public function whiteBalance(string $value): static
    {
        return $this->addLightroomFilter(LightroomEffect::WHITE_BALANCE, $value);
    }


    /**
     * Generic lightroom filter.
     *
     *
     */
    public function genericFilter(string $name, mixed $value): static
    {
        return $this->addLightroomFilter($name, $value);
    }

    /**
     * Adds Lightroom Filter
     *
     * @param ?string    $name  The name of the filter.
     * @param mixed      $value The value of the filter.
     * @param array|null $range The valid range of the value.
     *
     * @return $this
     */
    abstract public function addLightroomFilter(?string $name, mixed $value, ?array $range = null): static;
}
