<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Qualifier;

use Cloudinary\ArrayUtils;
use Cloudinary\StringUtils;
use Cloudinary\Transformation\BaseComponent;
use Cloudinary\Transformation\QualifierMultiValue;

/**
 * Class BaseQualifier
 */
abstract class BaseQualifier extends BaseComponent
{
    /**
     * @var string VALUE_CLASS The class of the qualifier value. Can be customized by derived classes.
     */
    protected const VALUE_CLASS = QualifierMultiValue::class;

    /**
     * @var string KEY_VALUE_DELIMITER The delimiter between the key and the value.
     */
    protected const KEY_VALUE_DELIMITER = '_';

    /**
     * @var string[] Omit class suffix, example: QualityQualifier -> quality_qualifier -> quality -> q
     */
    protected const CLASS_NAME_SUFFIX_EXCLUSIONS = ['qualifier'];

    /**
     * @var string $key Serialisation Key.
     */
    protected static string $key = "";

    /**
     * @var mixed $value The value.
     */
    protected mixed $value;

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = []; // FIXME: move to QualifierTraitMultiValue

    /**
     * BaseQualifier constructor.
     *
     * @param $value
     */
    public function __construct(...$value)
    {
        parent::__construct();

        // copy constructor
        if (count($value) === 1 && $value[0] instanceof static) {
            $value[0] = clone $value[0]->getValue();
        }

        $this->setQualifierValue(...$value);
    }

    /**
     * Creates a new instance from the given value.
     *
     * @param mixed $value The value.
     *
     */
    public static function fromValue(mixed $value): static
    {
        return new static($value);
    }

    /**
     * Collects values from BaseQualifiers.
     *
     *
     */
    protected static function collectValues(array $values): array
    {
        foreach ($values as &$value) {
            $value = $value instanceof self ? $value->getValue() : $value;
        }

        return $values;
    }

    /**
     * Sets ((re)initializes) the qualifier value.
     *
     * @param mixed ...$value The qualifier value(s).
     *
     */
    public function setQualifierValue(...$value): static
    {
        $value = self::collectValues($value);

        $valueClass = static::VALUE_CLASS;

        $this->value = new $valueClass(...$value);

        if ($this->valueOrder) {
            $this->value->setArgumentOrder($this->valueOrder);
        }

        return $this;
    }

    /**
     * Adds values to the qualifier value.
     *
     * @param mixed ...$value The values to add.
     *
     * @return $this
     *
     * @internal
     */
    public function add(...$value): static
    {
        $this->value->addValues(...$value);

        return $this;
    }

    /**
     * Internal getter of the value.
     *
     *
     * @internal
     */
    public function getValue(): QualifierMultiValue
    {
        return $this->value;
    }

    /**
     * Gets the qualifier key.
     *
     *
     * @internal
     */
    public static function getKey(): string
    {
        $key = static::$key;

        if (empty($key)) {
            $key = StringUtils::toAcronym(static::getName(), self::CLASS_NAME_SUFFIX_EXCLUSIONS);
        }

        return $key;
    }

    /**
     * Gets string representation of the qualifiers
     *
     */
    public function getStringQualifiers(): array
    {
        return [(string)$this];
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        $value = (string)$this->value;

        /** @noinspection TypeUnsafeComparisonInspection */
        return $value == '' ? '' : self::getKey() . static::KEY_VALUE_DELIMITER . $value;
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        $value = ArrayUtils::flatten($this->value);

        return ! empty($value) ? [self::getName() => $value] : [];
    }
}
