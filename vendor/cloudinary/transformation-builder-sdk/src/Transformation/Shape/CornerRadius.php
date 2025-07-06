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

use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Class CornerRadius
 */
class CornerRadius extends BaseQualifier
{
    protected const VALUE_CLASS = Corners::class;

    use CornerRadiusTrait;
    use CornersTrait;

    public const MAX = 'max';

    /**
     * @var string $key Serialization key.
     */
    protected static string $key = 'r';

    /**
     * Sets a simple unnamed value specified by name (for uniqueness) and the actual value.
     *
     * @param string     $name  The name of the argument.
     * @param mixed|null $value The value of the argument.
     *
     * @return $this
     *
     * @internal
     */
    public function setSimpleValue(string $name, mixed $value = null): static
    {
        $this->value->setSimpleValue($name, $value);

        return $this;
    }
}
