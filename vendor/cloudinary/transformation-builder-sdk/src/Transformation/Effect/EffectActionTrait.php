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

/**
 * Trait EffectActionTrait
 *
 * @internal
 */
trait EffectActionTrait
{
    public static function named($name, ...$args): EffectAction
    {
        return static::fromEffectQualifier(new EffectQualifier($name, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function valued(string $effectName, mixed $value = null, ...$args): EffectAction
    {
        return static::fromEffectQualifier(new ValueEffectQualifier($effectName, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function limited(string $effectName, array $range, mixed $value = null, ...$args): EffectAction
    {
        return static::fromEffectQualifier(new LimitedEffectQualifier($effectName, $range, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function withLevel(string $effectName, array $range, mixed $value = null, ...$args): LevelEffectAction
    {
        return new LevelEffectAction(new LevelEffectQualifier($effectName, $range, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function withStrength(
        string $effectName,
        array $range,
        mixed $value = null,
        ...$args
    ): StrengthEffectAction {
        return new StrengthEffectAction(new StrengthEffectQualifier($effectName, $range, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function withBlend(string $effectName, array $range, mixed $value = null, ...$args): BlendEffectAction
    {
        return new BlendEffectAction(new BlendEffectQualifier($effectName, $range, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function withThreshold(
        string $effectName,
        array $range,
        mixed $value = null,
        ...$args
    ): ThresholdEffectAction {
        return new ThresholdEffectAction(new ThresholdEffectQualifier($effectName, $range, $value, ...$args));
    }

    /**
     * @param mixed|null $value
     *
     */
    public static function withDuration(string $effectName, mixed $value = null, ...$args): DurationEffectAction
    {
        return new DurationEffectAction(new DurationEffectQualifier($effectName, $value, ...$args));
    }

    /**
     * @param array|null $value Effect value.
     *
     */
    public static function withTolerance(string $effectName, ?array $value = null, ...$args): ToleranceEffectAction
    {
        return new ToleranceEffectAction(new ToleranceEffectQualifier($effectName, $value, ...$args));
    }

    public static function fromParams(array $qualifiers): EffectAction
    {
        $effectName = ArrayUtils::pop($qualifiers, 0);

        return static::fromEffectQualifier(new EffectQualifier($effectName, ...$qualifiers));
    }

    public static function fromEffectQualifier(EffectQualifier $effectQualifier): EffectAction
    {
        return new EffectAction($effectQualifier);
    }
}
