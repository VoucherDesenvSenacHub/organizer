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
 * Trait PageNumberTrait
 *
 * @api
 */
trait PageNumberTrait
{
    /**
     * Gets the page using the specified number.
     *
     * @param int|string|null $number The number.
     *
     */
    public function byNumber(int|string|null $number): static
    {
        $this->add($number);

        return $this;
    }
}
