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

require __DIR__ . '/_widgets.php';

// Add public header for lunarphase css
dcCore::app()->addBehavior('publicHeadContent', function () {
    echo dcUtils::cssLoad(dcCore::app()->blog->url . dcCore::app()->url->getURLFor('lunarphase'));
});
