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

dcCore::app()->addBehavior('initWidgets', ['lunarPhaseWidgets','initWidgets']);

class lunarPhaseWidgets
{
    public static function initWidgets($w)
    {
        $w->create(
            'lunarphase',
            __('LunarPhase: moon phases'),
            ['lunarPhaseWidgets','widget'],
            null,
            __('Display the moon phases')
        )
        ->addTitle(__('Moon phases'))
        ->setting('phase', __('Display actual phase of moon'), 1, 'check')
        ->setting('illumination', __('Display actual illumination of moon'), 1, 'check')
        ->setting('age', __('Display actual age of moon'), 1, 'check')
        ->setting('dist_to_earth', __('Display actual distance between moon and earth'), 1, 'check')
        ->setting('dist_to_sun', __('Display actual distance between moon and sun'), 1, 'check')
        ->setting('moon_angle', __('Display actual angle of moon'), 1, 'check')
        ->setting('sun_angle', __('Display actual angle of sun'), 1, 'check')
        ->setting('parallax', __('Display actual parallax of moon'), 1, 'check')
        ->setting('previsions', __('Display all previsions for the next moon phases'), 1, 'check')
        ->addHomeOnly()
        ->addContentOnly()
        ->addClass()
        ->addOffline();
    }

    public static function widget($w)
    {
        if ($w->offline) {
            return;
        }

        if (!$w->checkHomeOnly(dcCore::app()->url->type)) {
            return;
        }

        $lp = new lunarPhase();

        return $w->renderDiv(
            $w->content_only,
            'lunarphase ' . $w->class,
            '',
            ($w->title ? $w->renderTitle(html::escapeHTML($w->title)) : '') .
            self::getLive($w, $lp) .
            self::getPrevisions($w, $lp)
        );
    }

    /**
     * Returns "live" part of lunarphase widget
     *
     * @param	dcWidget      $w   dcWidget object
     * @param	lunarPhase    $lp  lunarPhase object
     * @return	string   Live HTML part
     */
    public static function getLive($w, $lp)
    {
        $li   = '<li class="%2$s">%1$s</li>';
        $live = $lp->getLive();
        $res  = '';

        # Phase
        if ($w->phase) {
            $res .= sprintf($li, $live['name'], $live['id']);
        }
        # Illumination
        if ($w->illumination) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Illumination: %s%%'),
                    self::formatValue('percent', $live['illumination'])
                ),
                'illumination'
            );
        }
        # Moon's age
        if ($w->age) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Age of moon: %s days'),
                    self::formatValue('int', $live['age'])
                ),
                'age'
            );
        }
        # Distance from earth
        if ($w->dist_to_earth) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Distance to earth: %s km'),
                    self::formatValue('int', $live['dist_to_earth'])
                ),
                'dist_to_earth'
            );
        }
        # Distance from sun
        if ($w->dist_to_sun) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Distance to sun: %s km'),
                    self::formatValue('int', $live['dist_to_sun'])
                ),
                'dist_to_sun'
            );
        }
        # Moon's angle
        if ($w->moon_angle) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Angle of moon: %s deg'),
                    self::formatValue('deg', $live['moon_angle'])
                ),
                'moon_angle'
            );
        }
        # Sun's angle
        if ($w->sun_angle) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Angle of sun: %s deg'),
                    self::formatValue('deg', $live['sun_angle'])
                ),
                'sun_angle'
            );
        }
        # Parallax
        if ($w->parallax) {
            $res .= sprintf(
                $li,
                sprintf(
                    __('Parallax: %s deg'),
                    self::formatValue('deg', $live['parallax'])
                ),
                'parallax'
            );
        }

        return strlen($res) > 0 ?
            sprintf('<h4>%s</h4><ul>%s</ul>', __('In live'), $res)
            : '';
    }

    /**
     * Returns "previsions" part of lunarphase widget
     *
     * @param   dcWidget    $w   dcWidget object
     * @param   lunarPhase  $lp  lunarPhase object
     * @return	string   Previsions HTML part
     */
    public static function getPrevisions($w, $lp)
    {
        $li  = '<li class="%s" title="%s">%s</li>';
        $res = '';

        if ($w->previsions) {
            foreach ($lp->getPrevisions() as $k => $v) {
                $res .= sprintf($li, $k, $v['name'], self::formatValue('date', (int) $v['date']));
            }
        }

        return strlen($res) > 0 ?
            sprintf('<h4>%s</h4><ul class="lunarphase">%s</ul>', __('Previsions'), $res)
            : '';
    }

    /**
     * Returns value passed in argument with a correct format
     *
     * @param   string  $type   Type of convertion
     * @param   mixed   $value  Value to convert
     * @return	mixed    Converted value
     */
    public static function formatValue($type, $value)
    {
        $res    = '';
        $format = dcCore::app()->blog->settings->system->date_format . ' - ';
        $format .= dcCore::app()->blog->settings->system->time_format;
        $tz = dcCore::app()->blog->settings->system->blog_timezone;

        return match ($type) {
            'int'     => number_format($value, 0),
            'float'   => number_format($value, 2),
            'percent' => number_format($value * 100, 0),
            'date'    => dt::str($format, $value, $tz),
            'deg'     => number_format(($value * (180.0 / M_PI)), 2),
            default   => $value,
        };
    }
}