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
 * Class ArtisticFilter
 */
class ArtisticFilter extends ValueEffectQualifier
{
    public const AL_DENTE = 'al_dente';
    public const ATHENA   = 'athena';
    public const AUDREY = 'audrey';
    public const AURORA = 'aurora';
    public const DAGUERRE = 'daguerre';
    public const EUCALYPTUS = 'eucalyptus';
    public const FES        = 'fes';
    public const FROST = 'frost';
    public const HAIRSPRAY = 'hairspray';
    public const HOKUSAI   = 'hokusai';
    public const INCOGNITO = 'incognito';
    public const LINEN     = 'linen';
    public const PEACOCK = 'peacock';
    public const PRIMAVERA = 'primavera';
    public const QUARTZ    = 'quartz';
    public const RED_ROCK = 'red_rock';
    public const REFRESH  = 'refresh';
    public const SIZZLE  = 'sizzle';
    public const SONNET = 'sonnet';
    public const UKULELE = 'ukulele';
    public const ZORRO   = 'zorro';

    /**
     * ArtisticFilter constructor.
     *
     * @param string $filter The artistic filter name.
     */
    public function __construct($filter = null)
    {
        parent::__construct(MiscEffect::ARTISTIC_FILTER, $filter);
    }

    /**
     * Artistic Filter alDente.
     *
     */
    public static function alDente(): ArtisticFilter
    {
        return new static(self::AL_DENTE);
    }

    /**
     * Artistic filter athena.
     *
     */
    public static function athena(): ArtisticFilter
    {
        return new static(self::ATHENA);
    }

    /**
     * Artistic filter audrey.
     *
     */
    public static function audrey(): ArtisticFilter
    {
        return new static(self::AUDREY);
    }

    /**
     * Artistic filter aurora.
     *
     */
    public static function aurora(): ArtisticFilter
    {
        return new static(self::AURORA);
    }

    /**
     * Artistic filter daguerre.
     *
     */
    public static function daguerre(): ArtisticFilter
    {
        return new static(self::DAGUERRE);
    }

    /**
     * Artistic filter eucalyptus.
     *
     */
    public static function eucalyptus(): ArtisticFilter
    {
        return new static(self::EUCALYPTUS);
    }

    /**
     * Artistic filter fes.
     *
     */
    public static function fes(): ArtisticFilter
    {
        return new static(self::FES);
    }

    /**
     * Artistic filter frost.
     *
     */
    public static function frost(): ArtisticFilter
    {
        return new static(self::FROST);
    }

    /**
     * Artistic filter hairspray.
     *
     */
    public static function hairspray(): ArtisticFilter
    {
        return new static(self::HAIRSPRAY);
    }

    /**
     * Artistic filter hokusai.
     *
     */
    public static function hokusai(): ArtisticFilter
    {
        return new static(self::HOKUSAI);
    }

    /**
     * Artistic filter incognito.
     *
     */
    public static function incognito(): ArtisticFilter
    {
        return new static(self::INCOGNITO);
    }

    /**
     * Artistic filter linen.
     *
     */
    public static function linen(): ArtisticFilter
    {
        return new static(self::LINEN);
    }

    /**
     * Artistic filter peacock.
     *
     */
    public static function peacock(): ArtisticFilter
    {
        return new static(self::PEACOCK);
    }

    /**
     * Artistic filter primavera.
     *
     */
    public static function primavera(): ArtisticFilter
    {
        return new static(self::PRIMAVERA);
    }

    /**
     * Artistic filter quartz.
     *
     */
    public static function quartz(): ArtisticFilter
    {
        return new static(self::QUARTZ);
    }

    /**
     * Artistic filter redRock.
     *
     */
    public static function redRock(): ArtisticFilter
    {
        return new static(self::RED_ROCK);
    }

    /**
     * Artistic filter refresh.
     *
     */
    public static function refresh(): ArtisticFilter
    {
        return new static(self::REFRESH);
    }

    /**
     * Artistic filter sizzle.
     *
     */
    public static function sizzle(): ArtisticFilter
    {
        return new static(self::SIZZLE);
    }

    /**
     * Artistic filter sonnet.
     *
     */
    public static function sonnet(): ArtisticFilter
    {
        return new static(self::SONNET);
    }

    /**
     * Artistic filter ukulele.
     *
     */
    public static function ukulele(): ArtisticFilter
    {
        return new static(self::UKULELE);
    }

    /**
     * Artistic filter zorro.
     *
     */
    public static function zorro(): ArtisticFilter
    {
        return new static(self::ZORRO);
    }
}
