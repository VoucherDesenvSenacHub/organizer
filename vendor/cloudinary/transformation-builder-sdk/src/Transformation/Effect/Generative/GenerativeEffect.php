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
 * Class GenerativeEffect
 */
abstract class GenerativeEffect
{
    public const GENERATIVE_RECOLOR = 'gen_recolor';
    public const GENERATIVE_REMOVE  = 'gen_remove';
    public const GENERATIVE_REPLACE = 'gen_replace';
    public const GENERATIVE_RESTORE = 'gen_restore';
    public const UPSCALE            = 'upscale';
    public const ENHANCE     = 'enhance';

    use GenerativeEffectTrait;
}
