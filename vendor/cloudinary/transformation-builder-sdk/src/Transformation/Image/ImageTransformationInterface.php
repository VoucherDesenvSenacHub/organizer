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
 * Interface ImageTransformationInterface
 */
interface ImageTransformationInterface extends CommonTransformationInterface
{
    /**
     * Applies a filter or an effect on an image.
     *
     * @param EffectAction|EffectQualifier $effect The effect to apply.
     *
     *
     * @see EffectAction
     * @see EffectQualifier
     */
    public function effect(EffectQualifier|EffectAction $effect): static;

    /**
     * Adds an overlay over the base image.
     *
     * @param string                         $layer     The public ID of the image to overlay.
     * @param AbsolutePosition|Position|null $position  The position of the overlay with respect to the base image.
     * @param string|null                    $blendMode The blend mode. Use the constants defined in the BlendMode
     *                                                  class.
     *
     *
     * @see ImageOverlay
     * @see BlendMode
     */
    public function overlay(
        string $layer,
        Position|AbsolutePosition|null $position = null,
        ?string $blendMode = null
    ): static;

    /**
     * Adds an underlay under the base image.
     *
     * @param string                         $layer     The public ID of the image to underlay.
     * @param AbsolutePosition|Position|null $position  The position of the underlay with respect to the base image.
     * @param string|null                    $blendMode The blend mode. Use the constants defined in the BlendMode
     *                                                  class.
     *
     *
     * @see OverlayOverlay
     * @see BlendMode
     */
    public function underlay(
        string $layer,
        Position|AbsolutePosition|null $position = null,
        ?string $blendMode = null
    ): static;

    /**
     * Adds a border around the image.
     *
     * @param Border $border A Border object in which you set the width, style and color of the border.
     *                       See the Border class.
     *
     *
     * @see Border
     */
    public function border(Border $border): static;
}
