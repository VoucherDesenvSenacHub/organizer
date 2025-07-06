<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

/**
 * Trait ValueBuilderTrait
 *
 * @api
 */
trait ValueBuilderTrait
{
    /**
     * Sets the integer value.
     *
     * @param int $value The value.
     *
     */
    public function int(int $value): Expression
    {
        return $this->setRightOperand(UVal::int($value));
    }

    /**
     * Sets the float value.
     *
     * @param float $value The value.
     *
     */
    public function float(float $value): Expression
    {
        return $this->setRightOperand(UVal::float($value));
    }

    /**
     * Sets the numeric value.
     *
     * @param int|float|mixed $value The value.
     *
     */
    public function numeric(mixed $value): Expression
    {
        return $this->setRightOperand(UVal::numeric($value));
    }

    /**
     * Sets the string value.
     *
     * @param string $value The value.
     *
     */
    public function string(string $value): Expression
    {
        return $this->setRightOperand(UVal::string($value));
    }

    /**
     * Sets the  value.
     *
     * @param array $value The array value.
     *
     */
    public function stringArray(array $value): Expression
    {
        return $this->setRightOperand(UVal::stringArray($value));
    }

    /**
     * Sets the asset reference value.
     *
     * @param string $publicId The public ID of the file.
     *
     */
    public function assetReference(string $publicId): Expression
    {
        return $this->setRightOperand(UVal::assetReference($publicId));
    }
}
