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
use InvalidArgumentException;

/**
 * Class CropPad
 *
 * @internal
 */
class CropPad extends Crop
{
    use CropPadTrait;
    use BackgroundTrait;

    /**
     * CropPad constructor.
     *
     * @param string|CropMode              $cropMode
     * @param int|string|Expression        $width
     * @param int|string|Expression        $height
     * @param mixed                        $gravity
     * @param string|Background|ColorValue $background
     */
    public function __construct($cropMode, $width = null, $height = null, mixed $gravity = null, $background = null)
    {
        if ($gravity === null) {
            $gravity = Gravity::auto();
        }

        parent::__construct($cropMode, $width, $height, $gravity);

        $this->background($background);
    }

    /**
     * Sets the gravity to use when using the FILL_PAD crop mode.
     *
     *
     * @return $this
     */
    public function gravity(mixed $autoGravity): static
    {
        if (! $autoGravity instanceof AutoGravity) {
            throw new InvalidArgumentException('CropPad only supports Auto Gravity');
        }

        $this->addQualifier($autoGravity);

        return $this;
    }
}
