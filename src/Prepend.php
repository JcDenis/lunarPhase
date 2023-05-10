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

class Prepend extends dcNsProcess
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

        // Register lunarphase CSS URL
        dcCore::app()->url->register(
            'lunarphase',
            'lunarphase.css',
            '^lunarphase\.css',
            function (?string $args): void {
                // avoid null warning
                if (is_null(dcCore::app()->blog)) {
                    return;
                }

                header('Content-Type: text/css; charset=UTF-8');
                echo "/* lunarphase widget style */\n";

                foreach (My::LUNAR_PHASES as $phase => $image) {
                    echo sprintf(
                        "#sidebar .lunarphase ul li.%s{background:transparent url(%s) no-repeat left 0.2em;padding-left:2em;}\n",
                        $phase,
                        dcCore::app()->blog->getPF(My::id() . '/img/' . $image)
                    );
                }

                exit;
            }
        );

        return true;
    }
}
