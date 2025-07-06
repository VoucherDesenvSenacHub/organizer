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

use Cloudinary\StringUtils;
use Cloudinary\Transformation\Argument\ColorValue;

/**
 * Class GenerativeRecolor
 */
class GenerativeRecolor extends GenerativeEffectAction
{
    use PromptTrait;
    use DetectMultipleTrait;

    protected const TO_COLOR = 'to-color';

    /**
     * GenerativeRecolor constructor.
     *
     * @param string|array $prompt         Use natural language to describe what you want to affect in the image.
     * @param string       $toColor        The target color.
     * @param bool|null    $detectMultiple Whether to detect all instances of the prompt in the image.
     */
    public function __construct($prompt, $toColor, ?bool $detectMultiple = null, ...$args)
    {
        parent::__construct(GenerativeEffect::GENERATIVE_RECOLOR, ...$args);

        $this->prompt($prompt);
        $this->toColor($toColor);
        $this->detectMultiple($detectMultiple);
    }

    /**
     * Sets the target color.
     *
     * @param string|ColorValue $toColor The HTML name or RGB/A hex code of the target color.
     *
     * @return $this
     */
    public function toColor(ColorValue|string $toColor): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::TO_COLOR,
            StringUtils::truncatePrefix((string)$toColor, '#')
        );

        return $this;
    }
}
