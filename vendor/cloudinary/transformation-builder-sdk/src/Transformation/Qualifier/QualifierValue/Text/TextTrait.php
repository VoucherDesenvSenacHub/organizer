<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument\Text;

/**
 * Trait TextTrait
 */
trait TextTrait
{
    /**
     * Sets the text.
     *
     * @param ?string $text The text.
     *
     */
    public function text(?string $text): static
    {
        return $this->setText($text);
    }

    /**
     * @internal
     *
     *
     */
    public function setText($text): static
    {
        return $this->setSimpleValue('text', $text);
    }
}
