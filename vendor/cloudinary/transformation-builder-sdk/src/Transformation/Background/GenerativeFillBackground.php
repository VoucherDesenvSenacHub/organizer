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
 * Using generative AI, you can automatically add visually realistic pixels to either or both dimensions of the image.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#generative_fill"
 * target="_blank">Generative fill</a>
 *
 * @api
 */
class GenerativeFillBackground extends Background
{
    public const GEN_FILL = 'gen_fill';

    public const IGNORE_FOREGROUND = 'ignore-foreground';

    public const PROPERTIES = 'properties';

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, self::PROPERTIES];

    /**
     * GenerativeFillBackground constructor.
     *
     * @param string|array|null $prompt           Use natural language to describe what generate in the image.
     * @param bool|null         $ignoreForeground Whether to take foreground elements into account.
     */
    public function __construct(string|array|null $prompt = null, ?bool $ignoreForeground = null)
    {
        parent::__construct(self::GEN_FILL);

        $this->value->setSimpleValue(self::PROPERTIES, new ListQualifierMultiValue());

        $this->prompt($prompt);
        $this->ignoreForeground($ignoreForeground);
    }

    /**
     * Use natural language to describe what you want to affect in the image.
     *
     * @param array|string|null $prompt A list of prompts.
     *
     * @return $this
     */
    public function prompt(array|string|null $prompt): static
    {
        $this->value->getSimpleValue(self::PROPERTIES)->setSimpleNamedValue(
            GenerativeEffectAction::PROMPT,
            new FullListQualifierMultiValue(...ArrayUtils::build($prompt))
        );

        return $this;
    }

    /**
     * Whether to take foreground elements into account.
     *
     * @param ?bool $ignoreForeground Whether to take foreground elements into account.
     *
     * @return $this
     */
    public function ignoreForeground(?bool $ignoreForeground = true): static
    {
        $this->value->getSimpleValue(self::PROPERTIES)->setSimpleNamedValue(
            self::IGNORE_FOREGROUND,
            TransformationUtils::boolToString($ignoreForeground)
        );

        return $this;
    }
}
