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
use Cloudinary\TransformationUtils;

/**
 * Class GenerativeRemove
 */
class GenerativeRemove extends GenerativeEffectAction
{
    use PromptTrait;
    use DetectMultipleTrait;

    protected const REGION        = 'region';
    protected const REMOVE_SHADOW = 'remove-shadow';

    /**
     * GenerativeRemove constructor.
     *
     * @param string|array $prompt         Use natural language to describe what you want to affect in the image.
     * @param string|array $region         Remove items from the specified region(s).
     * @param bool|null    $detectMultiple Whether to detect all instances of the prompt in the image.
     * @param bool|null    $removeShadow   Whether to remove shadows and reflections.
     */
    public function __construct(
        $prompt = null,
        $region = null,
        ?bool $detectMultiple = null,
        ?bool $removeShadow = null,
        ...$args
    ) {
        parent::__construct(GenerativeEffect::GENERATIVE_REMOVE, ...$args);

        $this->prompt($prompt);
        $this->region($region);
        $this->detectMultiple($detectMultiple);
        $this->removeShadow($removeShadow);
    }

    /**
     * Sets the target region.
     *
     * @param $region
     *
     * @return $this
     */
    public function region(...$region): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::REGION,
            new FullListQualifierMultiValue(
                ...ArrayUtils::build($region)
            )
        );

        return $this;
    }

    /**
     * Whether to remove the shadow in addition to the object(s).
     *
     * @param ?bool $removeShadow Whether to remove shadow.
     *
     * @return $this
     */
    public function removeShadow(?bool $removeShadow = true): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::REMOVE_SHADOW,
            TransformationUtils::boolToString($removeShadow)
        );

        return $this;
    }
}
