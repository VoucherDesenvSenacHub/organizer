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

use Cloudinary\ArrayUtils;

/**
 * Class MediaOverlay
 *
 * @package Cloudinary\Transformation
 */
class MediaOverlay extends ImageOverlay
{
    /**
     * @var Timeline $timeline The timeline position of the overlay.
     */
    protected Timeline $timeline;

    /**
     * Sets the timeline position of the overlay.
     *
     * @param Timeline|null $timeline The timeline position of the overlay.
     *
     */
    public function timeline(?Timeline $timeline = null): static
    {
        $this->timeline = $timeline;

        return $this;
    }

    protected function getSubActionQualifiers(): array
    {
        $subActionQualifiers = parent::getSubActionQualifiers();

        $subActionQualifiers['additional'] = ArrayUtils::mergeNonEmpty(
            $subActionQualifiers['additional'],
            !empty($this->timeline) ? $this->timeline->getStringQualifiers(): []
        );

        return $subActionQualifiers;
    }
}
