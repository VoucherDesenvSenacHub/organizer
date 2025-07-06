<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument\Range;

use Cloudinary\ArrayUtils;
use Cloudinary\Transformation\ComponentInterface;
use UnexpectedValueException;

/**
 * Class Range
 */
class Range implements ComponentInterface
{
    protected const RANGE_RE = '/^(\d+\.)?\d+[%pP]?\.\.(\d+\.)?\d+[%pP]?$/';

    /**
     * @var int The start offset of the range.
     */
    public mixed $startOffset = null;

    /**
     * @var int The end offset of the range.
     */
    public mixed $endOffset = null;

    /**
     * Range constructor.
     *
     * @param mixed|null $range
     */
    public function __construct(mixed $range = null)
    {
        if ($range === null) {
            return;
        }

        [$this->startOffset, $this->endOffset] = self::splitRange($range);
    }

    /**
     * Internal helper method for splitting the range string.
     *
     * @param array|string $range The range to split.
     *
     *
     * @internal
     */
    private static function splitRange(array|string $range): ?array
    {
        if (is_array($range) && count($range) === 2) {
            return $range;
        }

        if (is_string($range) && preg_match(self::RANGE_RE, $range) === 1) {
            return explode('..', $range, 2);
        }

        throw new UnexpectedValueException('A valid Range is expected');
    }

    /**
     * Serializes to string.
     *
     * @return string
     */
    public function __toString()
    {
        return ArrayUtils::implodeActionQualifiers($this->startOffset, $this->endOffset);
    }

    /**
     * Serializes to json.
     */
    public function jsonSerialize(): array
    {
        return [];
    }
}
