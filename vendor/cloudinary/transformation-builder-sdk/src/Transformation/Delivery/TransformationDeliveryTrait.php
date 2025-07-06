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
use Cloudinary\Transformation\Qualifier\Dimensions\Dpr;

/**
 * Trait TransformationDeliveryTrait
 *
 * Here we add the most common 'aliases' for building transformation at the top level
 *
 * @api
 */
trait TransformationDeliveryTrait
{
    /**
     * Applies delivery action.
     *
     * @param mixed $delivery The delivery action to apply.
     *
     */
    public function delivery($delivery): static
    {
        return $this->addAction($delivery);
    }

    /**
     * Forces format conversion to the given format.
     *
     * (Formerly known as fetch format)
     *
     *
     */
    public function format(Format|string|null $format): static
    {
        return $this->addAction(ClassUtils::verifyInstance($format, Format::class));
    }

    /**
     * Controls compression quality. 1 is the lowest quality and 100 is the
     * highest.
     *
     * Reducing the quality is a trade-off between visual quality and file size.
     *
     *
     */
    public function quality(Quality|int|float|string|null $quality): static
    {
        return $this->addAction(ClassUtils::verifyInstance($quality, Quality::class));
    }

    /**
     * Deliver the image in the specified device pixel ratio.
     *
     * @param float|string $dpr Any positive float value.
     *
     */
    public function dpr($dpr): static
    {
        return $this->addAction(ClassUtils::verifyInstance($dpr, Dpr::class));
    }

}
