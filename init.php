<?php
// Plugin: dangkeys
//    provides a hotkey plugin that can be customized to your site
//
// By default, this plugin does nothing.
// You must enable it, and add your own hotkey maps.
// (Why? So future updates will not overwrite your customized init.php.
//  They will only update the init.php-dist file.)
//
// To enable the script:
//     cd plugins/dangkeys (this directory)
//     cp init.php-dist init.php
//
// Next, edit your copy init.php and customize the hook_hotkey_map function.
//
// Finally, reload your tt-rss web session. Enable the plugin in
//   Actions -> Preferences -> Plugins -> User Plugins.
//

// What if you want per-user hotkeys?
//     There's currently no way for a user to customize their own keys.
//     You can provide multiple hotkey plugins, if you like.
//     To do so:
//         make a new plugins/user1_keys directory
//         copy this init.php file to that directory
//         change this class name to a unique name, e.g. "User1_Custom_Keys"
class DangKeys extends Plugin {

	private $host;

	// You can change the description of this plugin here
	function about() {
		return array(1.0,
			"Enable dang's hotkey maps",
			"dang");
	}

	function init($host) {
		$this->host = $host;

		$host->add_hook($host::HOOK_HOTKEY_MAP, $this);
	}

	// This is where the hotkey maps are defined. You can uncomment
	// the example codes below, or add your own.
	//
	// Each map looks like this:
	//      $hotkeys[KEYS] = "KEY_FUNCTION";
	//
	// KEYS can be:
	//      "n"             = a single key character
	//      "*n"            = Shift + key character  (Shift-n)
	//      "^n"            = Ctrl + key character   (Ctrl-n)
	//      "f q"           = a sequence of two keys
	//      "(37)|left"     = a javascript key code and label
	//      "^(38)|Ctrl-Up" = can use * Shift or ^ Ctrl with key codes
	//  (search the web for "javascript key codes" for more examples)
	//
	// KEY_FUNCTION can be any of the functions defined by
	// get_hotkeys_info() located in the file include/functions.php
	//
	// The default hotkey bindings are defined by
	// get_hotkeys_map()  also located in the file include/functions.php

	function hook_hotkey_map($hotkeys) {
		$hotkeys["n"] = "next_article_noscroll";
		$hotkeys["i"] = "prev_article_noscroll";
		$hotkeys["u"] = "article_scroll_up";
		$hotkeys["e"] = "article_scroll_down";
		$hotkeys["t"] = "next_article_noscroll";
		$hotkeys["r"] = "prev_article_noscroll";
		$hotkeys["f"] = "article_scroll_up";
		$hotkeys["s"] = "article_scroll_down";
		$hotkeys["m u"] = "toggle_unread";
		return $hotkeys;

	}

	function api_version() {
		return 2;
	}
}

// vim:ft=php
?>
