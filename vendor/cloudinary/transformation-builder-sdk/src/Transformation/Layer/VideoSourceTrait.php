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

use Cloudinary\ClassUtils;

/**
 * Trait VideoSourceTrait
 *
 * @api
 */
trait VideoSourceTrait
{
    /**
     * Adds another video layer.
     *
     * @param string|null $videoId The public ID of the new video layer.
     *
     */
    public static function video(?string $videoId = null): VideoSource|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($videoId, VideoSource::class));
    }

    /**
     * Adds another video layer from a remote URL.
     *
     * @param string|null $fetchUrl The URL of the asset to fetch.
     *
     */
    public static function fetchVideo(?string $fetchUrl): FetchVideoSource|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($fetchUrl, FetchVideoSource::class));
    }

    /**
     * Adds subtitles to a video.
     *
     * @param string|null $subtitlesId The public ID of the subtitles file.
     *
     */
    public static function subtitles(?string $subtitlesId = null): SubtitlesSource|static
    {
        return static::createWithSource(ClassUtils::verifyInstance($subtitlesId, SubtitlesSource::class));
    }
}
