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

use Cloudinary\Transformation\Argument\PointValue;

/**
 * Class DistortArc
 */
class Distort extends EffectQualifier
{
    /**
     * DistortArc constructor.
     *
     * @param mixed ...$args Additional arguments
     */
    public function __construct(
        int|array|string|PointValue|null $topLeft = null,
        int|array|string|PointValue|null $topRight = null,
        int|array|string|PointValue|null $bottomRight = null,
        int|array|string|PointValue|null $bottomLeft = null,
        ...$args
    ) {
        parent::__construct(ReshapeQualifier::DISTORT);

        $this->add($topLeft, $topRight, $bottomRight, $bottomLeft, ...$args);
    }
}
