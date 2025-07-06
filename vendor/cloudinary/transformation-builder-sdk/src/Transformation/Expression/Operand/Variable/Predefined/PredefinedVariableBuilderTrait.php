<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

/**
 * Trait PredefinedVariableBuilderTrait
 *
 * @api
 */
trait PredefinedVariableBuilderTrait
{
    /**
     * The asset's current width.
     *
     */
    public function width(): Expression
    {
        return $this->setRightOperand(PVar::WIDTH);
    }

    /**
     * The asset's initial width.
     *
     */
    public function initialWidth(): Expression
    {
        return $this->setRightOperand(PVar::INITIAL_WIDTH);
    }

    /**
     * The asset's current height.
     *
     */
    public function height(): Expression
    {
        return $this->setRightOperand(PVar::HEIGHT);
    }

    /**
     * The asset's initial height.
     *
     */
    public function initialHeight(): Expression
    {
        return $this->setRightOperand(PVar::INITIAL_HEIGHT);
    }

    /**
     * The aspect ratio of the asset. The compared value can be either decimal (e.g., 1.5) or a ratio (e.g., 3:4)
     *
     */
    public function aspectRatio(): Expression
    {
        return $this->setRightOperand(PVar::ASPECT_RATIO);
    }

    /**
     * The initial aspect ratio of the asset.
     *
     */
    public function initialAspectRatio(): Expression
    {
        return $this->setRightOperand(PVar::INITIAL_ASPECT_RATIO);
    }

    /**
     * The aspect ratio of the image IF it was trimmed (using the Effect::trim effect) without actually trimming
     * the image.
     *
     * The compared value can be either decimal (e.g., 1.5) or a ratio (e.g., 3:4).
     *
     *
     * @see Effect::trim
     */
    public function trimmedAspectRatio(): Expression
    {
        return $this->setRightOperand(PVar::TRIMMED_ASPECT_RATIO);
    }

    /**
     * The total number of pages in the image/document.
     *
     */
    public function pageCount(): Expression
    {
        return $this->setRightOperand(PVar::PAGE_COUNT);
    }

    /**
     * The total number of detected faces in the image.
     *
     */
    public function faceCount(): Expression
    {
        return $this->setRightOperand(PVar::FACE_COUNT);
    }

    /**
     * The likelihood that the image is an illustration (as opposed to a photo).
     * Supported values: 0 (photo) to 1 (illustration)
     *
     */
    public function illustrationScore(): Expression
    {
        return $this->setRightOperand(PVar::ILLUSTRATION_SCORE);
    }

    /**
     * The current page in the image/document.
     *
     */
    public function currentPage(): Expression
    {
        return $this->setRightOperand(PVar::CURRENT_PAGE);
    }

    /**
     * The page X.
     *
     */
    public function pageX(): Expression
    {
        return $this->setRightOperand(PVar::PAGE_X);
    }

    /**
     * The page Y.
     *
     */
    public function pageY(): Expression
    {
        return $this->setRightOperand(PVar::PAGE_Y);
    }

    /**
     * The set of tags assigned to the asset.
     *
     * Used with the Expression::in or Expression::notIn operators.
     *
     * Note: The syntax for this characteristic is slightly different:
     * if_!<string1:string2:stringN>!_in_tags, where the : delimiter denotes AND.
     *
     *
     * @see Expression::in
     * @see Expression::notIn
     */
    public function tags(): Expression
    {
        return $this->setRightOperand(PVar::TAGS);
    }

    /**
     * A context value assigned to an asset.
     *
     */
    public function context(): Expression
    {
        return $this->setRightOperand(PVar::CONTEXT);
    }

    /**
     * Generic (future) predefined variable name.
     *
     * @param string $genericPredefinedVariable The name of the predefined variable
     *
     */
    public function generic(string $genericPredefinedVariable): Expression
    {
        return $this->setRightOperand($genericPredefinedVariable);
    }
}
