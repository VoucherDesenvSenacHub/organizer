<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Unit\Transformation\Image;

use Cloudinary\Test\TransformationTestCase;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Region;


/**
 * Class SampleTest
 */
final class GenerativeEffectTest extends TransformationTestCase
{
    public function testGenerativeRestore()
    {
        self::assertEquals(
            'e_gen_restore',
            (string)Effect::generativeRestore()
        );
    }

    public function testGenerativeRecolor()
    {
        self::assertEquals(
            'e_gen_recolor:prompt_(sweater;dog;earring);to-color_5632a8',
            (string)Effect::generativeRecolor(["sweater", "dog", "earring"], "5632a8")
        );

        self::assertEquals(
            'e_gen_recolor:multiple_true;prompt_tree;to-color_red',
            (string)Effect::generativeRecolor(["tree"], "red")->detectMultiple()
        );

        self::assertEquals(
            'e_gen_recolor:multiple_false;prompt_green tree;to-color_f0c',
            (string)Effect::generativeRecolor("green tree", "#f0c")->detectMultiple(false)
        );
    }

    public function testGenerativeRemove()
    {
        self::assertEquals(
            'e_gen_remove:prompt_(sweater;dog;earring)',
            (string)Effect::generativeRemove(["sweater", "dog", "earring"])
        );

        self::assertEquals(
            'e_gen_remove:region_(h_3500;w_1900;x_300;y_200)',
            (string)Effect::generativeRemove()->region(Region::rectangle(300, 200, 1900, 3500))
        );

        self::assertEquals(
            'e_gen_remove:region_((h_200;w_200;x_100;y_500);(h_50;w_50;x_1200;y_1500))',
            (string)Effect::generativeRemove()->region(
                Region::rectangle(100, 500, 200, 200),
                Region::rectangle(1200, 1500, 50, 50)
            )
        );

        self::assertEquals(
            'e_gen_remove:multiple_true;prompt_tree;remove-shadow_false',
            (string)Effect::generativeRemove(["tree"])->detectMultiple()->removeShadow(false)
        );

        self::assertEquals(
            'e_gen_remove:multiple_false;prompt_green tree;remove-shadow_true',
            (string)Effect::generativeRemove("green tree")->detectMultiple(false)->removeShadow()
        );
    }

    public function testGenerativeReplace()
    {
        self::assertEquals(
            'e_gen_replace:from_sunny sky;to_dark sky',
            (string)Effect::generativeReplace('sunny sky', 'dark sky')
        );

        self::assertEquals(
            'e_gen_replace:from_balloon;multiple_false;preserve-geometry_true;to_airplane',
            (string)Effect::generativeReplace('balloon', 'airplane')->preserveGeometry()->detectMultiple(false)
        );

        self::assertEquals(
            'e_gen_replace:from_balloon;multiple_true;preserve-geometry_false;to_airplane',
            (string)Effect::generativeReplace('balloon', 'airplane')->preserveGeometry(false)->detectMultiple()
        );
    }

    public function testGenerativeUpscale()
    {
        self::assertEquals(
            'e_upscale',
            (string)Effect::upscale()
        );
    }

    public function testGenerativeEnhance()
    {
        self::assertStrEquals(
            'e_enhance',
            Effect::enhance()
        );
    }
}
