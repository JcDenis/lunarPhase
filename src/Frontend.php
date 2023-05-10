<?php
/**
 * @brief lunarPhase, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Tomtom, Pierre Van Glabeke and Contributors
 *
 * @copyright Jean-Christian Denis
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\lunarPhase;

use dcCore;
use dcNsProcess;
use dcUtils;

class Frontend extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = defined('DC_RC_PATH');

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        dcCore::app()->addBehaviors([
            // Add public header for lunarphase css
            'publicHeadContent' => function (): void {
                if (is_null(dcCore::app()->blog)) {
                    return;
                }

                echo dcUtils::cssLoad(dcCore::app()->blog->url . dcCore::app()->url->getURLFor('lunarphase'));
            },
            // Widgets
            'initWidgets' => [Widgets::class, 'initWidgets'],
        ]);

        return true;
    }
}
