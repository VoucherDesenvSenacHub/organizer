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

/**
 * Class Corners
 */
class Corners extends ExpressionQualifierMultiValue
{
    public const MAX_ARGUMENTS = 4;

    use CornersTrait;

    /**
     * @var array $argumentOrder The order of the arguments.
     */
    protected array $argumentOrder = ['topLeft', 'topRight', 'bottomRight', 'bottomLeft'];

    /**
     * Corners constructor.
     *
     * @param int|string|array $topLeft     Top-left corner radius.
     * @param int|null         $topRight    Top-right corner radius.
     * @param int|null         $bottomRight Bottom-right corner radius.
     * @param int|null         $bottomLeft  Bottom-left corner radius.
     */
    public function __construct($topLeft, ?int $topRight = null, ?int $bottomRight = null, ?int $bottomLeft = null)
    {
        if (is_array($topLeft)) {
            $corners = array_pad($topLeft, 4, null);
        } else {
            $corners = [$topLeft, $topRight, $bottomRight, $bottomLeft];
        }

        $namedValues = array_combine(['topLeft', 'topRight', 'bottomRight', 'bottomLeft'], $corners);

        parent::__construct($namedValues);
    }
}
