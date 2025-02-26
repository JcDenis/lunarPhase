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
    '1.9',
    [
        'requires'    => [['core', '2.28']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'support'     => 'https://github.com/JcDenis/' . basename(__DIR__) . '/issues',
        'details'     => 'https://github.com/JcDenis/' . basename(__DIR__) . '/src/branch/master/README.md',
        'repository'  => 'https://github.com/JcDenis/' . basename(__DIR__) . '/raw/branch/master/dcstore.xml',
    ]
);
