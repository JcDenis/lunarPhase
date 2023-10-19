<?php

declare(strict_types=1);

namespace Dotclear\Plugin\lunarPhase;

use Dotclear\Module\MyPlugin;

/**
 * @brief       lunarPhase My helper.
 * @ingroup     lunarPhase
 *
 * @author      Tomtom (author)
 * @author      Jean-Christian Denis (latest)
 * @copyright   GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
class My extends MyPlugin
{
    /**
     * List of lunar phase => image.
     *
     * @var     array<string, string>   LUNAR_PHASES
     */
    public const LUNAR_PHASES = [
        'new_moon'             => 'nm.png',
        'waxing_crescent_moon' => 'wcm1.png',
        'first_quarter_moon'   => 'fqm.png',
        'waxing_gibbous_moon'  => 'wgm1.png',
        'full_moon'            => 'fm.png',
        'waning_gibbous_moon'  => 'wgm2.png',
        'last_quarter_moon'    => 'tqm.png',
        'waning_crescent_moon' => 'wcm2.png',
    ];

    // Use default permissions
}
