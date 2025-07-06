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
 * Class ShapeEffect
 */
class ReshapeQualifier extends EffectQualifier
{
    public const DISTORT = 'distort';
    public const DISTORT_ARC = 'distort:arc';
    public const TRIM        = 'trim';
    public const SHEAR = 'shear';
}
