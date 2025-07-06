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

use Cloudinary\ClassUtils;
use Cloudinary\StringUtils;

/**
 * Class BaseComponent
 */
abstract class BaseComponent implements ComponentInterface
{
    /**
     * @var string $name The name of the component.
     */
    protected static string $name;

    /**
     * BaseComponent constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Internal collector of the component class constants.
     *
     * @param array|null $constantsList The constants that are set in the previous run of the function.
     *
     *
     * @internal
     */
    protected static function getConstants(array|null &$constantsList = null): array
    {
        if (! empty($constantsList)) {
            return $constantsList;
        }

        $constantsList = ClassUtils::getConstants(static::class);

        return $constantsList;
    }

    /**
     * Gets the component name.
     *
     * Internal.
     *
     * @return string The component name.
     *
     * @internal
     */
    public static function getName(): string
    {
        $name = static::$name ?? "";

        if (empty($name)) {
            $name = StringUtils::camelCaseToSnakeCase(ClassUtils::getBaseName(static::class));
        }

        return $name;
    }

    /**
     * Non-static method for getting full name that can be determined only during runtime.
     *
     * Internal.
     *
     * @return string The component full name.
     *
     * @internal
     */
    public function getFullName(): string
    {
        return self::getName();
    }
}
