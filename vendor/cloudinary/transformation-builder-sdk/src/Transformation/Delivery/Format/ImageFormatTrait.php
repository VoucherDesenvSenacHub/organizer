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
 * Trait ImageFormatTrait
 *
 * @api
 */
trait ImageFormatTrait
{
    /**
     * Image format jpg.
     *
     */
    public static function jpg(): static
    {
        return static::createFormat(Format::JPG);
    }

    /**
     * Image format jpc.
     *
     */
    public static function jpc(): static
    {
        return static::createFormat(Format::JPC);
    }

    /**
     * Image format jp2.
     *
     */
    public static function jp2(): static
    {
        return static::createFormat(Format::JP2);
    }

    /**
     * Image format wdp.
     *
     */
    public static function wdp(): static
    {
        return static::createFormat(Format::WDP);
    }

    /**
     * Image format png.
     *
     */
    public static function png(): static
    {
        return static::createFormat(Format::PNG);
    }

    /**
     * Image format gif.
     *
     */
    public static function gif(): static
    {
        return static::createFormat(Format::GIF);
    }

    /**
     * Image format webp.
     *
     */
    public static function webp(): static
    {
        return static::createFormat(Format::WEBP);
    }

    /**
     * Image format bmp.
     *
     */
    public static function bmp(): static
    {
        return static::createFormat(Format::BMP);
    }

    /**
     * Image format tiff.
     *
     */
    public static function tiff(): static
    {
        return static::createFormat(Format::TIFF);
    }

    /**
     * Image format ico.
     *
     */
    public static function ico(): static
    {
        return static::createFormat(Format::ICO);
    }

    /**
     * Image format pdf.
     *
     */
    public static function pdf(): static
    {
        return static::createFormat(Format::PDF);
    }

    /**
     * Image format eps.
     *
     */
    public static function eps(): static
    {
        return static::createFormat(Format::EPS);
    }

    /**
     * Image format psd.
     *
     */
    public static function psd(): static
    {
        return static::createFormat(Format::PSD);
    }

    /**
     * Image format svg.
     *
     */
    public static function svg(): static
    {
        return static::createFormat(Format::SVG);
    }

    /**
     * Image format ai.
     *
     */
    public static function ai(): static
    {
        return static::createFormat(Format::AI);
    }

    /**
     * Image format djvu.
     *
     */
    public static function djvu(): static
    {
        return static::createFormat(Format::DJVU);
    }

    /**
     * Image format avif.
     *
     */
    public static function avif(): static
    {
        return static::createFormat(Format::AVIF);
    }

    /**
     * Image format flif.
     *
     */
    public static function flif(): static
    {
        return static::createFormat(Format::FLIF);
    }

    /**
     * Image format glb.
     *
     */
    public static function glb(): static
    {
        return static::createFormat(Format::GLB);
    }

    /**
     * Image format usdz.
     *
     */
    public static function usdz(): static
    {
        return static::createFormat(Format::USDZ);
    }
}
