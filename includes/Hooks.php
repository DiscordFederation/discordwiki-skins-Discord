<?php

namespace Discord;

use OutputPage;
use SkinTemplate;
use SkinDiscord;

/**
 * Hook handlers for Discord skin.
 *
 * Hook handler method names should be in the form of:
 *	on<HookName>()
 */
class Hooks {
	/**
	 * BeforePageDisplayMobile hook handler
	 *
	 * Make Discord responsive when operating in mobile mode (useformat=mobile)
	 *
	 * @see https://www.mediawiki.org/wiki/Extension:MobileFrontend/BeforePageDisplayMobile
	 * @param OutputPage $out
	 * @param SkinTemplate $sk
	 */
	public static function onBeforePageDisplayMobile( OutputPage $out, $sk ) {
		// This makes Discord behave in responsive mode when MobileFrontend is installed
		if ( $sk instanceof SkinDiscord ) {
			$sk->enableResponsiveMode();
		}
	}
}
