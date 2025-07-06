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
use Cloudinary\JsonUtils;
use Cloudinary\StringUtils;
use Cloudinary\Transformation\Qualifier\BaseQualifier;
use InvalidArgumentException;

/**
 * Class BaseAction
 *
 * @api
 */
abstract class BaseAction extends BaseComponent
{
    /**
     * @var array $qualifiers The components (qualifiers/parameters) of the action.
     */
    protected array $qualifiers = [];

    /**
     * @var ?string MAIN_QUALIFIER Represents the main qualifier of the action. (some actions don't have main qualifier)
     */
    protected const MAIN_QUALIFIER = null;

    /**
     * @var array $flags The flags of the action.
     */
    protected array $flags = [];

    /**
     * @var ?string $genericAction The generic (raw) action.
     */
    protected ?string $genericAction = null;

    /**
     * Action constructor.
     *
     */
    public function __construct(...$qualifiers)
    {
        parent::__construct();

        $this->addQualifiers(...$qualifiers);
    }

    /**
     * Adds the qualifier to the action.
     *
     * @param BaseComponent|null $qualifier The qualifier to add.
     *
     * @return $this
     */
    public function addQualifier(?BaseComponent $qualifier = null): static
    {
        ArrayUtils::addNonEmpty($this->qualifiers, $qualifier?->getFullName(), $qualifier);

        return $this;
    }

    /**
     * Adds qualifiers to the action.
     *
     * @param array $qualifiers The qualifiers to add.
     *
     * @return $this
     */
    public function addQualifiers(...$qualifiers): static
    {
        if (count($qualifiers) < 1) {
            return $this;
        }
        // Allow initializing action directly by passing values to the main qualifier
        // it can be a bit tricky, user is not supposed to pass BaseComponent directly to the action,
        // but initialize qualifier instead (or qualifier should be initialised for the user)
        if (! $qualifiers[0] instanceof BaseComponent) {
            $this->getMainQualifier()->add(...$qualifiers);

            return $this;
        }

        foreach ($qualifiers as $qualifier) {
            $this->addQualifier($qualifier);
        }

        return $this;
    }

    /**
     * Adds (sets) generic (raw) action.
     *
     * @param ?string $action The generic action string.
     *
     */
    public function setGenericAction(?string $action): static
    {
        if (StringUtils::contains($action, '/')) {
            throw new InvalidArgumentException('A single generic action must be supplied');
        }

        $this->genericAction = $action;

        return $this;
    }

    /**
     * Sets the flag.
     *
     * @param FlagQualifier|null $flag The flag to set.
     * @param bool               $set  Indicates whether to set(true) or unset(false) the flag instead.
     *                                 (Used for avoiding if conditions all over the code)
     *
     * @return $this
     */
    public function setFlag(?FlagQualifier $flag, bool $set = true): static
    {
        if ($set === false) {
            return $this->unsetFlag($flag);
        }

        ArrayUtils::addNonEmpty($this->flags, $flag->getFlagName(), $flag);

        return $this;
    }

    /**
     * Removes the flag.
     *
     * @param FlagQualifier $flag The flag to unset.
     *
     * @return $this
     */
    public function unsetFlag(FlagQualifier $flag): static
    {
        unset($this->flags[$flag->getFlagName()]);

        return $this;
    }

    /**
     * Imports (merges) qualifiers and flags from another action.
     *
     * @param BaseAction|null $action The action to import.
     *
     * @return $this
     */
    public function importAction(?BaseAction $action): static
    {
        if ($action === null) {
            return $this;
        }

        $this->qualifiers = ArrayUtils::mergeNonEmpty($this->qualifiers, $action->qualifiers);
        $this->flags      = ArrayUtils::mergeNonEmpty($this->flags, $action->flags);

        return $this;
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        $jsonArray = [];

        ArrayUtils::addNonEmpty($jsonArray, 'qualifiers', self::jsonSerializeQualifiers($this->qualifiers));
        ArrayUtils::addNonEmpty($jsonArray, 'generic', $this->genericAction);
        ArrayUtils::addNonEmpty($jsonArray, 'flags', self::jsonSerializeQualifiers($this->flags));

        if (empty($jsonArray)) {
            return [];
        }

        ArrayUtils::prependAssoc($jsonArray, 'name', $this->getFullName());

        return $jsonArray;
    }

    /**
     * Collects and flattens action qualifiers.
     *
     * @return array A flat array of qualifiers
     *
     * @internal
     */
    public function getStringQualifiers(): array
    {
        $flatQualifiers = [];
        foreach ($this->qualifiers as $qualifier) {
            $flatQualifiers = ArrayUtils::mergeNonEmpty($flatQualifiers, $qualifier->getStringQualifiers());
        }

        return array_merge($flatQualifiers, [self::serializeFlags($this->flags)], [$this->genericAction]);
    }

    /**
     * Serializes to Cloudinary URL format
     *
     * @return string
     */
    public function __toString()
    {
        return ArrayUtils::implodeActionQualifiers(...$this->getStringQualifiers());
    }

    /**
     * Gets the main qualifier, if defined.
     *
     * In case the qualifier is not defined, new instance is initialised.
     *
     * @return BaseQualifier The main qualifier
     *
     * @internal
     */
    protected function getMainQualifier(): BaseQualifier
    {
        $mainQualifierClassName = static::MAIN_QUALIFIER;
        $mainQualifierKey       = $mainQualifierClassName::getName();
        if (! isset($this->qualifiers[$mainQualifierKey])) {
            $this->qualifiers[$mainQualifierKey] = new $mainQualifierClassName();
        }

        return $this->qualifiers[$mainQualifierKey];
    }

    /**
     * Serializes and merges flags.
     *
     * @param array $flags The flags to serialize
     *
     */
    protected static function serializeFlags(array $flags): string
    {
        return ArrayUtils::implodeActionQualifiers(...array_values($flags));
    }

    /**
     * Serializes qualifiers to JSON.
     *
     * @param array $qualifiers The qualifiers to serialize.
     *
     * @return array Serialized qualifiers.
     */
    protected static function jsonSerializeQualifiers(array $qualifiers): array
    {
        $result = array_map(
            static fn($qualifier) => JsonUtils::jsonSerialize($qualifier),
            array_values($qualifiers)
        );

        return ArrayUtils::safeFilter($result);
    }
}
