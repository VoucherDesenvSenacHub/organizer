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
 * Class Offset
 */
class Offset extends BaseAction
{
    use OffsetTrait;

    /**
     * Offset constructor.
     *
     * @param float|int|string|null $x
     * @param float|int|string|null $y
     */
    public function __construct(float|int|string|null $x = null, float|int|string|null $y = null)
    {
        parent::__construct();

        $this->offset($x, $y);
    }

    /**
     * @internal
     *
     *
     */
    public function setOffsetValue($value): static
    {
        return $this->addQualifier($value);
    }
}
