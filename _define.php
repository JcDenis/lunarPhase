<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of lunarPhase, a plugin for Dotclear.
# 
# Copyright (c) 2009-2015 Tomtom
# Contributor: Pierre Van Glabeke
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
	/* Name */			     'lunarPhase',
	/* Description */		 'Display the moon phases',
	/* Author */			   'Tomtom, Pierre Van Glabeke',
	/* Verion */			   '1.5',
	/* Properties */
	array(
		'permissions' => 'usage,contentadmin',
		'type' => 'plugin',
		'dc_min' => '2.7',
		'support' => 'http://forum.dotclear.org/viewtopic.php?pid=332971#p332971',
		'details' => 'http://plugins.dotaddict.org/dc2/details/lunarPhase'
	)
);