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
 * Class XmpSource
 */
class XmpSourceValue extends SourceValue
{
    public const XMP = 'xmp';

    protected array $argumentOrder = ['asset_type', 'delivery_type', 'source'];

    public function __construct(...$arguments)
    {
        parent::__construct(...$arguments);

        $this->setSimpleValue('asset_type', self::XMP);
    }

    public function authenticated(bool $set = true): XmpSourceValue
    {
        return $this->setSimpleValue('delivery_type', $set ? 'authenticated' : null);
    }
}
