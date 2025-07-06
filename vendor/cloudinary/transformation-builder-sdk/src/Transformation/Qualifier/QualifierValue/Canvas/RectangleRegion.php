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
 * Class RectangleRegion
 */
class RectangleRegion extends FullListExpressionQualifierMultiValue
{
    /**
     * RectangleRegion constructor.
     *
     * @param int $x      X.
     * @param int $y      Y.
     * @param int $width  Width.
     * @param int $height Height.
     */
    public function __construct($x, int $y, int $width, int $height)
    {
        parent::__construct();

        parent::setSimpleNamedValue('x', $x);
        parent::setSimpleNamedValue('y', $y);
        parent::setSimpleNamedValue('w', $width);
        parent::setSimpleNamedValue('h', $height);
        #parent::setArgumentOrder(['x', 'y', 'w', 'h']);
    }
}
