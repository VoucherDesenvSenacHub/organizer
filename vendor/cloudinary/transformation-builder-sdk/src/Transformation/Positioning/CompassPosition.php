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
 * Class CompassPosition
 */
class CompassPosition extends BasePosition
{
    use CompassPositionTrait;

    /**
     * CompassPosition constructor.
     *
     * @param mixed                 $gravity The gravity.
     * @param float|int|string|null $x       Offset x.
     * @param float|int|string|null $y       Offset y.
     */
    public function __construct(
        mixed $gravity = null,
        float|int|string|null $x = null,
        float|int|string|null $y = null
    ) {
        parent::__construct();

        $this->gravity($gravity);
        $this->offset($x, $y);
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
