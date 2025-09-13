<?php
/**
 * @file
 * @brief       The plugin lunarPhase definition
 * @ingroup     lunarPhase
 *
 * @defgroup    lunarPhase Plugin lunarPhase.
 *
 * Display the moon phases on a widget.
 *
 * @author      Tomtom (author)
 * @author      Jean-Christian Denis (latest)
 * @copyright   GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

$this->registerModule(
    'Moon phases',
    'Display the moon phases on a widget',
    'Tomtom, Pierre Van Glabeke and Contributors',
    '2.0',
    [
        'requires'    => [['core', '2.36']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'support'     => 'https://github.com/JcDenis/' . $this->id . '/issues',
        'details'     => 'https://github.com/JcDenis/' . $this->id . '/',
        'repository'  => 'https://raw.githubusercontent.com/JcDenis/' . $this->id . '/master/dcstore.xml',
        'date'        => '2025-03-02T17:10:28+00:00',
    ]
);
