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

use Cloudinary\Transformation\Qualifier\BaseExpressionQualifier;

/**
 * Class QualityQualifier
 */
class QualityQualifier extends BaseExpressionQualifier
{
    use QualityTrait;
    use QualityBuilderTrait;

    /**
     * Automatically calculate the optimal quality for an image: the smallest file size without affecting its
     * perceptual quality (same as GOOD).
     */
    public const AUTO = 'auto';

    /**
     * Automatically calculate the optimal quality for an image: the smallest file size without affecting its
     * perceptual quality.
     */
    public const GOOD = 'good';

    /**
     * Automatically calculate the optimal quality for images using a less aggressive algorithm.
     */
    public const BEST = 'best';

    /**
     * Automatically calculate the optimal quality for images using a more aggressive algorithm.
     */
    public const ECO = 'eco';

    /**
     * Automatically calculate the optimal quality for images using the most aggressive algorithm.
     */
    public const LOW = 'low';

    /**
     *  Significantly reduces the size of photographs without affecting their perceptual quality.
     */
    public const JPEG_MINI = 'jpegmini';

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, 'preset']; // FIXME: first item should be named!

    /**
     * Quality constructor.
     *
     * @param mixed|null $preset
     * @param mixed      $values
     */
    public function __construct(mixed $strength, mixed $preset = null, ...$values)
    {
        parent::__construct($strength);

        $this->setSimpleValue('preset', $preset);
        $this->value->addValues(...$values);
    }

    /**
     * Sets a simple unnamed value specified by name (for uniqueness) and the actual value.
     *
     * @param string $name  The name of the argument.
     * @param mixed  $value The value of the argument.
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

    /**
     * Sets the simple named value of the quality qualifier.
     *
     * @param string     $name  The named argument name.
     * @param mixed|null $value The value.
     *
     * @return $this
     *
     * @internal
     */
    public function setSimpleNamedValue(string $name, mixed $value = null): static
    {
        $this->value->setSimpleNamedValue($name, $value);

        return $this;
    }
}
