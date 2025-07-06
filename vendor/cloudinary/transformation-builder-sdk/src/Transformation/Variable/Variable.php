<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Variable;

use Cloudinary\StringUtils;
use Cloudinary\Transformation\Expression\UVal;
use Cloudinary\Transformation\Qualifier\GenericQualifier;
use InvalidArgumentException;

/**
 * Defines methods for using variables.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/user_defined_variables" target="_blank">
 * User defined variables</a>
 *
 *
 * @api
 */
class Variable extends GenericQualifier
{
    protected const VALUE_CLASS = VariableValue::class;
    const AS_FLOAT   = 'to_f';
    const AS_INTEGER = 'to_i';

    /**
     * Defines a new user variable with the given value.
     *
     * @param string $name  The name of the variable.
     * @param mixed  $value The value of the variable.
     *
     */
    public static function set(string $name, mixed $value): Variable
    {
        return new self($name, $value);
    }

    /**
     * Defines a new user variable with the given asset public id.
     *
     * @param string $name     The name of the variable.
     * @param mixed  $publicId The referenced asset public id.
     *
     */
    public static function setAssetReference(string $name, mixed $publicId): Variable
    {
        return new self($name, UVal::assetReference($publicId));
    }

    /**
     * Defines a new user variable with the given context key.
     *
     * @param string $name       The name of the variable.
     * @param mixed  $contextKey The context key.
     *
     */
    public static function setFromContext(string $name, mixed $contextKey): Variable
    {
        return new self($name, UVal::context($contextKey));
    }

    /**
     * Defines a new user variable with the given structured metadata key.
     *
     * @param string $name        The name of the variable.
     * @param mixed  $metadataKey The metadata key.
     *
     */
    public static function setFromMetadata(string $name, mixed $metadataKey): Variable
    {
        return new self($name, UVal::metadata($metadataKey));
    }

    /**
     * Indicates Cloudinary to treat the value as float.
     *
     * @param bool $asFloat Whether to treat as float.
     *
     * @return $this
     */
    public function asFloat(bool $asFloat = true): static
    {
        if ($asFloat) {
            $this->value->addValues(self::AS_FLOAT);
        }

        return $this;
    }

    /**
     * Indicates Cloudinary to treat the value as integer.
     *
     * @param bool $asInteger Whether to treat as integer.
     *
     * @return $this
     */
    public function asInteger(bool $asInteger = true): static
    {
        if ($asInteger) {
            $this->value->addValues(self::AS_INTEGER);
        }

        return $this;
    }

    /**
     * Sets the variable name as the qualifier key.
     *
     * @param string $genericKey The name of the variable.
     *
     */
    public function setKey(string $genericKey): static
    {
        $genericKey = StringUtils::ensureStartsWith($genericKey, '$');

        if (empty($genericKey) || ! self::isVariable($genericKey)) {
            throw new InvalidArgumentException('Invalid variable name');
        }

        parent::setKey($genericKey);

        return $this;
    }

    /**
     * Sets ((re)initializes) the qualifier value.
     *
     * @param $value
     *
     */
    public function setQualifierValue(...$value): static
    {
        if (count($value) === 1) {
            if (is_string($value[0])) {
                $value[0] = UVal::string($value[0]);
            } elseif (is_array($value[0])) {
                $value[0] = UVal::stringArray($value[0]);
            }
        }

        parent::setQualifierValue(...$value);

        return $this;
    }


    /**
     * Returns the variable name.
     *
     */
    public function getVariableName(): string
    {
        return $this->genericKey;
    }

    /**
     * Determines whether the candidate is a valid variable name.
     *
     * @param string $candidate Variable name candidate.
     *
     */
    public static function isVariable(string $candidate): bool
    {
        return (boolean)preg_match('/^\$[a-zA-Z]\w*$/', $candidate);
    }

    /**
     * Serializes to json.
     *
     */
    public function jsonSerialize(): array
    {
        if (empty($this->getValue())) {
            return [];
        }

        return ['variable' => ['name' => $this->getVariableName(), 'value' => $this->getValue()]];
    }
}
