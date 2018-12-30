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

    public static function onBeforeCreateEchoEvent( &$notifications, &$notificationCategories, &$icons ) {
        // You can use either a path or a url, but not both.
        // The value of 'path' is relative to $wgExtensionAssetsPath.
        //
        // The value of 'url' should be a URL.

        //replacing with custom icons
        $echo_images = "../skins/Discord/images/ext/echo";
        $new_icons = array(
            "placeholder" => array("path" => "{$echo_images}/notice.svg"),
            "chat" => array(
                "path" => array(
                    "ltr" => "{$echo_images}/speechBubbles-ltr-progressive.svg",
                    "rtl" => "{$echo_images}/speechBubbles-rtl-progressive.svg"
                    )
            ),
            "edit" => array("path" => "{$echo_images}/edit-progressive.svg"),
            "edit-user-talk" => array("path" => "{$echo_images}/edit-user-talk-progressive.svg"),
            "linked" => array("path" => "{$echo_images}/link-progressive.svg"),
            "mention" => array("path" => "{$echo_images}/mention-progressive.svg"),
            "mention-failure" => array("path" => "{$echo_images}/mention-failure.svg"),
            "mention-success" => array("path" => "{$echo_images}/mention-success-constructive.svg"),
            "mention-status-bundle" => array("path" => "{$echo_images}/mention-status-bundle-progressive.svg"),
            "reviewed" => array("path" => "{$echo_images}/articleCheck-progressive.svg"),
            "revert" => array("path" => "{$echo_images}/revert.svg"),
            "user-rights" => array("path" => "{$echo_images}/user-rights-progressive.svg"),
            "emailuser" => array("path" => "{$echo_images}/message-constructive.svg"),
            "help" => array("path" => "{$echo_images}/help.svg"),
            "global" => array("path" => "{$echo_images}/global-progressive.svg"),
            "article-reminder" => array("path" => "{$echo_images}/global-progressive.svg"),
        );
        $icons = array_replace($icons, $new_icons);
        return true;
    }
}
