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
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class BaseSourceQualifier
 */
class BaseSourceQualifier extends BaseQualifier
{
    /**
     * @var string $name The name of the source qualifier.
     */
    protected static string $name = 'source';

    /**
     * @var string $sourceType The type of the source.
     */
    protected string $sourceType;

    /**
     * @var ?string $assetType The type of the asset.
     */
    protected ?string $assetType;

    /**
     * @var string The stack position of the layer.
     */
    protected string $stackPosition = LayerStackPosition::OVERLAY;

    /**
     * Gets the source key.
     *
     * Key depends on the stack position.
     *
     *
     * @internal
     */
    public function getSourceKey(): string
    {
        if ($this->stackPosition === LayerStackPosition::UNDERLAY) {
            return 'u';
        }

        return 'l';
    }

    /**
     * Gets component full name.
     *
     * @return string Component name.
     */
    public function getFullName(): string
    {
        return ArrayUtils::implodeFiltered('_', [parent::getFullName(), $this->stackPosition]);
    }

    /**
     * Sets stack position of the source.
     *
     * @param string $stackPosition The stack position.
     *
     * @return $this
     */
    public function setStackPosition(string $stackPosition): static
    {
        $this->stackPosition = $stackPosition;

        return $this;
    }

    /**
     * Sets the asset type.
     *
     * @param ?string $assetType The type of the asset.
     *
     * @return $this
     */
    public function assetType(?string $assetType): static
    {
        $this->assetType = $assetType;

        return $this;
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        $sourceTypeStr = isset($this->sourceType) && $this->sourceType ? "$this->sourceType:" : '';
        $assetTypeStr  = isset($this->assetType) && $this->assetType && $this->assetType != "image" ? "$this->assetType:" : '';

        return empty((string)$this->value) ? '' : "{$this->getSourceKey()}_$assetTypeStr$sourceTypeStr$this->value";
    }
}
