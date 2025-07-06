<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

use Cloudinary\Transformation\BaseComponent;

/**
 * Class PointValue
 */
class PointValue extends BaseComponent
{
    /**
     * @var int|string $x The x dimension of the point.
     */
    protected string|int $x;

    /**
     * @var int|string $y The y dimension of the point.
     */
    protected string|int $y;

    /**
     * PointValue constructor.
     *
     * @param int|null $x
     * @param int|null $y
     */
    public function __construct(?int $x = null, ?int $y = null)
    {
        parent::__construct();

        $this->x($x)->y($y);
    }

    /**
     * Sets the x dimension of the point.
     *
     * @param ?int $x The value of the x dimension.
     *
     */
    public function x(?int $x): static
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Sets the y dimension of the point.
     *
     * @param ?int $y The value of the y dimension.
     *
     */
    public function y(?int $y): static
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return "{$this->x}:{$this->y}";
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }
}
