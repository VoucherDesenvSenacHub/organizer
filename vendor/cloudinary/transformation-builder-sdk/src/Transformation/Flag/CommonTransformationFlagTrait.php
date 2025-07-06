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
 * Trait TransformationFlagTrait
 *
 * @api
 */
trait CommonTransformationFlagTrait
{
    /**
     * Delivers the image as an attachment.
     *
     * @param string $filename The attachment's filename
     *
     *
     * @see Flag::attachment
     */
    public function attachment($filename = null): static
    {
        return $this->addAction(Flag::attachment($filename));
    }

    /**
     * Adds ICC color space metadata to the image, even when the original image doesn't contain any ICC data.
     *
     *
     * @see Flag::forceIcc
     */
    public function forceIcc(): static
    {
        return $this->addAction(Flag::forceIcc());
    }

    /**
     * Instructs Cloudinary to clear all image meta-data (IPTC, Exif and XMP) while applying an incoming transformation.
     *
     *
     * @see Flag::forceStrip
     */
    public function forceStrip(): static
    {
        return $this->addAction(Flag::forceStrip());
    }

    /**
     * Returns metadata of the input asset and of the transformed output asset in JSON instead of the transformed image.
     *
     *
     * @see Flag::getInfo
     */
    public function getInfo(): static
    {
        return $this->addAction(Flag::getInfo());
    }

    /**
     * Sets the cache-control to immutable for the asset.
     *
     *
     * @see Flag::immutableCache
     */
    public function immutableCache(): static
    {
        return $this->addAction(Flag::immutableCache());
    }

    /**
     * Keeps the copyright related fields when stripping meta-data.
     *
     *
     * @see Flag::keepAttribution
     */
    public function keepAttribution(): static
    {
        return $this->addAction(Flag::keepAttribution());
    }

    /**
     * Keeps all meta-data.
     *
     *
     * @see Flag::keepIptc
     */
    public function keepIptc(): static
    {
        return $this->addAction(Flag::keepIptc());
    }

    /**
     * Instructs Cloudinary to clear all ICC color profile data included with the image.
     *
     * @see Flag::stripProfile
     */
    public function stripProfile(): static
    {
        return $this->addAction(Flag::stripProfile());
    }
}
