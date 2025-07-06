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
 * Trait AudioQualifierTrait
 *
 * @api
 */
trait AudioQualifierTrait
{
    /**
     * Sets the audio codec or removes the audio channel.
     *
     * @param string $audioCodec The audio codec or "none".  Use the constants defined in the AudioCodec class.
     *
     *
     * @see AudioCodec
     */
    public static function audioCodec(string $audioCodec): AudioCodec
    {
        return new AudioCodec($audioCodec);
    }

    /**
     * Sets the audio sample frequency.
     *
     * @param string $audioFrequency The audio frequency.  Use the constants defined in the AudioFrequency class.
     *
     *
     * @see AudioFrequency
     */
    public static function audioFrequency(string $audioFrequency): AudioFrequency
    {
        return new AudioFrequency($audioFrequency);
    }
}
