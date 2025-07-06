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

use Cloudinary\Transformation\Argument\IndexedArgument;

/**
 * Trait PageLayerNameTrait
 *
 * @api
 */
trait PageLayerNameTrait
{
    /**
     * Creates an instance using the name.
     *
     * @param string   $name  The name
     * @param int|null $index The optional index.
     *
     */
    public function byLayerName(string $name, ?int $index = null): static
    {
        $this->add(new LayerName(new IndexedArgument($name, $index)));

        return $this;
    }
}
