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

/**
 * Plugin definitions
 */
class My
{
    /** @var    string  Required php version */
    public const PHP_MIN = '7.4';

    /** @var    array   List of lunar phase => image */
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

    /**
     * This module id
     */
    public static function id(): string
    {
        return basename(dirname(__DIR__));
    }

    /**
     * This module name
     */
    public static function name(): string
    {
        return __((string) dcCore::app()->plugins->moduleInfo(self::id(), 'name'));
    }

    /**
     * Check php version
     */
    public static function phpCompliant(): bool
    {
        return version_compare(phpversion(), self::PHP_MIN, '>=');
    }
}
