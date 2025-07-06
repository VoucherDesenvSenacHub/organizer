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
 * Class ChromaSubSampling
 */
class ChromaSubSampling
{
    public const CHROMA_444 = '444';
    public const CHROMA_422 = '422';
    public const CHROMA_421 = '421';
    public const CHROMA_411 = '411';
    public const CHROMA_420 = '420';
    public const CHROMA_410 = '410';
    public const CHROMA_311 = '311';

    /**
     * Chroma subsampling 4:4:4.
     *
     */
    public static function chroma444(): string
    {
        return self::CHROMA_444;
    }

    /**
     * Chroma subsampling 4:2:2.
     *
     */
    public static function chroma422(): string
    {
        return self::CHROMA_422;
    }

    /**
     * Chroma subsampling 4:2:1.
     *
     */
    public static function chroma421(): string
    {
        return self::CHROMA_421;
    }

    /**
     * Chroma subsampling 4:1:1.
     *
     */
    public static function chroma411(): string
    {
        return self::CHROMA_411;
    }

    /**
     * Chroma subsampling 4:2:0.
     *
     */
    public static function chroma420(): string
    {
        return self::CHROMA_420;
    }

    /**
     * Chroma subsampling 4:1:0.
     *
     */
    public static function chroma410(): string
    {
        return self::CHROMA_410;
    }

    /**
     * Chroma subsampling 3:1:1.
     *
     */
    public static function chroma311(): string
    {
        return self::CHROMA_311;
    }
}
