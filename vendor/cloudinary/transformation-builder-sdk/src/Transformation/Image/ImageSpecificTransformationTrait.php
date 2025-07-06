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
use Cloudinary\ClassUtils;
use Cloudinary\Transformation\Argument\ColorValue;

/**
 * Trait ImageSpecificTransformationTrait
 *
 * @api
 */
trait ImageSpecificTransformationTrait
{
    use ImageTransformationFlagTrait;
    use ImageQualifierTransformationTrait;
    use LayeredImageTransformationTrait;

    /**
     * Adds an overlay over the base image.
     *
     * @param string|BaseSource|BasePositionalSourceContainer $layer     The public ID of the image to overlay.
     * @param BasePosition|null                               $position  The position of the overlay with respect to
     *                                                                   the base image.
     * @param string|null                                     $blendMode The blend mode. Use the constants defined in
     *                                                                   the BlendMode class.
     *
     *
     * @see ImageOverlay
     * @see BlendMode
     */
    public function overlay(
        string|BaseSource|BasePositionalSourceContainer $layer,
        ?BasePosition $position = null,
        ?string $blendMode = null
    ): static {
        return $this->addAction(
            ClassUtils::verifyInstance(
                $layer,
                BasePositionalSourceContainer::class,
                ImageOverlay::class,
                $position,
                $blendMode
            )
        );
    }

    /**
     * Adds an underlay under the base image.
     *
     * @param BaseSourceContainer|BaseSource|string|null $layer     The public ID of the image to underlay.
     * @param BasePosition|null                          $position  The position of the underlay with respect to the
     *                                                              base image.
     * @param string|null                                $blendMode The blend mode. Use the constants defined in the
     *                                                              BlendMode
     *                                                              class.
     *
     *
     * @see OverlayOverlay
     * @see BlendMode
     */
    public function underlay(
        BaseSourceContainer|BaseSource|string|null $layer,
        BasePosition|null $position = null,
        ?string $blendMode = null
    ): static {
        $underlay = ClassUtils::forceInstance($layer, ImageOverlay::class, null, $position, $blendMode);
        $underlay->setStackPosition(LayerStackPosition::UNDERLAY);

        return $this->addAction($underlay);
    }

    /**
     * Changes the shape of the image.
     *
     * @param ReshapeQualifier|EffectAction|EffectQualifier|mixed $reshape The reshape to apply.
     *
     */
    public function reshape(mixed $reshape): static
    {
        return $this->addAction($reshape);
    }

    /**
     * Rounds the specified corners of an image.
     *
     * Only $radiusOrTopLeft specified: All four corners are rounded equally according to the value.<br>
     * Only $radiusOrTopLeft and $topRight specified: Round the top-left & bottom-right corners according
     * to $radiusOrTopLeft, round the top-right & bottom-left corners according to $topRight.<br>
     * Only $radiusOrTopLeft, $topRight and $bottomRight specified: Round the top-left corner according
     * to $radiusOrTopLeft, round the top-right & bottom-left corners according to $topRight, round the bottom-right
     * corner according to $bottomRight.<br>
     * All qualifiers specified: Each corner is rounded accordingly.
     *
     * @param int|string|CornerRadius|RoundCorners $radiusOrTopLeft The radius in pixels of the top left corner or all
     *                                                              the corners if no other corners are specified.
     * @param int|null                             $topRight        The radius in pixels of the top right corner.
     * @param int|null                             $bottomRight     The radius in pixels of the bottom right corner.
     * @param int|null                             $bottomLeft      The radius in pixels of the bottom left corner.
     *
     *
     * @see RoundCorners
     */
    public function roundCorners(
        int|string|CornerRadius|RoundCorners $radiusOrTopLeft,
        ?int $topRight = null,
        ?int $bottomRight = null,
        ?int $bottomLeft = null
    ): static {
        $qualifiers = ArrayUtils::safeFilter([$radiusOrTopLeft, $topRight, $bottomRight, $bottomLeft]);

        $roundCorners = ClassUtils::verifyVarArgsInstance($qualifiers, RoundCorners::class);

        return $this->addAction($roundCorners);
    }

    /**
     * Adds a border around the image.
     *
     * @param Border $border A Border object in which you set the width, style and color of the border.
     *                       See the Border class.
     *
     *
     * @see Border
     */
    public function border(Border $border): static
    {
        return $this->addAction($border);
    }

    /**
     * Sets the color of the background.
     *
     * @param string|Background|ColorValue $color The color of the background to set.
     *
     *
     * @see Background
     */
    public function backgroundColor(Background|ColorValue|string $color): static
    {
        return $this->addAction(ClassUtils::verifyInstance($color, Background::class));
    }

    /**
     * Sets the image background.
     *
     * @param string|Background $background The background to set.
     *
     *
     * @see Background
     */
    public function background(Background|string $background): static
    {
        return $this->addAction(ClassUtils::verifyInstance($background, Background::class));
    }

    /**
     * Controls the color space used for the delivered image.
     *
     * @param string|ColorSpace $colorSpace Use the constants defined in the ColorSpace class.
     *
     *
     * @see ColorSpace
     */
    public function colorSpace(string|ColorSpace $colorSpace): static
    {
        return $this->addAction(ClassUtils::verifyInstance($colorSpace, ColorSpace::class));
    }

    /**
     * Prevents style class names collisions for sprite generation.
     *
     * @param string $prefix The style class name prefix.
     *
     *
     */
    public function prefix(string $prefix): static
    {
        return $this->addAction(ClassUtils::verifyInstance($prefix, Prefix::class));
    }

    /**
     * Applies animated image transformation action.
     *
     * @param AnimatedEdit $animated Animated image action.
     *
     */
    public function animated(AnimatedEdit $animated): static
    {
        return $this->addAction(ClassUtils::verifyInstance($animated, AnimatedEdit::class));
    }
}
