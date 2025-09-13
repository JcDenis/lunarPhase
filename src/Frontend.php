<?php

declare(strict_types=1);

namespace Dotclear\Plugin\lunarPhase;

use Dotclear\App;
use Dotclear\Helper\Process\TraitProcess;

/**
 * @brief       lunarPhase frontend class.
 * @ingroup     lunarPhase
 *
 * @author      Tomtom (author)
 * @author      Jean-Christian Denis (latest)
 * @copyright   GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
class Frontend
{
    use TraitProcess;

    public static function init(): bool
    {
        return self::status(My::checkContext(My::FRONTEND));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        App::behavior()->addBehaviors([
            // Add public header for lunarphase css
            'publicHeadContent' => function (): void {
                if (App::blog()->isDefined()) {
                    echo App::plugins()->cssLoad(App::blog()->url() . App::url()->getURLFor('lunarphase'));
                }
            },
            // Widgets
            'initWidgets' => Widgets::initWidgets(...),
        ]);

        return true;
    }
}
