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
 * Interface VideoFlagInterface
 */
interface VideoFlagInterface
{
    public const STREAMING_ATTACHMENT = 'streaming_attachment';
    public const HLSV3                = 'hlsv3';
    public const KEEP_DAR      = 'keep_dar';
    public const NO_STREAM = 'no_stream';
    public const MONO      = 'mono';
    public const TRUNCATE_TS = 'truncate_ts';
    public const WAVEFORM    = 'waveform';
}
