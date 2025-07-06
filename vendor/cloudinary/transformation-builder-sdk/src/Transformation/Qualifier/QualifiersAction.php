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
use Cloudinary\StringUtils;
use Cloudinary\Transformation\Argument\Range\Range;
use Cloudinary\Transformation\Expression\Expression;
use Cloudinary\Transformation\Qualifier\BaseQualifier;
use Cloudinary\Transformation\Variable\Variable;

/**
 * Class QualifiersAction
 *
 * Action for old-style (legacy) qualifiers defined in an associative array.
 * The main goal is backwards compatibility with the previous version of the SDK.
 */
class QualifiersAction extends BaseAction
{
    protected const SIMPLE_QUALIFIERS = [
        'aspect_ratio'      => null,
        'background'        => null,
        'crop'              => 'crop_mode',
        'color'             => null,
        'dpr'               => null,
        'duration'          => null,
        'end_offset'        => null,
        'keyframe_interval' => null,
        'height'            => null,
        'if'                => 'if_condition',
        'opacity'           => null,
        'quality'           => null,
        'radius'            => 'corner_radius',
        'start_offset'      => null,
        'width'             => null,
        'x'                 => null,
        'y'                 => null,
        'zoom'              => null,
        'audio_codec'       => null,
        'audio_frequency'   => null,
        'bit_rate'          => null,
        'color_space'       => null,
        'default_image'     => null,
        'delay'             => null,
        'density'           => null,
        'fetch_format'      => 'format',
        'gravity'           => null,
        'prefix'            => null,
        'page'              => null,
        'streaming_profile' => null,
        'video_sampling'    => null,
    ];

    protected const COMPLEX_QUALIFIERS = [
        'angle'               => null,
        'border'              => null,
        'custom_function'     => null,
        'custom_pre_function' => null,
        'effect'              => null,
        'flags'               => null,
        'fps'                 => null,
        'offset'              => null,
        'overlay'             => null,
        'size'                => null,
        'transformation'      => null,
        'underlay'            => null,
        'video_codec'         => null,
    ];

    public const QUALIFIERS = self::COMPLEX_QUALIFIERS + self::SIMPLE_QUALIFIERS;

    /**
     * Add qualifiers to the action.
     *
     * @param array $qualifiers The qualifiers.
     *
     * @return $this
     */
    public function addQualifiers(...$qualifiers): static
    {
        $this->qualifiers = ArrayUtils::mergeNonEmpty($this->qualifiers, ...$qualifiers);

        return $this;
    }

    /**
     * Serializes to Cloudinary URL format.
     *
     * @return string
     */
    public function __toString()
    {
        try {
            return $this->generateTransformationString($this->qualifiers);
        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }

    /**
     * Generates a single transformation action.
     *
     * @used-by QualifiersAction::generateTransformationString
     *
     * @param array|BaseComponent $transformationAction The action to generate.
     *
     */
    protected function generateTransformationAction(BaseComponent|array $transformationAction): string
    {
        $options = is_array($transformationAction) || QualifiersAction::isTransformationComponent(
            $transformationAction
        ) ? $transformationAction :
            ['transformation' => $transformationAction];

        return $this->generateTransformationString($options);
    }

    /**
     * Generates transformation string using provided options.
     *
     * @param array|string $options Transformation qualifiers and other options.
     *
     * Warning: $options are being destructively updated!
     *
     * @return string The resulting transformation string.
     */
    protected function generateTransformationString(array|string $options): string
    {
        if (is_string($options) || QualifiersAction::isTransformationComponent($options)) {
            return (string)$options;
        }

        if (is_array($options) && ! ArrayUtils::isAssoc($options)) {
            return ArrayUtils::implodeUrl(array_map([$this, 'generateTransformationAction'], $options));
        }

        $baseTransformations = [];

        // Handle nested transformations
        $nestedTransformations = ArrayUtils::build(ArrayUtils::pop($options, 'transformation'));
        if (count(array_filter($nestedTransformations, [$this, 'isTransformation'])) > 0) {
            $baseTransformations = array_map([$this, 'generateTransformationAction'], $nestedTransformations);
        } else { // array of strings (named transformations)
            $options['transformation'] = $nestedTransformations; // put named transformations back
        }

        $if                = $this->buildQualifier('if', ArrayUtils::pop($options, 'if'));
        $variables         = $this->collectVariables($options);
        $qualifiersAction  = $this->collectQualifiers($options);
        $rawTransformation = ArrayUtils::pop($options, 'raw_transformation');

        $transformation = ArrayUtils::implodeFiltered(',', [$if, $variables, $qualifiersAction, $rawTransformation]);

        $baseTransformations[] = $transformation;

        return ArrayUtils::implodeUrl($baseTransformations);
    }

    /**
     * Collects transformation qualifiers from all options.
     *
     * @param array $options All options.
     *
     */
    protected function collectQualifiers(array $options): Action
    {
        $size = ArrayUtils::pop($options, 'size');
        if ($size) {
            [$options['width'], $options['height']] = explode('x', $size);
        }

        $offset = new Range(ArrayUtils::pop($options, 'offset'));
        if (! empty((string)$offset)) {
            $options['start_offset'] = $offset->startOffset;
            $options['end_offset']   = $offset->endOffset;
        }

        $qualifiers = [];
        foreach (array_intersect_key($options, self::QUALIFIERS) as $qualifierName => $qualifierValue) {
            ArrayUtils::appendNonEmpty($qualifiers, $this->buildQualifier($qualifierName, $qualifierValue));
        }

        return new Action(...array_values($qualifiers));
    }

    /**
     * Factory method for building qualifiers from their names and values.
     *
     * @param string|null $qualifierName  The qualifier name.
     * @param mixed       $qualifierValue The qualifier value.
     *
     */
    protected function buildQualifier(?string $qualifierName, mixed $qualifierValue): BaseAction|BaseQualifier|null
    {
        if (array_key_exists($qualifierName, self::SIMPLE_QUALIFIERS)) {
            $qualifierBuilderName = StringUtils::snakeCaseToCamelCase(
                ArrayUtils::get(self::SIMPLE_QUALIFIERS, $qualifierName) ?: $qualifierName
            );

            return Qualifier::$qualifierBuilderName($qualifierValue);
        }

        switch ($qualifierName) {
            case 'angle':
                return Angle::fromParams($qualifierValue);
            case 'border':
                return BorderQualifier::fromParams($qualifierValue);
            case 'effect':
                return Effect::fromParams($qualifierValue);
            case 'flags':
                return Qualifier::flag(implode('.', ArrayUtils::build($qualifierValue)));
            case 'custom_function':
                return CustomFunction::fromParams($qualifierValue);
            case 'custom_pre_function':
                return CustomFunction::fromParams($qualifierValue, true);
            case 'fps':
                return Fps::fromParams($qualifierValue);
            case 'overlay':
                return LayerQualifierFactory::fromParams($qualifierValue);
            case 'transformation':
                return Qualifier::namedTransformation(implode('.', ArrayUtils::build($qualifierValue)));
            case 'underlay':
                return LayerQualifierFactory::fromParams($qualifierValue, LayerStackPosition::UNDERLAY);
            case 'video_codec':
                return VideoCodec::fromParams($qualifierValue);
            default:
                return null;
        }
    }

    /**
     * Variables can be defined under 'variables' key or spread all over other qualifiers.
     *
     * Here we collect all the variables and sort them alphabetically (for consistency) and after that append all the
     * variables defined under 'variables' key (without sorting, order matters)
     *
     * @param array $options Transformation options
     *
     * @return string Serialized variables
     */
    protected function collectVariables(array $options): string
    {
        $variables = ArrayUtils::get($options, 'variables', []);

        $varQualifiers = [];
        foreach ($options as $key => $value) {
            if (Variable::isVariable($key)) {
                $varQualifiers[] = Variable::set($key, Expression::expression($value));
            }
        }

        sort($varQualifiers, SORT_STRING);

        // These variables are NOT sorted in alphabetic order
        if (! empty($variables)) {
            foreach ($variables as $key => $value) {
                $varQualifiers[] = Variable::set($key, Expression::expression($value));
            }
        }

        return ArrayUtils::implodeFiltered(',', $varQualifiers);
    }

    /**
     * Checks whether the candidate is a transformation component.
     *
     * @param mixed $candidate The candidate to check.
     *
     */
    private static function isTransformationComponent(mixed $candidate): bool
    {
        return $candidate instanceof BaseComponent;
    }

    /**
     * Checks whether the candidate is transformation.
     *
     * @param mixed $candidate The candidate to check.
     *
     */
    private static function isTransformation(mixed $candidate): bool
    {
        return is_array($candidate) || QualifiersAction::isTransformationComponent($candidate);
    }
}
