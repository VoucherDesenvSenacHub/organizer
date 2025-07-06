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

use Cloudinary\Transformation\Argument\ColorValue;
use Cloudinary\Transformation\Expression\Expression;

/**
 * Class BasePad
 */
class Pad extends BaseResizeAction
{
    use PadTrait;

    /**
     * Pad constructor.
     *
     * @param int|null|string|Expression   $width
     * @param int|null|string|Expression   $height
     */
    public function __construct(
        $cropMode,
        $width = null,
        $height = null,
        Background|ColorValue|string|null $background = null
    ) {
        parent::__construct($cropMode, $width, $height);

        $this->background($background);
    }
}
