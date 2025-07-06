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
 * Defines the gravity value based on directional values from a compass.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/resizing_and_cropping#control_gravity" target="_blank">
 * Control gravity for images</a> |
 * <a href="https://cloudinary.com/documentation/video_resizing_and_cropping#control_gravity" target="_blank">
 * Control gravity for videos</a>
 *
 * @api
 */
class Compass extends QualifierMultiValue
{
    use CompassGravityBuilderTrait;

    public const NORTH_WEST = 'north_west';
    public const NORTH      = 'north';
    public const NORTH_EAST = 'north_east';
    public const WEST       = 'west';
    public const CENTER = 'center';
    public const EAST   = 'east';
    public const SOUTH_WEST = 'south_west';
    public const SOUTH      = 'south';
    public const SOUTH_EAST = 'south_east';
    public const XY_CENTER  = 'xy_center';

    /**
     * Compass constructor.
     *
     * @param string $direction
     */
    public function __construct($direction = null)
    {
        parent::__construct();

        $this->direction($direction);
    }

    /**
     * Sets the compass gravity direction.
     *
     * @param ?string $direction The gravity direction. Use the constants defined in this class.
     *
     */
    protected function direction(?string $direction): static
    {
        $this->setSimpleValue('direction', $direction);

        return $this;
    }
}
