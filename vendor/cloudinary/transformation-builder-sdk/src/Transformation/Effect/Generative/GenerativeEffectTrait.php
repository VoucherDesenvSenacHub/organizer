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
 * Trait GenerativeEffectTrait
 *
 * @api
 */
trait GenerativeEffectTrait
{
    /**
     * Applies a generative restore effect to the asset.
     *
     */
    public static function generativeRestore(): GenerativeEffectAction
    {
        return new GenerativeEffectAction(GenerativeEffect::GENERATIVE_RESTORE);
    }

    /**
     * Applies a generative recolor effect to the asset.
     *
     * @param array|string $prompt         Use natural language to describe what you want to affect in the image.
     * @param string       $toColor        The target color.
     * @param bool|null    $detectMultiple Whether to recolor all instances of the prompt in the image.
     *
     */
    public static function generativeRecolor(
        array|string $prompt,
        string $toColor,
        ?bool $detectMultiple = null
    ): GenerativeRecolor {
        return new GenerativeRecolor($prompt, $toColor, $detectMultiple);
    }

    /**
     * Applies a generative remove effect to the asset.
     *
     * @param array|string|null $prompt         Use natural language to describe what you want to affect in the image.
     * @param array|string|null $region         Remove items from the specified region(s).
     * @param bool|null         $detectMultiple Whether to detect all instances of the prompt in the image.
     * @param bool|null         $removeShadow   Whether to remove shadows and reflections.
     *
     */
    public static function generativeRemove(
        array|string|null $prompt = null,
        array|string|null $region = null,
        ?bool $detectMultiple = null,
        ?bool $removeShadow = null
    ): GenerativeRemove {
        return new GenerativeRemove($prompt, $region, $detectMultiple, $removeShadow);
    }

    /**
     * Applies a generative replacement effect to the asset.
     *
     * @param string    $fromPrompt       Use natural language to describe what you want to replace.
     * @param string    $toPrompt         Use natural language to describe the replacement.
     * @param bool|null $preserveGeometry Whether to maintain the shape of the object you're replacing.
     * @param bool|null $detectMultiple   Whether to detect all instances of the prompt in the image.
     *
     */
    public static function generativeReplace(
        string $fromPrompt,
        string $toPrompt,
        ?bool $preserveGeometry = null,
        ?bool $detectMultiple = null
    ): GenerativeReplace {
        return new GenerativeReplace($fromPrompt, $toPrompt, $preserveGeometry, $detectMultiple);
    }

    /**
     * Uses AI-based prediction to add fine detail while upscaling small images.
     * This 'super-resolution' feature scales each dimension by four, multiplying the total number of pixels by 16.
     *
     */
    public static function upscale(): GenerativeEffectAction
    {
        return new GenerativeEffectAction(GenerativeEffect::UPSCALE);
    }

    /**
     * Uses AI to analyze an image and make adjustments to enhance the appeal of the image.
     *
     */
    public static function enhance(): GenerativeEffectAction
    {
        return new GenerativeEffectAction(GenerativeEffect::ENHANCE);
    }
}
