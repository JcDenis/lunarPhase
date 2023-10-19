<?php

declare(strict_types=1);

namespace Dotclear\Plugin\lunarPhase;

use Dotclear\App;
use Dotclear\Core\Process;

/**
 * @brief       lunarPhase backend class.
 * @ingroup     lunarPhase
 *
 * @author      Tomtom (author)
 * @author      Jean-Christian Denis (latest)
 * @copyright   GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
class Prepend extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::PREPEND));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        // Register lunarphase CSS URL
        App::url()->register(
            'lunarphase',
            'lunarphase.css',
            '^lunarphase\.css',
            function (?string $args): void {
                header('Content-Type: text/css; charset=UTF-8');
                echo "/* lunarphase widget style */\n";

                foreach (My::LUNAR_PHASES as $phase => $image) {
                    echo sprintf(
                        "#sidebar .lunarphase ul li.%s{background:transparent url(%s) no-repeat left 0.2em;padding-left:2em;}\n",
                        $phase,
                        My::fileURL('img/' . $image)
                    );
                }

                exit;
            }
        );

        return true;
    }
}
