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
use dcUtils;
use Dotclear\Core\Process;

class Frontend extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::FRONTEND));
    }

    public static function process(): bool
    {
        if (!self::status()) {
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
