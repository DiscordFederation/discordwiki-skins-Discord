<?php
/**
 * Discord - Modern version of MonoBook with fresh look and many usability
 * improvements.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

/**
 * Skin subclass for Discord
 * @ingroup Skins
 */
class SkinDiscord extends SkinTemplate {
	public $skinname = 'discord';
	public $stylename = 'Discord';
	public $template = 'DiscordTemplate';
	/**
	 * @var Config
	 */
	private $discordConfig;
	private $responsiveMode = false;

	public function __construct() {
		parent::__construct( ...func_get_args() );
		$this->discordConfig = \MediaWiki\MediaWikiServices::getInstance()->getConfigFactory()
			->makeConfig( 'discord' );
	}

	/** @inheritDoc */
	public function getPageClasses( $title ) {
		$className = parent::getPageClasses( $title );
		return $className;
	}

	/**
	 * Enables the responsive mode
	 */
	public function enableResponsiveMode() {
		if ( !$this->responsiveMode ) {
			$out = $this->getOutput();
			$out->addMeta( 'viewport', 'width=device-width, initial-scale=1' );
			$out->addModuleStyles( 'skins.discord.styles.responsive' );
			$this->responsiveMode = true;
		}
	}

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param OutputPage $out Object to initialize
	 */
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );

		if ( $this->discordConfig->get( 'DiscordResponsive' ) ) {
			$this->enableResponsiveMode();
		}

		$out->addModules( 'skins.discord.js' );
	}

	/**
	 * Loads skin and user CSS files.
	 * @param OutputPage $out
	 */
	public function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );

		$out->addModuleStyles( [
			'mediawiki.skinning.interface',
			'skins.discord.styles',
		] );
	}

	/**
	 * Override to pass our Config instance to it
	 * @param string $classname
	 * @param bool|string $repository
	 * @param bool|string $cache_dir
	 * @return QuickTemplate
	 */
	public function setupTemplate( $classname, $repository = false, $cache_dir = false ) {
		return new $classname( $this->discordConfig );
	}

	/**
	 * Whether the logo should be preloaded with an HTTP link header or not
	 * @since 1.29
	 * @return bool
	 */
	public function shouldPreloadLogo() {
		return true;
	}
}
