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

use UnexpectedValueException;

/**
 * Class ResizeFactory
 */
class ResizeFactory
{
    /**
     * @var array $resizeTypes Supported types of the resize.
     */
    private static array $resizeTypes = ['Scale', 'Crop', 'Pad', 'Fill', 'FillPad', 'Imagga']; // TODO: load this dynamically

    /**
     * @var array $resizeModes Supported resize(crop) modes.
     */
    private static array $resizeModes;

    /**
     * Populates resize (crop) modes.
     */
    private static function populateModes(): void
    {
        foreach (self::$resizeTypes as $type) {
            $typeClass = __NAMESPACE__ . "\\$type";

            $currTypeModes = get_class_methods($typeClass);

            foreach ($currTypeModes as $currModeVal) {
                self::$resizeModes[$currModeVal] = $type;
            }
        }
    }

    /**
     * Creates a Resize instance from mode name.
     *
     * @param string|CropMode $mode   The resize(crop) mode.
     * @param mixed|null      $width  Optional. Width.
     * @param mixed|null      $height Optional. Height.
     *
     */
    public static function createResize(CropMode|string $mode, mixed $width = null, mixed $height = null): BaseResizeAction
    {
        if (empty(self::$resizeModes)) {
            self::populateModes();
        }

        if (! array_key_exists($mode, self::$resizeModes)) {
            throw new UnexpectedValueException("Unsupported resize mode {$mode}");
        }

        $resizeType = __NAMESPACE__ . "\\" . self::$resizeModes[$mode];

        return new $resizeType($mode, $width, $height);
    }
}
