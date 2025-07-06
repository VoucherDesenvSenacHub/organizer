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
 * Trait CornersTrait
 *
 * @api
 */
trait CornersTrait
{
    /**
     * Sets top-left corner radius
     *
     * @param int $radius Radius length in pixels
     *
     */
    public function topLeft(int $radius): static
    {
        $this->setSimpleValue('topLeft', $radius);

        return $this;
    }

    /**
     * Sets top-right corner radius.
     *
     * @param int|null $radius Radius length in pixels
     *
     */
    public function topRight(?int $radius): static
    {
        $this->setSimpleValue('topRight', $radius);

        return $this;
    }

    /**
     * Sets bottom-right corner radius.
     *
     * @param int|null $radius Radius length in pixels
     *
     */
    public function bottomRight(?int $radius): static
    {
        $this->setSimpleValue('bottomRight', $radius);

        return $this;
    }

    /**
     * Sets bottom-left corner radius.
     *
     * @param int|null $radius Radius length in pixels
     *
     */
    public function bottomLeft(?int $radius): static
    {
        $this->setSimpleValue('bottomLeft', $radius);

        return $this;
    }

    /**
     * Sets radius for all corners.
     *
     * @param int $radius Radius length in pixels
     *
     */
    public function setRadius(int $radius): static
    {
        $this->topLeft($radius);
        $this->topRight(null);
        $this->bottomRight(null);
        $this->bottomLeft(null);

        return $this;
    }

    /**
     * Sets radius separately for (top-left, bottom-right) and (top-right, bottom-left) corners.
     *
     * @param int $topLeftBottomRight Radius for top-left and bottom-right corners
     * @param int $topRightBottomLeft Radius for top-right and bottom-left corners
     *
     */
    public function setSymmetricRadius(int $topLeftBottomRight, int $topRightBottomLeft): static
    {
        $this->topLeft($topLeftBottomRight);
        $this->topRight($topRightBottomLeft);
        $this->bottomRight(null);
        $this->bottomLeft(null);

        return $this;
    }

    /**
     * Sets radius separately for top-left, (top-right, bottom-left) and bottom-right corners.
     *
     * @param int $topLeft            Radius for top-left corner
     * @param int $topRightBottomLeft Radius for top-right and bottom-left corners
     * @param int $bottomRight        Radius for bottom-right corner
     *
     */
    public function setPartiallySymmetricRadius(int $topLeft, int $topRightBottomLeft, int $bottomRight): static
    {
        $this->topLeft($topLeft);
        $this->topRight($topRightBottomLeft);
        $this->bottomRight($bottomRight);
        $this->bottomLeft(null);

        return $this;
    }
}
