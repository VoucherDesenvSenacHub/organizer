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
 * Class VectorizeValue
 */
class VectorizeValue extends QualifierMultiValue
{
    use VectorizeTrait;

    public const COLORS = 'colors';
    public const DETAIL = 'detail';
    public const DESPECKLE = 'despeckle';
    public const PATHS     = 'paths';
    public const CORNERS = 'corners';

    public const KEY_VALUE_DELIMITER = ':';

    public const COLOR_RANGE = [2, 30];
    public const DETAIL_RANGE = [0, 1000];
    public const PATHS_RANGE  = [0, 100];
    public const CORNER_THRESHOLD_RANGE = [0, 100];

    /**
     * VectorizeValue constructor.
     *
     * @param int|null   $colors
     * @param float|null $detail
     * @param float|null $despeckle
     * @param int|null   $paths
     * @param int|null   $corners
     */
    public function __construct(
        ?int $colors = null,
        ?float $detail = null,
        ?float $despeckle = null,
        ?int $paths = null,
        ?int $corners = null
    ) {
        parent::__construct(MiscEffect::VECTORIZE);

        $this->numOfColors($colors);
        $this->detailsLevel($detail);
        $this->despeckleLevel($despeckle);
        $this->paths($paths);
        $this->cornersLevel($corners);
    }
}
