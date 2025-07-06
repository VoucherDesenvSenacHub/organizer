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
 * Class FillPad
 *
 * @internal
 */
class FillPad extends Fill
{
    use FillPadTrait;
    use OffsetTrait;
    use BackgroundTrait;

    /**
     * FillPad constructor.
     */
    public function __construct(
        string|CropMode $cropMode,
        mixed $width = null,
        mixed $height = null,
        mixed $gravity = null,
        Background|ColorValue|string|null $background = null
    ) {
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
            throw new InvalidArgumentException('FillPad only supports Auto Gravity');
        }

        $this->addQualifier($autoGravity);

        return $this;
    }

    /**
     * @internal
     *
     *
     */
    public function setOffsetValue($value): static
    {
        if (! isset($this->qualifiers[Offset::getName()])) {
            $this->addQualifier(new Offset());
        }

        $this->qualifiers[Offset::getName()]->addQualifier($value);

        return $this;
    }
}
