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
use Cloudinary\Transformation\Argument\Text\TextStyleTrait;

/**
 * Class TextStyle
 */
class TextStyle extends QualifierMultiValue
{
    protected const VALUE_DELIMITER = '_';

    public const DEFAULT_FONT_WEIGHT = 'normal';
    public const DEFAULT_FONT_STYLE  = 'normal';
    public const DEFAULT_TEXT_DECORATION = 'none';
    public const DEFAULT_TEXT_ALIGNMENT  = null;
    public const DEFAULT_STROKE         = 'none';

    use TextStyleTrait;

    /**
     * @var array $argumentOrder The order of the arguments.
     */
    protected array $argumentOrder = [
        'font_family',
        'font_size',
        'font_weight',
        'font_style',
        'text_decoration',
        'text_alignment',
        'stroke',
    ];

    /**
     * TextStyle constructor
     *
     * @param string|null    $fontFamily Font family
     * @param float|int|null $fontSize   Font size
     */
    public function __construct(?string $fontFamily = null, float|int|null $fontSize = null)
    {
        parent::__construct();

        $this->fontFamily($fontFamily);
        $this->fontSize($fontSize);
    }

    /**
     * Creates a new instance from an array of qualifiers.
     *
     * @param array $qualifiers The text style qualifiers.
     *
     */
    public static function fromParams(array $qualifiers): TextStyle
    {
        $style = new self(ArrayUtils::get($qualifiers, 'font_family'), ArrayUtils::get($qualifiers, 'font_size'));
        $style->importQualifiers($qualifiers);

        return $style;
    }

    /**
     * Imports text style qualifiers to the current instance.
     *
     * @param array $qualifiers The text style qualifiers.
     *
     * @internal
     */
    public function importQualifiers(array $qualifiers): void
    {
        $this->fontWeight(ArrayUtils::get($qualifiers, 'font_weight'));
        $this->fontStyle(ArrayUtils::get($qualifiers, 'font_style'));
        $this->textDecoration(ArrayUtils::get($qualifiers, 'text_decoration'));
        $this->textAlignment(ArrayUtils::get($qualifiers, 'text_align'));
        $this->stroke(ArrayUtils::get($qualifiers, 'stroke'));
        $this->letterSpacing(ArrayUtils::get($qualifiers, 'letter_spacing'));
        $this->lineSpacing(ArrayUtils::get($qualifiers, 'line_spacing'));
        $this->fontAntialias(ArrayUtils::get($qualifiers, 'font_antialiasing'));
        $this->fontHinting(ArrayUtils::get($qualifiers, 'font_hinting'));
    }
}
