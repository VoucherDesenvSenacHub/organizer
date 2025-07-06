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

use Cloudinary\TransformationUtils;

/**
 * Class GenerativeReplace
 */
class GenerativeReplace extends GenerativeEffectAction
{
    protected const FROM_PROMPT       = 'from';
    protected const TO_PROMPT         = 'to';
    protected const PRESERVE_GEOMETRY = 'preserve-geometry';


    use DetectMultipleTrait;

    /**
     * GenerativeReplace constructor.
     *
     * @param string    $fromPrompt       Use natural language to describe what you want to replace.
     * @param string    $toPrompt         Use natural language to describe the replacement.
     * @param bool|null $preserveGeometry Whether to maintain the shape of the object you're replacing.
     * @param bool|null $detectMultiple   Whether to detect all instances of the prompt in the image.
     */
    public function __construct(
        string $fromPrompt,
        string $toPrompt,
        ?bool $preserveGeometry = null,
        ?bool $detectMultiple = null,
        ...$args
    ) {
        parent::__construct(GenerativeEffect::GENERATIVE_REPLACE, ...$args);

        $this->fromPrompt($fromPrompt);
        $this->toPrompt($toPrompt);
        $this->preserveGeometry($preserveGeometry);
        $this->detectMultiple($detectMultiple);
    }

    /**
     * Use natural language to describe what you want to affect in the image.
     *
     * @param string $fromPrompt A description of the object to replace.
     *
     * @return $this
     */
    public function fromPrompt(string $fromPrompt): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::FROM_PROMPT,
            $fromPrompt
        );

        return $this;
    }

    /**
     * Use natural language to describe what you want to affect in the image.
     *
     * @param string $toPrompt A description of the replacement object.
     *
     * @return $this
     */
    public function toPrompt(string $toPrompt): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::TO_PROMPT,
            $toPrompt
        );

        return $this;
    }

    /**
     * Preserve geometry.
     *
     * @param ?bool $preserveGeometry Whether to maintain the shape of the object you're replacing.
     *
     * @return $this
     */
    public function preserveGeometry(?bool $preserveGeometry = true): static
    {
        $this->getMainQualifier()->getPropertiesValue()->setSimpleNamedValue(
            self::PRESERVE_GEOMETRY,
            TransformationUtils::boolToString($preserveGeometry)
        );

        return $this;
    }
}
