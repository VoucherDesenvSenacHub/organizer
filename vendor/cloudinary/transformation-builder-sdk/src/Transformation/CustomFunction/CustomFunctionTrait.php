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
 * Trait CustomFunctionTrait
 *
 * @api
 */
trait CustomFunctionTrait
{
    /**
     * Specifies the wasm file to use for the custom function.
     *
     * For more information about WebAssembly functions see the documentation.
     *
     * @param string $source The public ID of the wasm file.
     *
     *
     * @see CustomFunction
     * @see https://cloudinary.com/documentation/custom_functions#webassembly_functions
     *
     */
    public static function wasm(string $source): CustomFunction
    {
        return static::create($source, CustomFunction::WASM);
    }

    /**
     * Specifies the URL of the remote custom function.
     *
     * For more information about remote custom functions see the documentation.
     *
     * @param string $source The URL of the remote function.
     *
     *
     * @see CustomFunction
     * @see https://cloudinary.com/documentation/custom_functions#remote_functions
     *
     */
    public static function remote(string $source): CustomFunction
    {
        return static::create($source, CustomFunction::REMOTE);
    }

    /**
     * Named constructor.
     *
     * @param array $values
     *
     * @see CustomFunction
     *
     * @internal
     */
    protected static function create(...$values): CustomFunction
    {
        return new CustomFunction(...$values);
    }

    /**
     * Creates a new instance from an array of qualifiers.
     *
     * @param array|string $qualifiers The qualifiers.
     * @param bool         $isPre      Indicates whether the function is a pre-processing function. Default: false.
     *
     * @see CustomFunction
     *
     */
    public static function fromParams(array|string $qualifiers, bool $isPre = false): CustomFunction
    {
        if (! is_array($qualifiers)) {
            return static::create($qualifiers, null, $isPre);
        }

        $functionType = ArrayUtils::get($qualifiers, 'function_type');
        $source       = ArrayUtils::get($qualifiers, 'source');

        return static::create($source, $functionType, $isPre);
    }
}
