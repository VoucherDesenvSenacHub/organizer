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
 * Interface OutdoorObjectGravityInterface
 *
 * @api
 */
interface OutdoorObjectGravityInterface
{
    //Outdoor Category
    public const OUTDOOR = 'outdoor';
    public const TRAFFIC_LIGHT = 'traffic_light';
    public const STOP_SIGN     = 'stopsign';
    public const PARKING_METER = 'parkingmeter';
    public const FIRE_HYDRANT  = 'firehydrant';
    public const BENCH        = 'bench';
}
