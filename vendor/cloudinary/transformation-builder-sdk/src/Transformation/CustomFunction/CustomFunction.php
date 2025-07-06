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

use Cloudinary\StringUtils;
use Cloudinary\Transformation\Qualifier\BaseQualifier;

/**
 * Calls a custom function.
 *
 * **Learn more**: <a href="https://cloudinary.com/documentation/custom_functions" target="_blank">Custom functions</a>
 *
 * @api
 */
class CustomFunction extends BaseQualifier
{
    protected const VALUE_CLASS = CustomFunctionValue::class;

    use CustomFunctionTrait;

    /**
     * @var string $name Serialisation name.
     */
    protected static string $name = 'custom_function';

    /**
     * @var string $key Serialization key.
     */
    protected static string $key = 'fn';

    /**
     * WASM.
     *
     * @var string
     */
    public const WASM = 'wasm';
    /**
     * Remote.
     *
     * @var string
     */
    public const REMOTE = 'remote';

    /**
     * CustomFunction constructor.
     *
     * @param string      $source     Source of this custom function
     * @param string|null $type       The type of custom function (CustomFunction::REMOTE or CustomFunction::WASM).
     * @param bool|null   $preprocess Preprocess custom function. Only remote functions are supported for preprocess
     *
     * @see CustomFunction::REMOTE
     * @see CustomFunction::WASM
     */
    public function __construct($source, ?string $type = null, ?bool $preprocess = false)
    {
        parent::__construct(
            $type === self::REMOTE ? StringUtils::base64UrlEncode($source) : $source, $type
        );

        $this->preprocess($preprocess);
    }

    /**
     * Defines the function as the remote preprocessing custom function.
     *
     * For more information about preprocessing custom functions see the documentation.
     *
     * @param bool $preprocess Whether to define the function as the remote preprocessing custom function.
     *
     *
     * @see CustomFunction
     * @see https://cloudinary.com/documentation/custom_functions#preprocessing_custom_functions
     */
    public function preprocess(bool $preprocess = true): static
    {
        $this->getValue()->setSimpleValue('preprocess', $preprocess ? 'pre' : null);

        return $this;
    }
}
