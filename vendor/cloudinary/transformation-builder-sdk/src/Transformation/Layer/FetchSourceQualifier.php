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

/**
 * Class FetchLayerQualifier
 */
class FetchSourceQualifier extends BaseSourceQualifier
{

    protected const VALUE_CLASS = RemoteSourceValue::class;

    /**
     * @var string $sourceType The type of the layer.
     */
    protected string $sourceType = 'fetch';

    /**
     * FetchLayerQualifier constructor.
     *
     * @param string $fetchUrl The URL of the asset.
     */
    public function __construct($fetchUrl)
    {
        parent::__construct();

        $this->fetchUrl($fetchUrl);
    }

    /**
     * Sets the URL of the remote asset.
     *
     * @param string|RemoteSourceValue|null $fetchUrl The URL of the asset.
     *
     * @return $this
     */
    public function fetchUrl(RemoteSourceValue|string|null $fetchUrl): static
    {
        if (StringUtils::contains($fetchUrl, ':fetch:')) {
            [$this->assetType, $this->sourceType, $fetchUrl] = explode(':', $fetchUrl, 3);
        }

        $this->setQualifierValue(StringUtils::truncatePrefix($fetchUrl, 'fetch:'));

        return $this;
    }
}
