<?php
/**
 * @brief lunarPhase, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Tomtom, Pierre Van Glabeke and Contributors
 *
 * @copyright Jean-Crhistian Denis
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
if (!defined('DC_RC_PATH')) {
    return null;
}

Clearbricks::lib()->autoload(['lunarPhase' => __DIR__ . '/inc/class.lunarphase.php']);

// Register lunarphase CSS URL
dcCore::app()->url->register(
    'lunarphase',
    'lunarphase.css',
    '^lunarphase\.css',
    function ($args) {
        $phases = [
            'new_moon'             => 'nm',
            'waxing_crescent_moon' => 'wcm1',
            'first_quarter_moon'   => 'fqm',
            'waxing_gibbous_moon'  => 'wgm1',
            'full_moon'            => 'fm',
            'waning_gibbous_moon'  => 'wgm2',
            'last_quarter_moon'    => 'tqm',
            'waning_crescent_moon' => 'wcm2',
        ];

        header('Content-Type: text/css; charset=UTF-8');
        echo "/* lunarphase widget style */\n";

        foreach ($phases as $phase => $image) {
            echo
            sprintf(
                '#sidebar .lunarphase ul li.%s{background:transparent url(%s) no-repeat left 0.2em;padding-left:2em;}',
                $phase,
                dcCore::app()->blog->getPF(basename(__dir__) . '/img/' . $image . '.png')
            ) . "\n";
        }

        exit;
    }
);
