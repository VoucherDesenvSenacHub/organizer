<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Argument;

use Cloudinary\StringUtils;

/**
 * Trait NamedColorTrait
 *
 * @api
 */
trait ColorTrait
{
    /**
     * Color snow.
     *
     */
    public static function snow(): static
    {
        return new static(Color::SNOW);
    }

    /**
     * Color snow1.
     *
     */
    public static function snow1(): static
    {
        return new static(Color::SNOW1);
    }

    /**
     * Color snow2.
     *
     */
    public static function snow2(): static
    {
        return new static(Color::SNOW2);
    }

    /**
     * Color rosybrown1.
     *
     */
    public static function rosybrown1(): static
    {
        return new static(Color::ROSYBROWN1);
    }

    /**
     * Color rosybrown2.
     *
     */
    public static function rosybrown2(): static
    {
        return new static(Color::ROSYBROWN2);
    }

    /**
     * Color snow3.
     *
     */
    public static function snow3(): static
    {
        return new static(Color::SNOW3);
    }

    /**
     * Color lightcoral.
     *
     */
    public static function lightcoral(): static
    {
        return new static(Color::LIGHTCORAL);
    }

    /**
     * Color indianred1.
     *
     */
    public static function indianred1(): static
    {
        return new static(Color::INDIANRED1);
    }

    /**
     * Color rosybrown3.
     *
     */
    public static function rosybrown3(): static
    {
        return new static(Color::ROSYBROWN3);
    }

    /**
     * Color indianred2.
     *
     */
    public static function indianred2(): static
    {
        return new static(Color::INDIANRED2);
    }

    /**
     * Color rosybrown.
     *
     */
    public static function rosybrown(): static
    {
        return new static(Color::ROSYBROWN);
    }

    /**
     * Color brown1.
     *
     */
    public static function brown1(): static
    {
        return new static(Color::BROWN1);
    }

    /**
     * Color firebrick1.
     *
     */
    public static function firebrick1(): static
    {
        return new static(Color::FIREBRICK1);
    }

    /**
     * Color brown2.
     *
     */
    public static function brown2(): static
    {
        return new static(Color::BROWN2);
    }

    /**
     * Color indianred.
     *
     */
    public static function indianred(): static
    {
        return new static(Color::INDIANRED);
    }

    /**
     * Color indianred3.
     *
     */
    public static function indianred3(): static
    {
        return new static(Color::INDIANRED3);
    }

    /**
     * Color firebrick2.
     *
     */
    public static function firebrick2(): static
    {
        return new static(Color::FIREBRICK2);
    }

    /**
     * Color snow4.
     *
     */
    public static function snow4(): static
    {
        return new static(Color::SNOW4);
    }

    /**
     * Color brown3.
     *
     */
    public static function brown3(): static
    {
        return new static(Color::BROWN3);
    }

    /**
     * Color red.
     *
     */
    public static function red(): static
    {
        return new static(Color::RED);
    }

    /**
     * Color red1.
     *
     */
    public static function red1(): static
    {
        return new static(Color::RED1);
    }

    /**
     * Color rosybrown4.
     *
     */
    public static function rosybrown4(): static
    {
        return new static(Color::ROSYBROWN4);
    }

    /**
     * Color firebrick3.
     *
     */
    public static function firebrick3(): static
    {
        return new static(Color::FIREBRICK3);
    }

    /**
     * Color red2.
     *
     */
    public static function red2(): static
    {
        return new static(Color::RED2);
    }

    /**
     * Color firebrick.
     *
     */
    public static function firebrick(): static
    {
        return new static(Color::FIREBRICK);
    }

    /**
     * Color brown.
     *
     */
    public static function brown(): static
    {
        return new static(Color::BROWN);
    }

    /**
     * Color red3.
     *
     */
    public static function red3(): static
    {
        return new static(Color::RED3);
    }

    /**
     * Color indianred4.
     *
     */
    public static function indianred4(): static
    {
        return new static(Color::INDIANRED4);
    }

    /**
     * Color brown4.
     *
     */
    public static function brown4(): static
    {
        return new static(Color::BROWN4);
    }

    /**
     * Color firebrick4.
     *
     */
    public static function firebrick4(): static
    {
        return new static(Color::FIREBRICK4);
    }

    /**
     * Color darkred.
     *
     */
    public static function darkred(): static
    {
        return new static(Color::DARKRED);
    }

    /**
     * Color red4.
     *
     */
    public static function red4(): static
    {
        return new static(Color::RED4);
    }

    /**
     * Color lightpink1.
     *
     */
    public static function lightpink1(): static
    {
        return new static(Color::LIGHTPINK1);
    }

    /**
     * Color lightpink3.
     *
     */
    public static function lightpink3(): static
    {
        return new static(Color::LIGHTPINK3);
    }

    /**
     * Color lightpink4.
     *
     */
    public static function lightpink4(): static
    {
        return new static(Color::LIGHTPINK4);
    }

    /**
     * Color lightpink2.
     *
     */
    public static function lightpink2(): static
    {
        return new static(Color::LIGHTPINK2);
    }

    /**
     * Color lightpink.
     *
     */
    public static function lightpink(): static
    {
        return new static(Color::LIGHTPINK);
    }

    /**
     * Color pink.
     *
     */
    public static function pink(): static
    {
        return new static(Color::PINK);
    }

    /**
     * Color crimson.
     *
     */
    public static function crimson(): static
    {
        return new static(Color::CRIMSON);
    }

    /**
     * Color pink1.
     *
     */
    public static function pink1(): static
    {
        return new static(Color::PINK1);
    }

    /**
     * Color pink2.
     *
     */
    public static function pink2(): static
    {
        return new static(Color::PINK2);
    }

    /**
     * Color pink3.
     *
     */
    public static function pink3(): static
    {
        return new static(Color::PINK3);
    }

    /**
     * Color pink4.
     *
     */
    public static function pink4(): static
    {
        return new static(Color::PINK4);
    }

    /**
     * Color palevioletred4.
     *
     */
    public static function palevioletred4(): static
    {
        return new static(Color::PALEVIOLETRED4);
    }

    /**
     * Color palevioletred.
     *
     */
    public static function palevioletred(): static
    {
        return new static(Color::PALEVIOLETRED);
    }

    /**
     * Color palevioletred2.
     *
     */
    public static function palevioletred2(): static
    {
        return new static(Color::PALEVIOLETRED2);
    }

    /**
     * Color palevioletred1.
     *
     */
    public static function palevioletred1(): static
    {
        return new static(Color::PALEVIOLETRED1);
    }

    /**
     * Color palevioletred3.
     *
     */
    public static function palevioletred3(): static
    {
        return new static(Color::PALEVIOLETRED3);
    }

    /**
     * Color lavenderblush.
     *
     */
    public static function lavenderblush(): static
    {
        return new static(Color::LAVENDERBLUSH);
    }

    /**
     * Color lavenderblush1.
     *
     */
    public static function lavenderblush1(): static
    {
        return new static(Color::LAVENDERBLUSH1);
    }

    /**
     * Color lavenderblush3.
     *
     */
    public static function lavenderblush3(): static
    {
        return new static(Color::LAVENDERBLUSH3);
    }

    /**
     * Color lavenderblush2.
     *
     */
    public static function lavenderblush2(): static
    {
        return new static(Color::LAVENDERBLUSH2);
    }

    /**
     * Color lavenderblush4.
     *
     */
    public static function lavenderblush4(): static
    {
        return new static(Color::LAVENDERBLUSH4);
    }

    /**
     * Color maroon.
     *
     */
    public static function maroon(): static
    {
        return new static(Color::MAROON);
    }

    /**
     * Color hotpink3.
     *
     */
    public static function hotpink3(): static
    {
        return new static(Color::HOTPINK3);
    }

    /**
     * Color violetred3.
     *
     */
    public static function violetred3(): static
    {
        return new static(Color::VIOLETRED3);
    }

    /**
     * Color violetred1.
     *
     */
    public static function violetred1(): static
    {
        return new static(Color::VIOLETRED1);
    }

    /**
     * Color violetred2.
     *
     */
    public static function violetred2(): static
    {
        return new static(Color::VIOLETRED2);
    }

    /**
     * Color violetred4.
     *
     */
    public static function violetred4(): static
    {
        return new static(Color::VIOLETRED4);
    }

    /**
     * Color hotpink2.
     *
     */
    public static function hotpink2(): static
    {
        return new static(Color::HOTPINK2);
    }

    /**
     * Color hotpink1.
     *
     */
    public static function hotpink1(): static
    {
        return new static(Color::HOTPINK1);
    }

    /**
     * Color hotpink4.
     *
     */
    public static function hotpink4(): static
    {
        return new static(Color::HOTPINK4);
    }

    /**
     * Color hotpink.
     *
     */
    public static function hotpink(): static
    {
        return new static(Color::HOTPINK);
    }

    /**
     * Color deeppink.
     *
     */
    public static function deeppink(): static
    {
        return new static(Color::DEEPPINK);
    }

    /**
     * Color deeppink1.
     *
     */
    public static function deeppink1(): static
    {
        return new static(Color::DEEPPINK1);
    }

    /**
     * Color deeppink2.
     *
     */
    public static function deeppink2(): static
    {
        return new static(Color::DEEPPINK2);
    }

    /**
     * Color deeppink3.
     *
     */
    public static function deeppink3(): static
    {
        return new static(Color::DEEPPINK3);
    }

    /**
     * Color deeppink4.
     *
     */
    public static function deeppink4(): static
    {
        return new static(Color::DEEPPINK4);
    }

    /**
     * Color maroon1.
     *
     */
    public static function maroon1(): static
    {
        return new static(Color::MAROON1);
    }

    /**
     * Color maroon2.
     *
     */
    public static function maroon2(): static
    {
        return new static(Color::MAROON2);
    }

    /**
     * Color maroon3.
     *
     */
    public static function maroon3(): static
    {
        return new static(Color::MAROON3);
    }

    /**
     * Color maroon4.
     *
     */
    public static function maroon4(): static
    {
        return new static(Color::MAROON4);
    }

    /**
     * Color mediumvioletred.
     *
     */
    public static function mediumvioletred(): static
    {
        return new static(Color::MEDIUMVIOLETRED);
    }

    /**
     * Color violetred.
     *
     */
    public static function violetred(): static
    {
        return new static(Color::VIOLETRED);
    }

    /**
     * Color orchid2.
     *
     */
    public static function orchid2(): static
    {
        return new static(Color::ORCHID2);
    }

    /**
     * Color orchid.
     *
     */
    public static function orchid(): static
    {
        return new static(Color::ORCHID);
    }

    /**
     * Color orchid1.
     *
     */
    public static function orchid1(): static
    {
        return new static(Color::ORCHID1);
    }

    /**
     * Color orchid3.
     *
     */
    public static function orchid3(): static
    {
        return new static(Color::ORCHID3);
    }

    /**
     * Color orchid4.
     *
     */
    public static function orchid4(): static
    {
        return new static(Color::ORCHID4);
    }

    /**
     * Color thistle1.
     *
     */
    public static function thistle1(): static
    {
        return new static(Color::THISTLE1);
    }

    /**
     * Color thistle2.
     *
     */
    public static function thistle2(): static
    {
        return new static(Color::THISTLE2);
    }

    /**
     * Color plum1.
     *
     */
    public static function plum1(): static
    {
        return new static(Color::PLUM1);
    }

    /**
     * Color plum2.
     *
     */
    public static function plum2(): static
    {
        return new static(Color::PLUM2);
    }

    /**
     * Color thistle.
     *
     */
    public static function thistle(): static
    {
        return new static(Color::THISTLE);
    }

    /**
     * Color thistle3.
     *
     */
    public static function thistle3(): static
    {
        return new static(Color::THISTLE3);
    }

    /**
     * Color plum.
     *
     */
    public static function plum(): static
    {
        return new static(Color::PLUM);
    }

    /**
     * Color violet.
     *
     */
    public static function violet(): static
    {
        return new static(Color::VIOLET);
    }

    /**
     * Color plum3.
     *
     */
    public static function plum3(): static
    {
        return new static(Color::PLUM3);
    }

    /**
     * Color thistle4.
     *
     */
    public static function thistle4(): static
    {
        return new static(Color::THISTLE4);
    }

    /**
     * Color fuchsia.
     *
     */
    public static function fuchsia(): static
    {
        return new static(Color::FUCHSIA);
    }

    /**
     * Color magenta.
     *
     */
    public static function magenta(): static
    {
        return new static(Color::MAGENTA);
    }

    /**
     * Color magenta1.
     *
     */
    public static function magenta1(): static
    {
        return new static(Color::MAGENTA1);
    }

    /**
     * Color plum4.
     *
     */
    public static function plum4(): static
    {
        return new static(Color::PLUM4);
    }

    /**
     * Color magenta2.
     *
     */
    public static function magenta2(): static
    {
        return new static(Color::MAGENTA2);
    }

    /**
     * Color magenta3.
     *
     */
    public static function magenta3(): static
    {
        return new static(Color::MAGENTA3);
    }

    /**
     * Color darkmagenta.
     *
     */
    public static function darkmagenta(): static
    {
        return new static(Color::DARKMAGENTA);
    }

    /**
     * Color magenta4.
     *
     */
    public static function magenta4(): static
    {
        return new static(Color::MAGENTA4);
    }

    /**
     * Color purple.
     *
     */
    public static function purple(): static
    {
        return new static(Color::PURPLE);
    }

    /**
     * Color mediumorchid.
     *
     */
    public static function mediumorchid(): static
    {
        return new static(Color::MEDIUMORCHID);
    }

    /**
     * Color mediumorchid1.
     *
     */
    public static function mediumorchid1(): static
    {
        return new static(Color::MEDIUMORCHID1);
    }

    /**
     * Color mediumorchid2.
     *
     */
    public static function mediumorchid2(): static
    {
        return new static(Color::MEDIUMORCHID2);
    }

    /**
     * Color mediumorchid3.
     *
     */
    public static function mediumorchid3(): static
    {
        return new static(Color::MEDIUMORCHID3);
    }

    /**
     * Color mediumorchid4.
     *
     */
    public static function mediumorchid4(): static
    {
        return new static(Color::MEDIUMORCHID4);
    }

    /**
     * Color darkviolet.
     *
     */
    public static function darkviolet(): static
    {
        return new static(Color::DARKVIOLET);
    }

    /**
     * Color darkorchid.
     *
     */
    public static function darkorchid(): static
    {
        return new static(Color::DARKORCHID);
    }

    /**
     * Color darkorchid1.
     *
     */
    public static function darkorchid1(): static
    {
        return new static(Color::DARKORCHID1);
    }

    /**
     * Color darkorchid3.
     *
     */
    public static function darkorchid3(): static
    {
        return new static(Color::DARKORCHID3);
    }

    /**
     * Color darkorchid2.
     *
     */
    public static function darkorchid2(): static
    {
        return new static(Color::DARKORCHID2);
    }

    /**
     * Color darkorchid4.
     *
     */
    public static function darkorchid4(): static
    {
        return new static(Color::DARKORCHID4);
    }

    /**
     * Color indigo.
     *
     */
    public static function indigo(): static
    {
        return new static(Color::INDIGO);
    }

    /**
     * Color blueviolet.
     *
     */
    public static function blueviolet(): static
    {
        return new static(Color::BLUEVIOLET);
    }

    /**
     * Color purple2.
     *
     */
    public static function purple2(): static
    {
        return new static(Color::PURPLE2);
    }

    /**
     * Color purple3.
     *
     */
    public static function purple3(): static
    {
        return new static(Color::PURPLE3);
    }

    /**
     * Color purple4.
     *
     */
    public static function purple4(): static
    {
        return new static(Color::PURPLE4);
    }

    /**
     * Color purple1.
     *
     */
    public static function purple1(): static
    {
        return new static(Color::PURPLE1);
    }

    /**
     * Color mediumpurple.
     *
     */
    public static function mediumpurple(): static
    {
        return new static(Color::MEDIUMPURPLE);
    }

    /**
     * Color mediumpurple1.
     *
     */
    public static function mediumpurple1(): static
    {
        return new static(Color::MEDIUMPURPLE1);
    }

    /**
     * Color mediumpurple2.
     *
     */
    public static function mediumpurple2(): static
    {
        return new static(Color::MEDIUMPURPLE2);
    }

    /**
     * Color mediumpurple3.
     *
     */
    public static function mediumpurple3(): static
    {
        return new static(Color::MEDIUMPURPLE3);
    }

    /**
     * Color mediumpurple4.
     *
     */
    public static function mediumpurple4(): static
    {
        return new static(Color::MEDIUMPURPLE4);
    }

    /**
     * Color darkslateblue.
     *
     */
    public static function darkslateblue(): static
    {
        return new static(Color::DARKSLATEBLUE);
    }

    /**
     * Color lightslateblue.
     *
     */
    public static function lightslateblue(): static
    {
        return new static(Color::LIGHTSLATEBLUE);
    }

    /**
     * Color mediumslateblue.
     *
     */
    public static function mediumslateblue(): static
    {
        return new static(Color::MEDIUMSLATEBLUE);
    }

    /**
     * Color slateblue.
     *
     */
    public static function slateblue(): static
    {
        return new static(Color::SLATEBLUE);
    }

    /**
     * Color slateblue1.
     *
     */
    public static function slateblue1(): static
    {
        return new static(Color::SLATEBLUE1);
    }

    /**
     * Color slateblue2.
     *
     */
    public static function slateblue2(): static
    {
        return new static(Color::SLATEBLUE2);
    }

    /**
     * Color slateblue3.
     *
     */
    public static function slateblue3(): static
    {
        return new static(Color::SLATEBLUE3);
    }

    /**
     * Color slateblue4.
     *
     */
    public static function slateblue4(): static
    {
        return new static(Color::SLATEBLUE4);
    }

    /**
     * Color ghostwhite.
     *
     */
    public static function ghostwhite(): static
    {
        return new static(Color::GHOSTWHITE);
    }

    /**
     * Color lavender.
     *
     */
    public static function lavender(): static
    {
        return new static(Color::LAVENDER);
    }

    /**
     * Color blue.
     *
     */
    public static function blue(): static
    {
        return new static(Color::BLUE);
    }

    /**
     * Color blue1.
     *
     */
    public static function blue1(): static
    {
        return new static(Color::BLUE1);
    }

    /**
     * Color blue2.
     *
     */
    public static function blue2(): static
    {
        return new static(Color::BLUE2);
    }

    /**
     * Color blue3.
     *
     */
    public static function blue3(): static
    {
        return new static(Color::BLUE3);
    }

    /**
     * Color mediumblue.
     *
     */
    public static function mediumblue(): static
    {
        return new static(Color::MEDIUMBLUE);
    }

    /**
     * Color blue4.
     *
     */
    public static function blue4(): static
    {
        return new static(Color::BLUE4);
    }

    /**
     * Color darkblue.
     *
     */
    public static function darkblue(): static
    {
        return new static(Color::DARKBLUE);
    }

    /**
     * Color midnightblue.
     *
     */
    public static function midnightblue(): static
    {
        return new static(Color::MIDNIGHTBLUE);
    }

    /**
     * Color navy.
     *
     */
    public static function navy(): static
    {
        return new static(Color::NAVY);
    }

    /**
     * Color navyblue.
     *
     */
    public static function navyblue(): static
    {
        return new static(Color::NAVYBLUE);
    }

    /**
     * Color royalblue.
     *
     */
    public static function royalblue(): static
    {
        return new static(Color::ROYALBLUE);
    }

    /**
     * Color royalblue1.
     *
     */
    public static function royalblue1(): static
    {
        return new static(Color::ROYALBLUE1);
    }

    /**
     * Color royalblue2.
     *
     */
    public static function royalblue2(): static
    {
        return new static(Color::ROYALBLUE2);
    }

    /**
     * Color royalblue3.
     *
     */
    public static function royalblue3(): static
    {
        return new static(Color::ROYALBLUE3);
    }

    /**
     * Color royalblue4.
     *
     */
    public static function royalblue4(): static
    {
        return new static(Color::ROYALBLUE4);
    }

    /**
     * Color cornflowerblue.
     *
     */
    public static function cornflowerblue(): static
    {
        return new static(Color::CORNFLOWERBLUE);
    }

    /**
     * Color lightsteelblue.
     *
     */
    public static function lightsteelblue(): static
    {
        return new static(Color::LIGHTSTEELBLUE);
    }

    /**
     * Color lightsteelblue1.
     *
     */
    public static function lightsteelblue1(): static
    {
        return new static(Color::LIGHTSTEELBLUE1);
    }

    /**
     * Color lightsteelblue2.
     *
     */
    public static function lightsteelblue2(): static
    {
        return new static(Color::LIGHTSTEELBLUE2);
    }

    /**
     * Color lightsteelblue3.
     *
     */
    public static function lightsteelblue3(): static
    {
        return new static(Color::LIGHTSTEELBLUE3);
    }

    /**
     * Color lightsteelblue4.
     *
     */
    public static function lightsteelblue4(): static
    {
        return new static(Color::LIGHTSTEELBLUE4);
    }

    /**
     * Color slategray4.
     *
     */
    public static function slategray4(): static
    {
        return new static(Color::SLATEGRAY4);
    }

    /**
     * Color slategray1.
     *
     */
    public static function slategray1(): static
    {
        return new static(Color::SLATEGRAY1);
    }

    /**
     * Color slategray2.
     *
     */
    public static function slategray2(): static
    {
        return new static(Color::SLATEGRAY2);
    }

    /**
     * Color slategray3.
     *
     */
    public static function slategray3(): static
    {
        return new static(Color::SLATEGRAY3);
    }

    /**
     * Color lightslategray.
     *
     */
    public static function lightslategray(): static
    {
        return new static(Color::LIGHTSLATEGRAY);
    }

    /**
     * Color lightslategrey.
     *
     */
    public static function lightslategrey(): static
    {
        return new static(Color::LIGHTSLATEGREY);
    }

    /**
     * Color slategray.
     *
     */
    public static function slategray(): static
    {
        return new static(Color::SLATEGRAY);
    }

    /**
     * Color slategrey.
     *
     */
    public static function slategrey(): static
    {
        return new static(Color::SLATEGREY);
    }

    /**
     * Color dodgerblue.
     *
     */
    public static function dodgerblue(): static
    {
        return new static(Color::DODGERBLUE);
    }

    /**
     * Color dodgerblue1.
     *
     */
    public static function dodgerblue1(): static
    {
        return new static(Color::DODGERBLUE1);
    }

    /**
     * Color dodgerblue2.
     *
     */
    public static function dodgerblue2(): static
    {
        return new static(Color::DODGERBLUE2);
    }

    /**
     * Color dodgerblue4.
     *
     */
    public static function dodgerblue4(): static
    {
        return new static(Color::DODGERBLUE4);
    }

    /**
     * Color dodgerblue3.
     *
     */
    public static function dodgerblue3(): static
    {
        return new static(Color::DODGERBLUE3);
    }

    /**
     * Color aliceblue.
     *
     */
    public static function aliceblue(): static
    {
        return new static(Color::ALICEBLUE);
    }

    /**
     * Color steelblue4.
     *
     */
    public static function steelblue4(): static
    {
        return new static(Color::STEELBLUE4);
    }

    /**
     * Color steelblue.
     *
     */
    public static function steelblue(): static
    {
        return new static(Color::STEELBLUE);
    }

    /**
     * Color steelblue1.
     *
     */
    public static function steelblue1(): static
    {
        return new static(Color::STEELBLUE1);
    }

    /**
     * Color steelblue2.
     *
     */
    public static function steelblue2(): static
    {
        return new static(Color::STEELBLUE2);
    }

    /**
     * Color steelblue3.
     *
     */
    public static function steelblue3(): static
    {
        return new static(Color::STEELBLUE3);
    }

    /**
     * Color skyblue4.
     *
     */
    public static function skyblue4(): static
    {
        return new static(Color::SKYBLUE4);
    }

    /**
     * Color skyblue1.
     *
     */
    public static function skyblue1(): static
    {
        return new static(Color::SKYBLUE1);
    }

    /**
     * Color skyblue2.
     *
     */
    public static function skyblue2(): static
    {
        return new static(Color::SKYBLUE2);
    }

    /**
     * Color skyblue3.
     *
     */
    public static function skyblue3(): static
    {
        return new static(Color::SKYBLUE3);
    }

    /**
     * Color lightskyblue.
     *
     */
    public static function lightskyblue(): static
    {
        return new static(Color::LIGHTSKYBLUE);
    }

    /**
     * Color lightskyblue4.
     *
     */
    public static function lightskyblue4(): static
    {
        return new static(Color::LIGHTSKYBLUE4);
    }

    /**
     * Color lightskyblue1.
     *
     */
    public static function lightskyblue1(): static
    {
        return new static(Color::LIGHTSKYBLUE1);
    }

    /**
     * Color lightskyblue2.
     *
     */
    public static function lightskyblue2(): static
    {
        return new static(Color::LIGHTSKYBLUE2);
    }

    /**
     * Color lightskyblue3.
     *
     */
    public static function lightskyblue3(): static
    {
        return new static(Color::LIGHTSKYBLUE3);
    }

    /**
     * Color skyblue.
     *
     */
    public static function skyblue(): static
    {
        return new static(Color::SKYBLUE);
    }

    /**
     * Color lightblue3.
     *
     */
    public static function lightblue3(): static
    {
        return new static(Color::LIGHTBLUE3);
    }

    /**
     * Color deepskyblue.
     *
     */
    public static function deepskyblue(): static
    {
        return new static(Color::DEEPSKYBLUE);
    }

    /**
     * Color deepskyblue1.
     *
     */
    public static function deepskyblue1(): static
    {
        return new static(Color::DEEPSKYBLUE1);
    }

    /**
     * Color deepskyblue2.
     *
     */
    public static function deepskyblue2(): static
    {
        return new static(Color::DEEPSKYBLUE2);
    }

    /**
     * Color deepskyblue4.
     *
     */
    public static function deepskyblue4(): static
    {
        return new static(Color::DEEPSKYBLUE4);
    }

    /**
     * Color deepskyblue3.
     *
     */
    public static function deepskyblue3(): static
    {
        return new static(Color::DEEPSKYBLUE3);
    }

    /**
     * Color lightblue1.
     *
     */
    public static function lightblue1(): static
    {
        return new static(Color::LIGHTBLUE1);
    }

    /**
     * Color lightblue2.
     *
     */
    public static function lightblue2(): static
    {
        return new static(Color::LIGHTBLUE2);
    }

    /**
     * Color lightblue.
     *
     */
    public static function lightblue(): static
    {
        return new static(Color::LIGHTBLUE);
    }

    /**
     * Color lightblue4.
     *
     */
    public static function lightblue4(): static
    {
        return new static(Color::LIGHTBLUE4);
    }

    /**
     * Color powderblue.
     *
     */
    public static function powderblue(): static
    {
        return new static(Color::POWDERBLUE);
    }

    /**
     * Color cadetblue1.
     *
     */
    public static function cadetblue1(): static
    {
        return new static(Color::CADETBLUE1);
    }

    /**
     * Color cadetblue2.
     *
     */
    public static function cadetblue2(): static
    {
        return new static(Color::CADETBLUE2);
    }

    /**
     * Color cadetblue3.
     *
     */
    public static function cadetblue3(): static
    {
        return new static(Color::CADETBLUE3);
    }

    /**
     * Color cadetblue4.
     *
     */
    public static function cadetblue4(): static
    {
        return new static(Color::CADETBLUE4);
    }

    /**
     * Color turquoise1.
     *
     */
    public static function turquoise1(): static
    {
        return new static(Color::TURQUOISE1);
    }

    /**
     * Color turquoise2.
     *
     */
    public static function turquoise2(): static
    {
        return new static(Color::TURQUOISE2);
    }

    /**
     * Color turquoise3.
     *
     */
    public static function turquoise3(): static
    {
        return new static(Color::TURQUOISE3);
    }

    /**
     * Color turquoise4.
     *
     */
    public static function turquoise4(): static
    {
        return new static(Color::TURQUOISE4);
    }

    /**
     * Color cadetblue.
     *
     */
    public static function cadetblue(): static
    {
        return new static(Color::CADETBLUE);
    }

    /**
     * Color darkturquoise.
     *
     */
    public static function darkturquoise(): static
    {
        return new static(Color::DARKTURQUOISE);
    }

    /**
     * Color azure.
     *
     */
    public static function azure(): static
    {
        return new static(Color::AZURE);
    }

    /**
     * Color azure1.
     *
     */
    public static function azure1(): static
    {
        return new static(Color::AZURE1);
    }

    /**
     * Color lightcyan1.
     *
     */
    public static function lightcyan1(): static
    {
        return new static(Color::LIGHTCYAN1);
    }

    /**
     * Color lightcyan.
     *
     */
    public static function lightcyan(): static
    {
        return new static(Color::LIGHTCYAN);
    }

    /**
     * Color azure2.
     *
     */
    public static function azure2(): static
    {
        return new static(Color::AZURE2);
    }

    /**
     * Color lightcyan2.
     *
     */
    public static function lightcyan2(): static
    {
        return new static(Color::LIGHTCYAN2);
    }

    /**
     * Color paleturquoise1.
     *
     */
    public static function paleturquoise1(): static
    {
        return new static(Color::PALETURQUOISE1);
    }

    /**
     * Color paleturquoise.
     *
     */
    public static function paleturquoise(): static
    {
        return new static(Color::PALETURQUOISE);
    }

    /**
     * Color paleturquoise2.
     *
     */
    public static function paleturquoise2(): static
    {
        return new static(Color::PALETURQUOISE2);
    }

    /**
     * Color darkslategray1.
     *
     */
    public static function darkslategray1(): static
    {
        return new static(Color::DARKSLATEGRAY1);
    }

    /**
     * Color azure3.
     *
     */
    public static function azure3(): static
    {
        return new static(Color::AZURE3);
    }

    /**
     * Color lightcyan3.
     *
     */
    public static function lightcyan3(): static
    {
        return new static(Color::LIGHTCYAN3);
    }

    /**
     * Color darkslategray2.
     *
     */
    public static function darkslategray2(): static
    {
        return new static(Color::DARKSLATEGRAY2);
    }

    /**
     * Color paleturquoise3.
     *
     */
    public static function paleturquoise3(): static
    {
        return new static(Color::PALETURQUOISE3);
    }

    /**
     * Color darkslategray3.
     *
     */
    public static function darkslategray3(): static
    {
        return new static(Color::DARKSLATEGRAY3);
    }

    /**
     * Color azure4.
     *
     */
    public static function azure4(): static
    {
        return new static(Color::AZURE4);
    }

    /**
     * Color lightcyan4.
     *
     */
    public static function lightcyan4(): static
    {
        return new static(Color::LIGHTCYAN4);
    }

    /**
     * Color aqua.
     *
     */
    public static function aqua(): static
    {
        return new static(Color::AQUA);
    }

    /**
     * Color cyan.
     *
     */
    public static function cyan(): static
    {
        return new static(Color::CYAN);
    }

    /**
     * Color cyan1.
     *
     */
    public static function cyan1(): static
    {
        return new static(Color::CYAN1);
    }

    /**
     * Color paleturquoise4.
     *
     */
    public static function paleturquoise4(): static
    {
        return new static(Color::PALETURQUOISE4);
    }

    /**
     * Color cyan2.
     *
     */
    public static function cyan2(): static
    {
        return new static(Color::CYAN2);
    }

    /**
     * Color darkslategray4.
     *
     */
    public static function darkslategray4(): static
    {
        return new static(Color::DARKSLATEGRAY4);
    }

    /**
     * Color cyan3.
     *
     */
    public static function cyan3(): static
    {
        return new static(Color::CYAN3);
    }

    /**
     * Color cyan4.
     *
     */
    public static function cyan4(): static
    {
        return new static(Color::CYAN4);
    }

    /**
     * Color darkcyan.
     *
     */
    public static function darkcyan(): static
    {
        return new static(Color::DARKCYAN);
    }

    /**
     * Color teal.
     *
     */
    public static function teal(): static
    {
        return new static(Color::TEAL);
    }

    /**
     * Color darkslategray.
     *
     */
    public static function darkslategray(): static
    {
        return new static(Color::DARKSLATEGRAY);
    }

    /**
     * Color darkslategrey.
     *
     */
    public static function darkslategrey(): static
    {
        return new static(Color::DARKSLATEGREY);
    }

    /**
     * Color mediumturquoise.
     *
     */
    public static function mediumturquoise(): static
    {
        return new static(Color::MEDIUMTURQUOISE);
    }

    /**
     * Color lightseagreen.
     *
     */
    public static function lightseagreen(): static
    {
        return new static(Color::LIGHTSEAGREEN);
    }

    /**
     * Color turquoise.
     *
     */
    public static function turquoise(): static
    {
        return new static(Color::TURQUOISE);
    }

    /**
     * Color aquamarine4.
     *
     */
    public static function aquamarine4(): static
    {
        return new static(Color::AQUAMARINE4);
    }

    /**
     * Color aquamarine.
     *
     */
    public static function aquamarine(): static
    {
        return new static(Color::AQUAMARINE);
    }

    /**
     * Color aquamarine1.
     *
     */
    public static function aquamarine1(): static
    {
        return new static(Color::AQUAMARINE1);
    }

    /**
     * Color aquamarine2.
     *
     */
    public static function aquamarine2(): static
    {
        return new static(Color::AQUAMARINE2);
    }

    /**
     * Color aquamarine3.
     *
     */
    public static function aquamarine3(): static
    {
        return new static(Color::AQUAMARINE3);
    }

    /**
     * Color mediumaquamarine.
     *
     */
    public static function mediumaquamarine(): static
    {
        return new static(Color::MEDIUMAQUAMARINE);
    }

    /**
     * Color mediumspringgreen.
     *
     */
    public static function mediumspringgreen(): static
    {
        return new static(Color::MEDIUMSPRINGGREEN);
    }

    /**
     * Color mintcream.
     *
     */
    public static function mintcream(): static
    {
        return new static(Color::MINTCREAM);
    }

    /**
     * Color springgreen.
     *
     */
    public static function springgreen(): static
    {
        return new static(Color::SPRINGGREEN);
    }

    /**
     * Color springgreen1.
     *
     */
    public static function springgreen1(): static
    {
        return new static(Color::SPRINGGREEN1);
    }

    /**
     * Color springgreen2.
     *
     */
    public static function springgreen2(): static
    {
        return new static(Color::SPRINGGREEN2);
    }

    /**
     * Color springgreen3.
     *
     */
    public static function springgreen3(): static
    {
        return new static(Color::SPRINGGREEN3);
    }

    /**
     * Color springgreen4.
     *
     */
    public static function springgreen4(): static
    {
        return new static(Color::SPRINGGREEN4);
    }

    /**
     * Color mediumseagreen.
     *
     */
    public static function mediumseagreen(): static
    {
        return new static(Color::MEDIUMSEAGREEN);
    }

    /**
     * Color seagreen.
     *
     */
    public static function seagreen(): static
    {
        return new static(Color::SEAGREEN);
    }

    /**
     * Color seagreen3.
     *
     */
    public static function seagreen3(): static
    {
        return new static(Color::SEAGREEN3);
    }

    /**
     * Color seagreen1.
     *
     */
    public static function seagreen1(): static
    {
        return new static(Color::SEAGREEN1);
    }

    /**
     * Color seagreen4.
     *
     */
    public static function seagreen4(): static
    {
        return new static(Color::SEAGREEN4);
    }

    /**
     * Color seagreen2.
     *
     */
    public static function seagreen2(): static
    {
        return new static(Color::SEAGREEN2);
    }

    /**
     * Color mediumforestgreen.
     *
     */
    public static function mediumforestgreen(): static
    {
        return new static(Color::MEDIUMFORESTGREEN);
    }

    /**
     * Color honeydew.
     *
     */
    public static function honeydew(): static
    {
        return new static(Color::HONEYDEW);
    }

    /**
     * Color honeydew1.
     *
     */
    public static function honeydew1(): static
    {
        return new static(Color::HONEYDEW1);
    }

    /**
     * Color honeydew2.
     *
     */
    public static function honeydew2(): static
    {
        return new static(Color::HONEYDEW2);
    }

    /**
     * Color darkseagreen1.
     *
     */
    public static function darkseagreen1(): static
    {
        return new static(Color::DARKSEAGREEN1);
    }

    /**
     * Color darkseagreen2.
     *
     */
    public static function darkseagreen2(): static
    {
        return new static(Color::DARKSEAGREEN2);
    }

    /**
     * Color palegreen1.
     *
     */
    public static function palegreen1(): static
    {
        return new static(Color::PALEGREEN1);
    }

    /**
     * Color palegreen.
     *
     */
    public static function palegreen(): static
    {
        return new static(Color::PALEGREEN);
    }

    /**
     * Color honeydew3.
     *
     */
    public static function honeydew3(): static
    {
        return new static(Color::HONEYDEW3);
    }

    /**
     * Color lightgreen.
     *
     */
    public static function lightgreen(): static
    {
        return new static(Color::LIGHTGREEN);
    }

    /**
     * Color palegreen2.
     *
     */
    public static function palegreen2(): static
    {
        return new static(Color::PALEGREEN2);
    }

    /**
     * Color darkseagreen3.
     *
     */
    public static function darkseagreen3(): static
    {
        return new static(Color::DARKSEAGREEN3);
    }

    /**
     * Color darkseagreen.
     *
     */
    public static function darkseagreen(): static
    {
        return new static(Color::DARKSEAGREEN);
    }

    /**
     * Color palegreen3.
     *
     */
    public static function palegreen3(): static
    {
        return new static(Color::PALEGREEN3);
    }

    /**
     * Color honeydew4.
     *
     */
    public static function honeydew4(): static
    {
        return new static(Color::HONEYDEW4);
    }

    /**
     * Color green1.
     *
     */
    public static function green1(): static
    {
        return new static(Color::GREEN1);
    }

    /**
     * Color lime.
     *
     */
    public static function lime(): static
    {
        return new static(Color::LIME);
    }

    /**
     * Color limegreen.
     *
     */
    public static function limegreen(): static
    {
        return new static(Color::LIMEGREEN);
    }

    /**
     * Color darkseagreen4.
     *
     */
    public static function darkseagreen4(): static
    {
        return new static(Color::DARKSEAGREEN4);
    }

    /**
     * Color green2.
     *
     */
    public static function green2(): static
    {
        return new static(Color::GREEN2);
    }

    /**
     * Color palegreen4.
     *
     */
    public static function palegreen4(): static
    {
        return new static(Color::PALEGREEN4);
    }

    /**
     * Color green3.
     *
     */
    public static function green3(): static
    {
        return new static(Color::GREEN3);
    }

    /**
     * Color forestgreen.
     *
     */
    public static function forestgreen(): static
    {
        return new static(Color::FORESTGREEN);
    }

    /**
     * Color green4.
     *
     */
    public static function green4(): static
    {
        return new static(Color::GREEN4);
    }

    /**
     * Color green.
     *
     */
    public static function green(): static
    {
        return new static(Color::GREEN);
    }

    /**
     * Color darkgreen.
     *
     */
    public static function darkgreen(): static
    {
        return new static(Color::DARKGREEN);
    }

    /**
     * Color lawngreen.
     *
     */
    public static function lawngreen(): static
    {
        return new static(Color::LAWNGREEN);
    }

    /**
     * Color chartreuse.
     *
     */
    public static function chartreuse(): static
    {
        return new static(Color::CHARTREUSE);
    }

    /**
     * Color chartreuse1.
     *
     */
    public static function chartreuse1(): static
    {
        return new static(Color::CHARTREUSE1);
    }

    /**
     * Color chartreuse2.
     *
     */
    public static function chartreuse2(): static
    {
        return new static(Color::CHARTREUSE2);
    }

    /**
     * Color chartreuse3.
     *
     */
    public static function chartreuse3(): static
    {
        return new static(Color::CHARTREUSE3);
    }

    /**
     * Color chartreuse4.
     *
     */
    public static function chartreuse4(): static
    {
        return new static(Color::CHARTREUSE4);
    }

    /**
     * Color greenyellow.
     *
     */
    public static function greenyellow(): static
    {
        return new static(Color::GREENYELLOW);
    }

    /**
     * Color darkolivegreen3.
     *
     */
    public static function darkolivegreen3(): static
    {
        return new static(Color::DARKOLIVEGREEN3);
    }

    /**
     * Color darkolivegreen1.
     *
     */
    public static function darkolivegreen1(): static
    {
        return new static(Color::DARKOLIVEGREEN1);
    }

    /**
     * Color darkolivegreen2.
     *
     */
    public static function darkolivegreen2(): static
    {
        return new static(Color::DARKOLIVEGREEN2);
    }

    /**
     * Color darkolivegreen4.
     *
     */
    public static function darkolivegreen4(): static
    {
        return new static(Color::DARKOLIVEGREEN4);
    }

    /**
     * Color darkolivegreen.
     *
     */
    public static function darkolivegreen(): static
    {
        return new static(Color::DARKOLIVEGREEN);
    }

    /**
     * Color olivedrab.
     *
     */
    public static function olivedrab(): static
    {
        return new static(Color::OLIVEDRAB);
    }

    /**
     * Color olivedrab1.
     *
     */
    public static function olivedrab1(): static
    {
        return new static(Color::OLIVEDRAB1);
    }

    /**
     * Color olivedrab2.
     *
     */
    public static function olivedrab2(): static
    {
        return new static(Color::OLIVEDRAB2);
    }

    /**
     * Color olivedrab3.
     *
     */
    public static function olivedrab3(): static
    {
        return new static(Color::OLIVEDRAB3);
    }

    /**
     * Color yellowgreen.
     *
     */
    public static function yellowgreen(): static
    {
        return new static(Color::YELLOWGREEN);
    }

    /**
     * Color olivedrab4.
     *
     */
    public static function olivedrab4(): static
    {
        return new static(Color::OLIVEDRAB4);
    }

    /**
     * Color ivory.
     *
     */
    public static function ivory(): static
    {
        return new static(Color::IVORY);
    }

    /**
     * Color ivory1.
     *
     */
    public static function ivory1(): static
    {
        return new static(Color::IVORY1);
    }

    /**
     * Color lightyellow.
     *
     */
    public static function lightyellow(): static
    {
        return new static(Color::LIGHTYELLOW);
    }

    /**
     * Color lightyellow1.
     *
     */
    public static function lightyellow1(): static
    {
        return new static(Color::LIGHTYELLOW1);
    }

    /**
     * Color beige.
     *
     */
    public static function beige(): static
    {
        return new static(Color::BEIGE);
    }

    /**
     * Color ivory2.
     *
     */
    public static function ivory2(): static
    {
        return new static(Color::IVORY2);
    }

    /**
     * Color lightgoldenrodyellow.
     *
     */
    public static function lightgoldenrodyellow(): static
    {
        return new static(Color::LIGHTGOLDENRODYELLOW);
    }

    /**
     * Color lightyellow2.
     *
     */
    public static function lightyellow2(): static
    {
        return new static(Color::LIGHTYELLOW2);
    }

    /**
     * Color ivory3.
     *
     */
    public static function ivory3(): static
    {
        return new static(Color::IVORY3);
    }

    /**
     * Color lightyellow3.
     *
     */
    public static function lightyellow3(): static
    {
        return new static(Color::LIGHTYELLOW3);
    }

    /**
     * Color ivory4.
     *
     */
    public static function ivory4(): static
    {
        return new static(Color::IVORY4);
    }

    /**
     * Color lightyellow4.
     *
     */
    public static function lightyellow4(): static
    {
        return new static(Color::LIGHTYELLOW4);
    }

    /**
     * Color yellow.
     *
     */
    public static function yellow(): static
    {
        return new static(Color::YELLOW);
    }

    /**
     * Color yellow1.
     *
     */
    public static function yellow1(): static
    {
        return new static(Color::YELLOW1);
    }

    /**
     * Color yellow2.
     *
     */
    public static function yellow2(): static
    {
        return new static(Color::YELLOW2);
    }

    /**
     * Color yellow3.
     *
     */
    public static function yellow3(): static
    {
        return new static(Color::YELLOW3);
    }

    /**
     * Color yellow4.
     *
     */
    public static function yellow4(): static
    {
        return new static(Color::YELLOW4);
    }

    /**
     * Color olive.
     *
     */
    public static function olive(): static
    {
        return new static(Color::OLIVE);
    }

    /**
     * Color darkkhaki.
     *
     */
    public static function darkkhaki(): static
    {
        return new static(Color::DARKKHAKI);
    }

    /**
     * Color khaki2.
     *
     */
    public static function khaki2(): static
    {
        return new static(Color::KHAKI2);
    }

    /**
     * Color lemonchiffon4.
     *
     */
    public static function lemonchiffon4(): static
    {
        return new static(Color::LEMONCHIFFON4);
    }

    /**
     * Color khaki1.
     *
     */
    public static function khaki1(): static
    {
        return new static(Color::KHAKI1);
    }

    /**
     * Color khaki3.
     *
     */
    public static function khaki3(): static
    {
        return new static(Color::KHAKI3);
    }

    /**
     * Color khaki4.
     *
     */
    public static function khaki4(): static
    {
        return new static(Color::KHAKI4);
    }

    /**
     * Color palegoldenrod.
     *
     */
    public static function palegoldenrod(): static
    {
        return new static(Color::PALEGOLDENROD);
    }

    /**
     * Color lemonchiffon.
     *
     */
    public static function lemonchiffon(): static
    {
        return new static(Color::LEMONCHIFFON);
    }

    /**
     * Color lemonchiffon1.
     *
     */
    public static function lemonchiffon1(): static
    {
        return new static(Color::LEMONCHIFFON1);
    }

    /**
     * Color khaki.
     *
     */
    public static function khaki(): static
    {
        return new static(Color::KHAKI);
    }

    /**
     * Color lemonchiffon3.
     *
     */
    public static function lemonchiffon3(): static
    {
        return new static(Color::LEMONCHIFFON3);
    }

    /**
     * Color lemonchiffon2.
     *
     */
    public static function lemonchiffon2(): static
    {
        return new static(Color::LEMONCHIFFON2);
    }

    /**
     * Color mediumgoldenrod.
     *
     */
    public static function mediumgoldenrod(): static
    {
        return new static(Color::MEDIUMGOLDENROD);
    }

    /**
     * Color cornsilk4.
     *
     */
    public static function cornsilk4(): static
    {
        return new static(Color::CORNSILK4);
    }

    /**
     * Color gold.
     *
     */
    public static function gold(): static
    {
        return new static(Color::GOLD);
    }

    /**
     * Color gold1.
     *
     */
    public static function gold1(): static
    {
        return new static(Color::GOLD1);
    }

    /**
     * Color gold2.
     *
     */
    public static function gold2(): static
    {
        return new static(Color::GOLD2);
    }

    /**
     * Color gold3.
     *
     */
    public static function gold3(): static
    {
        return new static(Color::GOLD3);
    }

    /**
     * Color gold4.
     *
     */
    public static function gold4(): static
    {
        return new static(Color::GOLD4);
    }

    /**
     * Color lightgoldenrod.
     *
     */
    public static function lightgoldenrod(): static
    {
        return new static(Color::LIGHTGOLDENROD);
    }

    /**
     * Color lightgoldenrod4.
     *
     */
    public static function lightgoldenrod4(): static
    {
        return new static(Color::LIGHTGOLDENROD4);
    }

    /**
     * Color lightgoldenrod1.
     *
     */
    public static function lightgoldenrod1(): static
    {
        return new static(Color::LIGHTGOLDENROD1);
    }

    /**
     * Color lightgoldenrod3.
     *
     */
    public static function lightgoldenrod3(): static
    {
        return new static(Color::LIGHTGOLDENROD3);
    }

    /**
     * Color lightgoldenrod2.
     *
     */
    public static function lightgoldenrod2(): static
    {
        return new static(Color::LIGHTGOLDENROD2);
    }

    /**
     * Color cornsilk3.
     *
     */
    public static function cornsilk3(): static
    {
        return new static(Color::CORNSILK3);
    }

    /**
     * Color cornsilk2.
     *
     */
    public static function cornsilk2(): static
    {
        return new static(Color::CORNSILK2);
    }

    /**
     * Color cornsilk.
     *
     */
    public static function cornsilk(): static
    {
        return new static(Color::CORNSILK);
    }

    /**
     * Color cornsilk1.
     *
     */
    public static function cornsilk1(): static
    {
        return new static(Color::CORNSILK1);
    }

    /**
     * Color goldenrod.
     *
     */
    public static function goldenrod(): static
    {
        return new static(Color::GOLDENROD);
    }

    /**
     * Color goldenrod1.
     *
     */
    public static function goldenrod1(): static
    {
        return new static(Color::GOLDENROD1);
    }

    /**
     * Color goldenrod2.
     *
     */
    public static function goldenrod2(): static
    {
        return new static(Color::GOLDENROD2);
    }

    /**
     * Color goldenrod3.
     *
     */
    public static function goldenrod3(): static
    {
        return new static(Color::GOLDENROD3);
    }

    /**
     * Color goldenrod4.
     *
     */
    public static function goldenrod4(): static
    {
        return new static(Color::GOLDENROD4);
    }

    /**
     * Color darkgoldenrod.
     *
     */
    public static function darkgoldenrod(): static
    {
        return new static(Color::DARKGOLDENROD);
    }

    /**
     * Color darkgoldenrod1.
     *
     */
    public static function darkgoldenrod1(): static
    {
        return new static(Color::DARKGOLDENROD1);
    }

    /**
     * Color darkgoldenrod2.
     *
     */
    public static function darkgoldenrod2(): static
    {
        return new static(Color::DARKGOLDENROD2);
    }

    /**
     * Color darkgoldenrod3.
     *
     */
    public static function darkgoldenrod3(): static
    {
        return new static(Color::DARKGOLDENROD3);
    }

    /**
     * Color darkgoldenrod4.
     *
     */
    public static function darkgoldenrod4(): static
    {
        return new static(Color::DARKGOLDENROD4);
    }

    /**
     * Color floralwhite.
     *
     */
    public static function floralwhite(): static
    {
        return new static(Color::FLORALWHITE);
    }

    /**
     * Color wheat2.
     *
     */
    public static function wheat2(): static
    {
        return new static(Color::WHEAT2);
    }

    /**
     * Color oldlace.
     *
     */
    public static function oldlace(): static
    {
        return new static(Color::OLDLACE);
    }

    /**
     * Color wheat.
     *
     */
    public static function wheat(): static
    {
        return new static(Color::WHEAT);
    }

    /**
     * Color wheat1.
     *
     */
    public static function wheat1(): static
    {
        return new static(Color::WHEAT1);
    }

    /**
     * Color wheat3.
     *
     */
    public static function wheat3(): static
    {
        return new static(Color::WHEAT3);
    }

    /**
     * Color orange.
     *
     */
    public static function orange(): static
    {
        return new static(Color::ORANGE);
    }

    /**
     * Color orange1.
     *
     */
    public static function orange1(): static
    {
        return new static(Color::ORANGE1);
    }

    /**
     * Color orange2.
     *
     */
    public static function orange2(): static
    {
        return new static(Color::ORANGE2);
    }

    /**
     * Color orange3.
     *
     */
    public static function orange3(): static
    {
        return new static(Color::ORANGE3);
    }

    /**
     * Color orange4.
     *
     */
    public static function orange4(): static
    {
        return new static(Color::ORANGE4);
    }

    /**
     * Color wheat4.
     *
     */
    public static function wheat4(): static
    {
        return new static(Color::WHEAT4);
    }

    /**
     * Color moccasin.
     *
     */
    public static function moccasin(): static
    {
        return new static(Color::MOCCASIN);
    }

    /**
     * Color papayawhip.
     *
     */
    public static function papayawhip(): static
    {
        return new static(Color::PAPAYAWHIP);
    }

    /**
     * Color navajowhite3.
     *
     */
    public static function navajowhite3(): static
    {
        return new static(Color::NAVAJOWHITE3);
    }

    /**
     * Color blanchedalmond.
     *
     */
    public static function blanchedalmond(): static
    {
        return new static(Color::BLANCHEDALMOND);
    }

    /**
     * Color navajowhite.
     *
     */
    public static function navajowhite(): static
    {
        return new static(Color::NAVAJOWHITE);
    }

    /**
     * Color navajowhite1.
     *
     */
    public static function navajowhite1(): static
    {
        return new static(Color::NAVAJOWHITE1);
    }

    /**
     * Color navajowhite2.
     *
     */
    public static function navajowhite2(): static
    {
        return new static(Color::NAVAJOWHITE2);
    }

    /**
     * Color navajowhite4.
     *
     */
    public static function navajowhite4(): static
    {
        return new static(Color::NAVAJOWHITE4);
    }

    /**
     * Color antiquewhite4.
     *
     */
    public static function antiquewhite4(): static
    {
        return new static(Color::ANTIQUEWHITE4);
    }

    /**
     * Color antiquewhite.
     *
     */
    public static function antiquewhite(): static
    {
        return new static(Color::ANTIQUEWHITE);
    }

    /**
     * Color tan.
     *
     */
    public static function tan(): static
    {
        return new static(Color::TAN);
    }

    /**
     * Color bisque4.
     *
     */
    public static function bisque4(): static
    {
        return new static(Color::BISQUE4);
    }

    /**
     * Color burlywood.
     *
     */
    public static function burlywood(): static
    {
        return new static(Color::BURLYWOOD);
    }

    /**
     * Color antiquewhite2.
     *
     */
    public static function antiquewhite2(): static
    {
        return new static(Color::ANTIQUEWHITE2);
    }

    /**
     * Color burlywood1.
     *
     */
    public static function burlywood1(): static
    {
        return new static(Color::BURLYWOOD1);
    }

    /**
     * Color burlywood3.
     *
     */
    public static function burlywood3(): static
    {
        return new static(Color::BURLYWOOD3);
    }

    /**
     * Color burlywood2.
     *
     */
    public static function burlywood2(): static
    {
        return new static(Color::BURLYWOOD2);
    }

    /**
     * Color antiquewhite1.
     *
     */
    public static function antiquewhite1(): static
    {
        return new static(Color::ANTIQUEWHITE1);
    }

    /**
     * Color burlywood4.
     *
     */
    public static function burlywood4(): static
    {
        return new static(Color::BURLYWOOD4);
    }

    /**
     * Color antiquewhite3.
     *
     */
    public static function antiquewhite3(): static
    {
        return new static(Color::ANTIQUEWHITE3);
    }

    /**
     * Color darkorange.
     *
     */
    public static function darkorange(): static
    {
        return new static(Color::DARKORANGE);
    }

    /**
     * Color bisque2.
     *
     */
    public static function bisque2(): static
    {
        return new static(Color::BISQUE2);
    }

    /**
     * Color bisque.
     *
     */
    public static function bisque(): static
    {
        return new static(Color::BISQUE);
    }

    /**
     * Color bisque1.
     *
     */
    public static function bisque1(): static
    {
        return new static(Color::BISQUE1);
    }

    /**
     * Color bisque3.
     *
     */
    public static function bisque3(): static
    {
        return new static(Color::BISQUE3);
    }

    /**
     * Color darkorange1.
     *
     */
    public static function darkorange1(): static
    {
        return new static(Color::DARKORANGE1);
    }

    /**
     * Color linen.
     *
     */
    public static function linen(): static
    {
        return new static(Color::LINEN);
    }

    /**
     * Color darkorange2.
     *
     */
    public static function darkorange2(): static
    {
        return new static(Color::DARKORANGE2);
    }

    /**
     * Color darkorange3.
     *
     */
    public static function darkorange3(): static
    {
        return new static(Color::DARKORANGE3);
    }

    /**
     * Color darkorange4.
     *
     */
    public static function darkorange4(): static
    {
        return new static(Color::DARKORANGE4);
    }

    /**
     * Color peru.
     *
     */
    public static function peru(): static
    {
        return new static(Color::PERU);
    }

    /**
     * Color tan1.
     *
     */
    public static function tan1(): static
    {
        return new static(Color::TAN1);
    }

    /**
     * Color tan2.
     *
     */
    public static function tan2(): static
    {
        return new static(Color::TAN2);
    }

    /**
     * Color tan3.
     *
     */
    public static function tan3(): static
    {
        return new static(Color::TAN3);
    }

    /**
     * Color tan4.
     *
     */
    public static function tan4(): static
    {
        return new static(Color::TAN4);
    }

    /**
     * Color peachpuff.
     *
     */
    public static function peachpuff(): static
    {
        return new static(Color::PEACHPUFF);
    }

    /**
     * Color peachpuff1.
     *
     */
    public static function peachpuff1(): static
    {
        return new static(Color::PEACHPUFF1);
    }

    /**
     * Color peachpuff4.
     *
     */
    public static function peachpuff4(): static
    {
        return new static(Color::PEACHPUFF4);
    }

    /**
     * Color peachpuff2.
     *
     */
    public static function peachpuff2(): static
    {
        return new static(Color::PEACHPUFF2);
    }

    /**
     * Color peachpuff3.
     *
     */
    public static function peachpuff3(): static
    {
        return new static(Color::PEACHPUFF3);
    }

    /**
     * Color sandybrown.
     *
     */
    public static function sandybrown(): static
    {
        return new static(Color::SANDYBROWN);
    }

    /**
     * Color seashell4.
     *
     */
    public static function seashell4(): static
    {
        return new static(Color::SEASHELL4);
    }

    /**
     * Color seashell2.
     *
     */
    public static function seashell2(): static
    {
        return new static(Color::SEASHELL2);
    }

    /**
     * Color seashell3.
     *
     */
    public static function seashell3(): static
    {
        return new static(Color::SEASHELL3);
    }

    /**
     * Color chocolate.
     *
     */
    public static function chocolate(): static
    {
        return new static(Color::CHOCOLATE);
    }

    /**
     * Color chocolate1.
     *
     */
    public static function chocolate1(): static
    {
        return new static(Color::CHOCOLATE1);
    }

    /**
     * Color chocolate2.
     *
     */
    public static function chocolate2(): static
    {
        return new static(Color::CHOCOLATE2);
    }

    /**
     * Color chocolate3.
     *
     */
    public static function chocolate3(): static
    {
        return new static(Color::CHOCOLATE3);
    }

    /**
     * Color chocolate4.
     *
     */
    public static function chocolate4(): static
    {
        return new static(Color::CHOCOLATE4);
    }

    /**
     * Color saddlebrown.
     *
     */
    public static function saddlebrown(): static
    {
        return new static(Color::SADDLEBROWN);
    }

    /**
     * Color seashell.
     *
     */
    public static function seashell(): static
    {
        return new static(Color::SEASHELL);
    }

    /**
     * Color seashell1.
     *
     */
    public static function seashell1(): static
    {
        return new static(Color::SEASHELL1);
    }

    /**
     * Color sienna4.
     *
     */
    public static function sienna4(): static
    {
        return new static(Color::SIENNA4);
    }

    /**
     * Color sienna.
     *
     */
    public static function sienna(): static
    {
        return new static(Color::SIENNA);
    }

    /**
     * Color sienna1.
     *
     */
    public static function sienna1(): static
    {
        return new static(Color::SIENNA1);
    }

    /**
     * Color sienna2.
     *
     */
    public static function sienna2(): static
    {
        return new static(Color::SIENNA2);
    }

    /**
     * Color sienna3.
     *
     */
    public static function sienna3(): static
    {
        return new static(Color::SIENNA3);
    }

    /**
     * Color lightsalmon3.
     *
     */
    public static function lightsalmon3(): static
    {
        return new static(Color::LIGHTSALMON3);
    }

    /**
     * Color lightsalmon.
     *
     */
    public static function lightsalmon(): static
    {
        return new static(Color::LIGHTSALMON);
    }

    /**
     * Color lightsalmon1.
     *
     */
    public static function lightsalmon1(): static
    {
        return new static(Color::LIGHTSALMON1);
    }

    /**
     * Color lightsalmon4.
     *
     */
    public static function lightsalmon4(): static
    {
        return new static(Color::LIGHTSALMON4);
    }

    /**
     * Color lightsalmon2.
     *
     */
    public static function lightsalmon2(): static
    {
        return new static(Color::LIGHTSALMON2);
    }

    /**
     * Color coral.
     *
     */
    public static function coral(): static
    {
        return new static(Color::CORAL);
    }

    /**
     * Color orangered.
     *
     */
    public static function orangered(): static
    {
        return new static(Color::ORANGERED);
    }

    /**
     * Color orangered1.
     *
     */
    public static function orangered1(): static
    {
        return new static(Color::ORANGERED1);
    }

    /**
     * Color orangered2.
     *
     */
    public static function orangered2(): static
    {
        return new static(Color::ORANGERED2);
    }

    /**
     * Color orangered3.
     *
     */
    public static function orangered3(): static
    {
        return new static(Color::ORANGERED3);
    }

    /**
     * Color orangered4.
     *
     */
    public static function orangered4(): static
    {
        return new static(Color::ORANGERED4);
    }

    /**
     * Color darksalmon.
     *
     */
    public static function darksalmon(): static
    {
        return new static(Color::DARKSALMON);
    }

    /**
     * Color salmon1.
     *
     */
    public static function salmon1(): static
    {
        return new static(Color::SALMON1);
    }

    /**
     * Color salmon2.
     *
     */
    public static function salmon2(): static
    {
        return new static(Color::SALMON2);
    }

    /**
     * Color salmon3.
     *
     */
    public static function salmon3(): static
    {
        return new static(Color::SALMON3);
    }

    /**
     * Color salmon4.
     *
     */
    public static function salmon4(): static
    {
        return new static(Color::SALMON4);
    }

    /**
     * Color coral1.
     *
     */
    public static function coral1(): static
    {
        return new static(Color::CORAL1);
    }

    /**
     * Color coral2.
     *
     */
    public static function coral2(): static
    {
        return new static(Color::CORAL2);
    }

    /**
     * Color coral3.
     *
     */
    public static function coral3(): static
    {
        return new static(Color::CORAL3);
    }

    /**
     * Color coral4.
     *
     */
    public static function coral4(): static
    {
        return new static(Color::CORAL4);
    }

    /**
     * Color tomato4.
     *
     */
    public static function tomato4(): static
    {
        return new static(Color::TOMATO4);
    }

    /**
     * Color tomato.
     *
     */
    public static function tomato(): static
    {
        return new static(Color::TOMATO);
    }

    /**
     * Color tomato1.
     *
     */
    public static function tomato1(): static
    {
        return new static(Color::TOMATO1);
    }

    /**
     * Color tomato2.
     *
     */
    public static function tomato2(): static
    {
        return new static(Color::TOMATO2);
    }

    /**
     * Color tomato3.
     *
     */
    public static function tomato3(): static
    {
        return new static(Color::TOMATO3);
    }

    /**
     * Color mistyrose4.
     *
     */
    public static function mistyrose4(): static
    {
        return new static(Color::MISTYROSE4);
    }

    /**
     * Color mistyrose2.
     *
     */
    public static function mistyrose2(): static
    {
        return new static(Color::MISTYROSE2);
    }

    /**
     * Color mistyrose.
     *
     */
    public static function mistyrose(): static
    {
        return new static(Color::MISTYROSE);
    }

    /**
     * Color mistyrose1.
     *
     */
    public static function mistyrose1(): static
    {
        return new static(Color::MISTYROSE1);
    }

    /**
     * Color salmon.
     *
     */
    public static function salmon(): static
    {
        return new static(Color::SALMON);
    }

    /**
     * Color mistyrose3.
     *
     */
    public static function mistyrose3(): static
    {
        return new static(Color::MISTYROSE3);
    }

    /**
     * Color white.
     *
     */
    public static function white(): static
    {
        return new static(Color::WHITE);
    }

    /**
     * Color gray100.
     *
     */
    public static function gray100(): static
    {
        return new static(Color::GRAY100);
    }

    /**
     * Color grey100.
     *
     */
    public static function grey100(): static
    {
        return new static(Color::GREY100);
    }

    /**
     * Color gray99.
     *
     */
    public static function gray99(): static
    {
        return new static(Color::GRAY99);
    }

    /**
     * Color grey99.
     *
     */
    public static function grey99(): static
    {
        return new static(Color::GREY99);
    }

    /**
     * Color gray98.
     *
     */
    public static function gray98(): static
    {
        return new static(Color::GRAY98);
    }

    /**
     * Color grey98.
     *
     */
    public static function grey98(): static
    {
        return new static(Color::GREY98);
    }

    /**
     * Color gray97.
     *
     */
    public static function gray97(): static
    {
        return new static(Color::GRAY97);
    }

    /**
     * Color grey97.
     *
     */
    public static function grey97(): static
    {
        return new static(Color::GREY97);
    }

    /**
     * Color gray96.
     *
     */
    public static function gray96(): static
    {
        return new static(Color::GRAY96);
    }

    /**
     * Color grey96.
     *
     */
    public static function grey96(): static
    {
        return new static(Color::GREY96);
    }

    /**
     * Color whitesmoke.
     *
     */
    public static function whitesmoke(): static
    {
        return new static(Color::WHITESMOKE);
    }

    /**
     * Color gray95.
     *
     */
    public static function gray95(): static
    {
        return new static(Color::GRAY95);
    }

    /**
     * Color grey95.
     *
     */
    public static function grey95(): static
    {
        return new static(Color::GREY95);
    }

    /**
     * Color gray94.
     *
     */
    public static function gray94(): static
    {
        return new static(Color::GRAY94);
    }

    /**
     * Color grey94.
     *
     */
    public static function grey94(): static
    {
        return new static(Color::GREY94);
    }

    /**
     * Color gray93.
     *
     */
    public static function gray93(): static
    {
        return new static(Color::GRAY93);
    }

    /**
     * Color grey93.
     *
     */
    public static function grey93(): static
    {
        return new static(Color::GREY93);
    }

    /**
     * Color gray92.
     *
     */
    public static function gray92(): static
    {
        return new static(Color::GRAY92);
    }

    /**
     * Color grey92.
     *
     */
    public static function grey92(): static
    {
        return new static(Color::GREY92);
    }

    /**
     * Color gray91.
     *
     */
    public static function gray91(): static
    {
        return new static(Color::GRAY91);
    }

    /**
     * Color grey91.
     *
     */
    public static function grey91(): static
    {
        return new static(Color::GREY91);
    }

    /**
     * Color gray90.
     *
     */
    public static function gray90(): static
    {
        return new static(Color::GRAY90);
    }

    /**
     * Color grey90.
     *
     */
    public static function grey90(): static
    {
        return new static(Color::GREY90);
    }

    /**
     * Color gray89.
     *
     */
    public static function gray89(): static
    {
        return new static(Color::GRAY89);
    }

    /**
     * Color grey89.
     *
     */
    public static function grey89(): static
    {
        return new static(Color::GREY89);
    }

    /**
     * Color gray88.
     *
     */
    public static function gray88(): static
    {
        return new static(Color::GRAY88);
    }

    /**
     * Color grey88.
     *
     */
    public static function grey88(): static
    {
        return new static(Color::GREY88);
    }

    /**
     * Color gray87.
     *
     */
    public static function gray87(): static
    {
        return new static(Color::GRAY87);
    }

    /**
     * Color grey87.
     *
     */
    public static function grey87(): static
    {
        return new static(Color::GREY87);
    }

    /**
     * Color gainsboro.
     *
     */
    public static function gainsboro(): static
    {
        return new static(Color::GAINSBORO);
    }

    /**
     * Color gray86.
     *
     */
    public static function gray86(): static
    {
        return new static(Color::GRAY86);
    }

    /**
     * Color grey86.
     *
     */
    public static function grey86(): static
    {
        return new static(Color::GREY86);
    }

    /**
     * Color gray85.
     *
     */
    public static function gray85(): static
    {
        return new static(Color::GRAY85);
    }

    /**
     * Color grey85.
     *
     */
    public static function grey85(): static
    {
        return new static(Color::GREY85);
    }

    /**
     * Color gray84.
     *
     */
    public static function gray84(): static
    {
        return new static(Color::GRAY84);
    }

    /**
     * Color grey84.
     *
     */
    public static function grey84(): static
    {
        return new static(Color::GREY84);
    }

    /**
     * Color gray83.
     *
     */
    public static function gray83(): static
    {
        return new static(Color::GRAY83);
    }

    /**
     * Color grey83.
     *
     */
    public static function grey83(): static
    {
        return new static(Color::GREY83);
    }

    /**
     * Color lightgray.
     *
     */
    public static function lightgray(): static
    {
        return new static(Color::LIGHTGRAY);
    }

    /**
     * Color lightgrey.
     *
     */
    public static function lightgrey(): static
    {
        return new static(Color::LIGHTGREY);
    }

    /**
     * Color gray82.
     *
     */
    public static function gray82(): static
    {
        return new static(Color::GRAY82);
    }

    /**
     * Color grey82.
     *
     */
    public static function grey82(): static
    {
        return new static(Color::GREY82);
    }

    /**
     * Color gray81.
     *
     */
    public static function gray81(): static
    {
        return new static(Color::GRAY81);
    }

    /**
     * Color grey81.
     *
     */
    public static function grey81(): static
    {
        return new static(Color::GREY81);
    }

    /**
     * Color gray80.
     *
     */
    public static function gray80(): static
    {
        return new static(Color::GRAY80);
    }

    /**
     * Color grey80.
     *
     */
    public static function grey80(): static
    {
        return new static(Color::GREY80);
    }

    /**
     * Color gray79.
     *
     */
    public static function gray79(): static
    {
        return new static(Color::GRAY79);
    }

    /**
     * Color grey79.
     *
     */
    public static function grey79(): static
    {
        return new static(Color::GREY79);
    }

    /**
     * Color gray78.
     *
     */
    public static function gray78(): static
    {
        return new static(Color::GRAY78);
    }

    /**
     * Color grey78.
     *
     */
    public static function grey78(): static
    {
        return new static(Color::GREY78);
    }

    /**
     * Color gray77.
     *
     */
    public static function gray77(): static
    {
        return new static(Color::GRAY77);
    }

    /**
     * Color grey77.
     *
     */
    public static function grey77(): static
    {
        return new static(Color::GREY77);
    }

    /**
     * Color gray76.
     *
     */
    public static function gray76(): static
    {
        return new static(Color::GRAY76);
    }

    /**
     * Color grey76.
     *
     */
    public static function grey76(): static
    {
        return new static(Color::GREY76);
    }

    /**
     * Color silver.
     *
     */
    public static function silver(): static
    {
        return new static(Color::SILVER);
    }

    /**
     * Color gray75.
     *
     */
    public static function gray75(): static
    {
        return new static(Color::GRAY75);
    }

    /**
     * Color grey75.
     *
     */
    public static function grey75(): static
    {
        return new static(Color::GREY75);
    }

    /**
     * Color gray74.
     *
     */
    public static function gray74(): static
    {
        return new static(Color::GRAY74);
    }

    /**
     * Color grey74.
     *
     */
    public static function grey74(): static
    {
        return new static(Color::GREY74);
    }

    /**
     * Color gray73.
     *
     */
    public static function gray73(): static
    {
        return new static(Color::GRAY73);
    }

    /**
     * Color grey73.
     *
     */
    public static function grey73(): static
    {
        return new static(Color::GREY73);
    }

    /**
     * Color gray72.
     *
     */
    public static function gray72(): static
    {
        return new static(Color::GRAY72);
    }

    /**
     * Color grey72.
     *
     */
    public static function grey72(): static
    {
        return new static(Color::GREY72);
    }

    /**
     * Color gray71.
     *
     */
    public static function gray71(): static
    {
        return new static(Color::GRAY71);
    }

    /**
     * Color grey71.
     *
     */
    public static function grey71(): static
    {
        return new static(Color::GREY71);
    }

    /**
     * Color gray70.
     *
     */
    public static function gray70(): static
    {
        return new static(Color::GRAY70);
    }

    /**
     * Color grey70.
     *
     */
    public static function grey70(): static
    {
        return new static(Color::GREY70);
    }

    /**
     * Color gray69.
     *
     */
    public static function gray69(): static
    {
        return new static(Color::GRAY69);
    }

    /**
     * Color grey69.
     *
     */
    public static function grey69(): static
    {
        return new static(Color::GREY69);
    }

    /**
     * Color gray68.
     *
     */
    public static function gray68(): static
    {
        return new static(Color::GRAY68);
    }

    /**
     * Color grey68.
     *
     */
    public static function grey68(): static
    {
        return new static(Color::GREY68);
    }

    /**
     * Color gray67.
     *
     */
    public static function gray67(): static
    {
        return new static(Color::GRAY67);
    }

    /**
     * Color grey67.
     *
     */
    public static function grey67(): static
    {
        return new static(Color::GREY67);
    }

    /**
     * Color darkgray.
     *
     */
    public static function darkgray(): static
    {
        return new static(Color::DARKGRAY);
    }

    /**
     * Color darkgrey.
     *
     */
    public static function darkgrey(): static
    {
        return new static(Color::DARKGREY);
    }

    /**
     * Color gray66.
     *
     */
    public static function gray66(): static
    {
        return new static(Color::GRAY66);
    }

    /**
     * Color grey66.
     *
     */
    public static function grey66(): static
    {
        return new static(Color::GREY66);
    }

    /**
     * Color gray65.
     *
     */
    public static function gray65(): static
    {
        return new static(Color::GRAY65);
    }

    /**
     * Color grey65.
     *
     */
    public static function grey65(): static
    {
        return new static(Color::GREY65);
    }

    /**
     * Color gray64.
     *
     */
    public static function gray64(): static
    {
        return new static(Color::GRAY64);
    }

    /**
     * Color grey64.
     *
     */
    public static function grey64(): static
    {
        return new static(Color::GREY64);
    }

    /**
     * Color gray63.
     *
     */
    public static function gray63(): static
    {
        return new static(Color::GRAY63);
    }

    /**
     * Color grey63.
     *
     */
    public static function grey63(): static
    {
        return new static(Color::GREY63);
    }

    /**
     * Color gray62.
     *
     */
    public static function gray62(): static
    {
        return new static(Color::GRAY62);
    }

    /**
     * Color grey62.
     *
     */
    public static function grey62(): static
    {
        return new static(Color::GREY62);
    }

    /**
     * Color gray61.
     *
     */
    public static function gray61(): static
    {
        return new static(Color::GRAY61);
    }

    /**
     * Color grey61.
     *
     */
    public static function grey61(): static
    {
        return new static(Color::GREY61);
    }

    /**
     * Color gray60.
     *
     */
    public static function gray60(): static
    {
        return new static(Color::GRAY60);
    }

    /**
     * Color grey60.
     *
     */
    public static function grey60(): static
    {
        return new static(Color::GREY60);
    }

    /**
     * Color gray59.
     *
     */
    public static function gray59(): static
    {
        return new static(Color::GRAY59);
    }

    /**
     * Color grey59.
     *
     */
    public static function grey59(): static
    {
        return new static(Color::GREY59);
    }

    /**
     * Color gray58.
     *
     */
    public static function gray58(): static
    {
        return new static(Color::GRAY58);
    }

    /**
     * Color grey58.
     *
     */
    public static function grey58(): static
    {
        return new static(Color::GREY58);
    }

    /**
     * Color gray57.
     *
     */
    public static function gray57(): static
    {
        return new static(Color::GRAY57);
    }

    /**
     * Color grey57.
     *
     */
    public static function grey57(): static
    {
        return new static(Color::GREY57);
    }

    /**
     * Color gray56.
     *
     */
    public static function gray56(): static
    {
        return new static(Color::GRAY56);
    }

    /**
     * Color grey56.
     *
     */
    public static function grey56(): static
    {
        return new static(Color::GREY56);
    }

    /**
     * Color gray55.
     *
     */
    public static function gray55(): static
    {
        return new static(Color::GRAY55);
    }

    /**
     * Color grey55.
     *
     */
    public static function grey55(): static
    {
        return new static(Color::GREY55);
    }

    /**
     * Color gray54.
     *
     */
    public static function gray54(): static
    {
        return new static(Color::GRAY54);
    }

    /**
     * Color grey54.
     *
     */
    public static function grey54(): static
    {
        return new static(Color::GREY54);
    }

    /**
     * Color gray53.
     *
     */
    public static function gray53(): static
    {
        return new static(Color::GRAY53);
    }

    /**
     * Color grey53.
     *
     */
    public static function grey53(): static
    {
        return new static(Color::GREY53);
    }

    /**
     * Color gray52.
     *
     */
    public static function gray52(): static
    {
        return new static(Color::GRAY52);
    }

    /**
     * Color grey52.
     *
     */
    public static function grey52(): static
    {
        return new static(Color::GREY52);
    }

    /**
     * Color gray51.
     *
     */
    public static function gray51(): static
    {
        return new static(Color::GRAY51);
    }

    /**
     * Color grey51.
     *
     */
    public static function grey51(): static
    {
        return new static(Color::GREY51);
    }

    /**
     * Color fractal.
     *
     */
    public static function fractal(): static
    {
        return new static(Color::FRACTAL);
    }

    /**
     * Color gray50.
     *
     */
    public static function gray50(): static
    {
        return new static(Color::GRAY50);
    }

    /**
     * Color grey50.
     *
     */
    public static function grey50(): static
    {
        return new static(Color::GREY50);
    }

    /**
     * Color gray.
     *
     */
    public static function gray(): static
    {
        return new static(Color::GRAY);
    }

    /**
     * Color grey.
     *
     */
    public static function grey(): static
    {
        return new static(Color::GREY);
    }

    /**
     * Color gray49.
     *
     */
    public static function gray49(): static
    {
        return new static(Color::GRAY49);
    }

    /**
     * Color grey49.
     *
     */
    public static function grey49(): static
    {
        return new static(Color::GREY49);
    }

    /**
     * Color gray48.
     *
     */
    public static function gray48(): static
    {
        return new static(Color::GRAY48);
    }

    /**
     * Color grey48.
     *
     */
    public static function grey48(): static
    {
        return new static(Color::GREY48);
    }

    /**
     * Color gray47.
     *
     */
    public static function gray47(): static
    {
        return new static(Color::GRAY47);
    }

    /**
     * Color grey47.
     *
     */
    public static function grey47(): static
    {
        return new static(Color::GREY47);
    }

    /**
     * Color gray46.
     *
     */
    public static function gray46(): static
    {
        return new static(Color::GRAY46);
    }

    /**
     * Color grey46.
     *
     */
    public static function grey46(): static
    {
        return new static(Color::GREY46);
    }

    /**
     * Color gray45.
     *
     */
    public static function gray45(): static
    {
        return new static(Color::GRAY45);
    }

    /**
     * Color grey45.
     *
     */
    public static function grey45(): static
    {
        return new static(Color::GREY45);
    }

    /**
     * Color gray44.
     *
     */
    public static function gray44(): static
    {
        return new static(Color::GRAY44);
    }

    /**
     * Color grey44.
     *
     */
    public static function grey44(): static
    {
        return new static(Color::GREY44);
    }

    /**
     * Color gray43.
     *
     */
    public static function gray43(): static
    {
        return new static(Color::GRAY43);
    }

    /**
     * Color grey43.
     *
     */
    public static function grey43(): static
    {
        return new static(Color::GREY43);
    }

    /**
     * Color gray42.
     *
     */
    public static function gray42(): static
    {
        return new static(Color::GRAY42);
    }

    /**
     * Color grey42.
     *
     */
    public static function grey42(): static
    {
        return new static(Color::GREY42);
    }

    /**
     * Color dimgray.
     *
     */
    public static function dimgray(): static
    {
        return new static(Color::DIMGRAY);
    }

    /**
     * Color dimgrey.
     *
     */
    public static function dimgrey(): static
    {
        return new static(Color::DIMGREY);
    }

    /**
     * Color gray41.
     *
     */
    public static function gray41(): static
    {
        return new static(Color::GRAY41);
    }

    /**
     * Color grey41.
     *
     */
    public static function grey41(): static
    {
        return new static(Color::GREY41);
    }

    /**
     * Color gray40.
     *
     */
    public static function gray40(): static
    {
        return new static(Color::GRAY40);
    }

    /**
     * Color grey40.
     *
     */
    public static function grey40(): static
    {
        return new static(Color::GREY40);
    }

    /**
     * Color gray39.
     *
     */
    public static function gray39(): static
    {
        return new static(Color::GRAY39);
    }

    /**
     * Color grey39.
     *
     */
    public static function grey39(): static
    {
        return new static(Color::GREY39);
    }

    /**
     * Color gray38.
     *
     */
    public static function gray38(): static
    {
        return new static(Color::GRAY38);
    }

    /**
     * Color grey38.
     *
     */
    public static function grey38(): static
    {
        return new static(Color::GREY38);
    }

    /**
     * Color gray37.
     *
     */
    public static function gray37(): static
    {
        return new static(Color::GRAY37);
    }

    /**
     * Color grey37.
     *
     */
    public static function grey37(): static
    {
        return new static(Color::GREY37);
    }

    /**
     * Color gray36.
     *
     */
    public static function gray36(): static
    {
        return new static(Color::GRAY36);
    }

    /**
     * Color grey36.
     *
     */
    public static function grey36(): static
    {
        return new static(Color::GREY36);
    }

    /**
     * Color gray35.
     *
     */
    public static function gray35(): static
    {
        return new static(Color::GRAY35);
    }

    /**
     * Color grey35.
     *
     */
    public static function grey35(): static
    {
        return new static(Color::GREY35);
    }

    /**
     * Color gray34.
     *
     */
    public static function gray34(): static
    {
        return new static(Color::GRAY34);
    }

    /**
     * Color grey34.
     *
     */
    public static function grey34(): static
    {
        return new static(Color::GREY34);
    }

    /**
     * Color gray33.
     *
     */
    public static function gray33(): static
    {
        return new static(Color::GRAY33);
    }

    /**
     * Color grey33.
     *
     */
    public static function grey33(): static
    {
        return new static(Color::GREY33);
    }

    /**
     * Color gray32.
     *
     */
    public static function gray32(): static
    {
        return new static(Color::GRAY32);
    }

    /**
     * Color grey32.
     *
     */
    public static function grey32(): static
    {
        return new static(Color::GREY32);
    }

    /**
     * Color gray31.
     *
     */
    public static function gray31(): static
    {
        return new static(Color::GRAY31);
    }

    /**
     * Color grey31.
     *
     */
    public static function grey31(): static
    {
        return new static(Color::GREY31);
    }

    /**
     * Color gray30.
     *
     */
    public static function gray30(): static
    {
        return new static(Color::GRAY30);
    }

    /**
     * Color grey30.
     *
     */
    public static function grey30(): static
    {
        return new static(Color::GREY30);
    }

    /**
     * Color gray29.
     *
     */
    public static function gray29(): static
    {
        return new static(Color::GRAY29);
    }

    /**
     * Color grey29.
     *
     */
    public static function grey29(): static
    {
        return new static(Color::GREY29);
    }

    /**
     * Color gray28.
     *
     */
    public static function gray28(): static
    {
        return new static(Color::GRAY28);
    }

    /**
     * Color grey28.
     *
     */
    public static function grey28(): static
    {
        return new static(Color::GREY28);
    }

    /**
     * Color gray27.
     *
     */
    public static function gray27(): static
    {
        return new static(Color::GRAY27);
    }

    /**
     * Color grey27.
     *
     */
    public static function grey27(): static
    {
        return new static(Color::GREY27);
    }

    /**
     * Color gray26.
     *
     */
    public static function gray26(): static
    {
        return new static(Color::GRAY26);
    }

    /**
     * Color grey26.
     *
     */
    public static function grey26(): static
    {
        return new static(Color::GREY26);
    }

    /**
     * Color gray25.
     *
     */
    public static function gray25(): static
    {
        return new static(Color::GRAY25);
    }

    /**
     * Color grey25.
     *
     */
    public static function grey25(): static
    {
        return new static(Color::GREY25);
    }

    /**
     * Color gray24.
     *
     */
    public static function gray24(): static
    {
        return new static(Color::GRAY24);
    }

    /**
     * Color grey24.
     *
     */
    public static function grey24(): static
    {
        return new static(Color::GREY24);
    }

    /**
     * Color gray23.
     *
     */
    public static function gray23(): static
    {
        return new static(Color::GRAY23);
    }

    /**
     * Color grey23.
     *
     */
    public static function grey23(): static
    {
        return new static(Color::GREY23);
    }

    /**
     * Color gray22.
     *
     */
    public static function gray22(): static
    {
        return new static(Color::GRAY22);
    }

    /**
     * Color grey22.
     *
     */
    public static function grey22(): static
    {
        return new static(Color::GREY22);
    }

    /**
     * Color gray21.
     *
     */
    public static function gray21(): static
    {
        return new static(Color::GRAY21);
    }

    /**
     * Color grey21.
     *
     */
    public static function grey21(): static
    {
        return new static(Color::GREY21);
    }

    /**
     * Color gray20.
     *
     */
    public static function gray20(): static
    {
        return new static(Color::GRAY20);
    }

    /**
     * Color grey20.
     *
     */
    public static function grey20(): static
    {
        return new static(Color::GREY20);
    }

    /**
     * Color gray19.
     *
     */
    public static function gray19(): static
    {
        return new static(Color::GRAY19);
    }

    /**
     * Color grey19.
     *
     */
    public static function grey19(): static
    {
        return new static(Color::GREY19);
    }

    /**
     * Color gray18.
     *
     */
    public static function gray18(): static
    {
        return new static(Color::GRAY18);
    }

    /**
     * Color grey18.
     *
     */
    public static function grey18(): static
    {
        return new static(Color::GREY18);
    }

    /**
     * Color gray17.
     *
     */
    public static function gray17(): static
    {
        return new static(Color::GRAY17);
    }

    /**
     * Color grey17.
     *
     */
    public static function grey17(): static
    {
        return new static(Color::GREY17);
    }

    /**
     * Color gray16.
     *
     */
    public static function gray16(): static
    {
        return new static(Color::GRAY16);
    }

    /**
     * Color grey16.
     *
     */
    public static function grey16(): static
    {
        return new static(Color::GREY16);
    }

    /**
     * Color gray15.
     *
     */
    public static function gray15(): static
    {
        return new static(Color::GRAY15);
    }

    /**
     * Color grey15.
     *
     */
    public static function grey15(): static
    {
        return new static(Color::GREY15);
    }

    /**
     * Color gray14.
     *
     */
    public static function gray14(): static
    {
        return new static(Color::GRAY14);
    }

    /**
     * Color grey14.
     *
     */
    public static function grey14(): static
    {
        return new static(Color::GREY14);
    }

    /**
     * Color gray13.
     *
     */
    public static function gray13(): static
    {
        return new static(Color::GRAY13);
    }

    /**
     * Color grey13.
     *
     */
    public static function grey13(): static
    {
        return new static(Color::GREY13);
    }

    /**
     * Color gray12.
     *
     */
    public static function gray12(): static
    {
        return new static(Color::GRAY12);
    }

    /**
     * Color grey12.
     *
     */
    public static function grey12(): static
    {
        return new static(Color::GREY12);
    }

    /**
     * Color gray11.
     *
     */
    public static function gray11(): static
    {
        return new static(Color::GRAY11);
    }

    /**
     * Color grey11.
     *
     */
    public static function grey11(): static
    {
        return new static(Color::GREY11);
    }

    /**
     * Color gray10.
     *
     */
    public static function gray10(): static
    {
        return new static(Color::GRAY10);
    }

    /**
     * Color grey10.
     *
     */
    public static function grey10(): static
    {
        return new static(Color::GREY10);
    }

    /**
     * Color gray9.
     *
     */
    public static function gray9(): static
    {
        return new static(Color::GRAY9);
    }

    /**
     * Color grey9.
     *
     */
    public static function grey9(): static
    {
        return new static(Color::GREY9);
    }

    /**
     * Color gray8.
     *
     */
    public static function gray8(): static
    {
        return new static(Color::GRAY8);
    }

    /**
     * Color grey8.
     *
     */
    public static function grey8(): static
    {
        return new static(Color::GREY8);
    }

    /**
     * Color gray7.
     *
     */
    public static function gray7(): static
    {
        return new static(Color::GRAY7);
    }

    /**
     * Color grey7.
     *
     */
    public static function grey7(): static
    {
        return new static(Color::GREY7);
    }

    /**
     * Color gray6.
     *
     */
    public static function gray6(): static
    {
        return new static(Color::GRAY6);
    }

    /**
     * Color grey6.
     *
     */
    public static function grey6(): static
    {
        return new static(Color::GREY6);
    }

    /**
     * Color gray5.
     *
     */
    public static function gray5(): static
    {
        return new static(Color::GRAY5);
    }

    /**
     * Color grey5.
     *
     */
    public static function grey5(): static
    {
        return new static(Color::GREY5);
    }

    /**
     * Color gray4.
     *
     */
    public static function gray4(): static
    {
        return new static(Color::GRAY4);
    }

    /**
     * Color grey4.
     *
     */
    public static function grey4(): static
    {
        return new static(Color::GREY4);
    }

    /**
     * Color gray3.
     *
     */
    public static function gray3(): static
    {
        return new static(Color::GRAY3);
    }

    /**
     * Color grey3.
     *
     */
    public static function grey3(): static
    {
        return new static(Color::GREY3);
    }

    /**
     * Color gray2.
     *
     */
    public static function gray2(): static
    {
        return new static(Color::GRAY2);
    }

    /**
     * Color grey2.
     *
     */
    public static function grey2(): static
    {
        return new static(Color::GREY2);
    }

    /**
     * Color gray1.
     *
     */
    public static function gray1(): static
    {
        return new static(Color::GRAY1);
    }

    /**
     * Color grey1.
     *
     */
    public static function grey1(): static
    {
        return new static(Color::GREY1);
    }

    /**
     * Color black.
     *
     */
    public static function black(): static
    {
        return new static(Color::BLACK);
    }

    /**
     * Color gray0.
     *
     */
    public static function gray0(): static
    {
        return new static(Color::GRAY0);
    }

    /**
     * Color grey0.
     *
     */
    public static function grey0(): static
    {
        return new static(Color::GREY0);
    }

    /**
     * Color opaque.
     *
     */
    public static function opaque(): static
    {
        return new static(Color::OPAQUE);
    }

    /**
     * Color none.
     *
     */
    public static function none(): static
    {
        return new static(Color::NONE);
    }

    /**
     * Color transparent.
     *
     */
    public static function transparent(): static
    {
        return new static(Color::TRANSPARENT);
    }

    /**
     * Color in RGB.
     *
     * @param string $hexColor The hexadecimal color.
     *
     */
    public static function rgb(string $hexColor): static
    {
        return new static(StringUtils::ensureStartsWith($hexColor, '#'));
    }
}
