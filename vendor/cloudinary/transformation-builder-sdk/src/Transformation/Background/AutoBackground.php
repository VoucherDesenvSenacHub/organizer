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

/**
 * Automatically sets the background color when resizing with padding.
 *
 * **Learn more**:
 * <a href="https://cloudinary.com/documentation/effects_and_artistic_enhancements#content_aware_padding" target="_blank">
 * Content-aware padding</a>
 *
 * @api
 */
class AutoBackground extends Background
{
    public const AUTO = 'auto';
    public const MODE = 'mode';
    public const PALETTE = 'palette';

    use AutoBackgroundTrait;

    /**
     * @var array $valueOrder The order of the values.
     */
    protected array $valueOrder = [0, self::MODE, self::PALETTE];

    /**
     * Selects the predominant color while taking only the image border pixels into account. (Server default)
     */
    public const BORDER = 'border';

    /**
     * Selects the predominant color while taking all pixels in the image into account.
     */
    public const PREDOMINANT = 'predominant';

    /**
     * @var string $type The type of the background color. Use the constants defined in this class.
     */
    protected string $type;

    /**
     * AutoBackground constructor.
     *
     * @param string $mode The auto background mode.
     */
    public function __construct($mode)
    {
        parent::__construct(self::AUTO);

        $this->mode($mode);
    }

    /**
     * Determines which color is automatically chosen for the background.
     *
     * @param AutoBackgroundMode|string|null $mode Use the constants defined in this class.
     *
     */
    protected function mode(AutoBackgroundMode|string|null $mode): static
    {
        $this->value->setSimpleValue(self::MODE, ClassUtils::forceInstance($mode, AutoBackgroundMode::class));

        return $this;
    }

    /**
     * Determines which color is automatically chosen for the background.
     *
     * @param string $type Use the constants defined in this class.
     *
     */
    public function type(string $type): static
    {
        $this->value->getSimpleValue(self::MODE)->type($type);

        return $this;
    }

    /**
     * Inverse the color.
     *
     */
    public function contrast(): static
    {
        $this->value->getSimpleValue(self::MODE)->contrast();

        return $this;
    }

    /**
     * Use the palette of colors.
     *
     * @param array|Palette $colors The palette of colors
     *
     */
    public function palette(...$colors): static
    {
        $this->value->setSimpleNamedValue(self::PALETTE, ClassUtils::verifyVarArgsInstance($colors, Palette::class));

        return $this;
    }

}
