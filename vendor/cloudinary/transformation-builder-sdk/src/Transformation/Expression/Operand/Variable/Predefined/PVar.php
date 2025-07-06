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

use InvalidArgumentException;

/**
 * The predefined variables for specifying conditional transformations.
 *
 * **Learn more**: <a
 * href="https://cloudinary.com/documentation/conditional_transformations#specifying_conditions" target="_blank">
 * Specifying conditions</a>
 *
 * @api
 */
class PVar extends Expression
{
    // Numeric variables
    public const WIDTH = 'w';
    public const INITIAL_WIDTH = 'iw';
    public const HEIGHT        = 'h';
    public const INITIAL_HEIGHT = 'ih';
    public const ASPECT_RATIO   = 'ar';
    public const INITIAL_ASPECT_RATIO = 'iar';
    public const TRIMMED_ASPECT_RATIO = 'tar';
    public const PAGE_COUNT           = 'pc';
    public const DURATION      = 'du';
    public const INITIAL_DURATION = 'idu';
    public const FACE_COUNT       = 'fc';
    public const ILLUSTRATION_SCORE = 'ils';
    public const CURRENT_PAGE       = 'cp';
    public const PAGE_X       = 'px';
    public const PAGE_Y = 'py';

    // String variables
    public const TAGS = 'tags';
    public const CONTEXT = 'ctx';

    /**
     * @var array The friendly representations of the predefined variables.
     */
    protected static array $friendlyRepresentations = [
        'width'                => self::WIDTH,
        'height'               => self::HEIGHT,
        'initial_width'        => self::INITIAL_WIDTH,
        'initialWidth'         => self::INITIAL_WIDTH,
        'initial_height'       => self::INITIAL_HEIGHT,
        'initialHeight'        => self::INITIAL_HEIGHT,
        'aspect_ratio'         => self::ASPECT_RATIO,
        'aspectRatio'          => self::ASPECT_RATIO,
        'initial_aspect_ratio' => self::INITIAL_ASPECT_RATIO,
        'initialAspectRatio'   => self::INITIAL_ASPECT_RATIO,
        'trimmed_aspect_ratio' => self::TRIMMED_ASPECT_RATIO,
        'trimmedAspectRatio'   => self::TRIMMED_ASPECT_RATIO,
        'page_count'           => self::PAGE_COUNT,
        'pageCount'            => self::PAGE_COUNT,
        'duration'             => self::DURATION,
        'initial_duration'     => self::INITIAL_DURATION,
        'initialDuration'      => self::INITIAL_DURATION,
        'face_count'           => self::FACE_COUNT,
        'faceCount'            => self::FACE_COUNT,
        'illustration_score'   => self::ILLUSTRATION_SCORE,
        'illustrationScore'    => self::ILLUSTRATION_SCORE,
        'current_page'         => self::CURRENT_PAGE,
        'currentPage'          => self::CURRENT_PAGE,
        'page_x'               => self::PAGE_X,
        'pageX'                => self::PAGE_X,
        'page_y'               => self::PAGE_Y,
        'pageY'                => self::PAGE_Y,
        'tags'                 => self::TAGS,
        'context'              => self::CONTEXT,
    ];

    use PredefinedVariableTrait;

    /**
     * @var ?array The predefined variables.
     *
     * Initialized lazily.
     */
    protected static ?array $predefinedVariables;

    /**
     * PVar constructor.
     *
     * @param string $name The predefined variable name.
     */
    public function __construct($name)
    {
        if (empty($name) || ! self::isPredefinedVariable($name)) {
            throw new InvalidArgumentException("Invalid predefined variable name: '{$name}'");
        }

        parent::__construct($name);
    }

    /**
     * Gets a list of predefined variables.
     *
     * @return array The predefined variables.
     */
    public static function getPredefinedVariables(): array
    {
        return self::getConstants(self::$predefinedVariables);
    }

    /**
     * Gets a mapping of the friendly representations of the predefined variables.
     *
     */
    public static function getFriendlyRepresentations(): array
    {
        return self::$friendlyRepresentations;
    }

    /**
     * Determines whether the $candidate is a supported predefined variable.
     *
     * @param mixed $candidate The predefined variable candidate.
     *
     */
    protected static function isPredefinedVariable(mixed $candidate): bool
    {
        return in_array($candidate, self::getPredefinedVariables());
    }

    /**
     * Named constructor.
     *
     * @param string $predefinedVariableName The predefined variable name.
     *
     */
    protected static function pVar(string $predefinedVariableName): static
    {
        return new static($predefinedVariableName);
    }
}
