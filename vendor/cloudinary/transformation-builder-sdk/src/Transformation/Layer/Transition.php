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

use Cloudinary\ClassUtils;

/**
 * Defines how to modify a video layer.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/video_layers#video_overlays" target="_blank">
 * Video overlays</a>
 *
 * @api
 */
class Transition extends VideoSource
{
    /**
     * VideoTransitionSource constructor.
     *
     */
    public function __construct($source)
    {
        parent::__construct(ClassUtils::verifyInstance($source, VideoSourceQualifier::class));

        $this->addQualifier(Effect::transition());
    }

    /**
     * Named constructor.
     *
     *
     */
    public static function videoSource($source): Transition
    {
        return new self($source);
    }
}
