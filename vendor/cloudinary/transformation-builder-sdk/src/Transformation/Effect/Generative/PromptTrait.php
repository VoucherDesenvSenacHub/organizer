<?php

namespace Cloudinary\Transformation;

use Cloudinary\ArrayUtils;

/**
 * Trait DetectMultipleTrait
 */
trait PromptTrait
{
    /**
     * Use natural language to describe what you want to affect in the image.
     *
     * @param array|string|null $prompt A list of prompts.
     *
     * @return $this
     */
    public function prompt(array|string|null $prompt): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            GenerativeEffectAction::PROMPT,
            new FullListQualifierMultiValue(
                ...ArrayUtils::build($prompt)
            )
        );

        return $this;
    }
}
