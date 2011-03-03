=== WP Permalauts ===
Contributors: blogcrafter_chris
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K7386WKAAVYWQ
Tags: permalinks, umlauts, german, deutsch, encoding, decoding, letters
Requires at least: 3.1
Tested up to: 3.1
Stable Tag: 0.7.0

Encoding/Converting German umlauts correctly for permalinks! The solution: WP Permalauts!


== Description ==

Plugin home: [WP Permalauts](http://permalauts.de/)

= NEW in version 0.7.0 =

Permalauts should now be Wordpress 3.1 compatible.

ONLY update IF you use the current Wordpress (3.1)!
For versions including 3.0.4 everything should work with Permalauts 0.6.0.304.

= General =

Deutsche Umlaute für Permalinks richtig umkodieren/konvertieren!

Encoding/Converting German umlauts correctly for permalinks!

Die Lösung / the solution: WP Permalauts!

This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.

(Replaces german umlauts in permalinks.)

= German description =

Dieses Plugin ist zugleich die Erneuerung und Fortführung des leider nicht mehr gepflegten o42-clean-umlauts (http://otaku42.de/2005/06/30/plugin-o42-clean-umlauts/).

Selbst in der aktuellen Fassung von Wordpress werden die Permalinks ganz simpel auf den erlaubten ASCII-Zeichensatz heruntergebrochen, das resultiert dann zu folgenden Umformungen: ä=a, ö=o, ü=u und ß=s — wobei gerade die letzte Umformung sehr unschön anmutet.

Korrekterweise werden Umlaute und das ß aber im Deutschen anders umgeschrieben, wenn man keine Möglichkeit hat, diese zu nutzen. So folgt dann: ä=ae, ö=oe, ü=ue und ß=ss.

Plugin home: [WP Permalauts](http://permalauts.de/)

== Installation ==

Plugin home: [WP Permalauts](http://permalauts.de/)

Use the Plugin installation system in your Wordpress system

-OR-

Upload "wp-permalauts.php" in wp-content/plugins/ . Then just activate it on your plugin management page.

That's it, you're done!

Go to the Settings page for Permalauts and select, what should be sanitized (default: post and page permalinks).

== Frequently Asked Questions ==

Plugin home: [WP Permalauts](http://permalauts.de/)

* Do you really have questions?

	I hope, not! :-)

* Since version 0.3 there is a footer text. It breaks my design.

	Easy going. Do an update to version 0.4.1 and you can change visibility of the footer under Settings in Wordpress.
	You also can hack the footer part with CSS, the ID of the box is `#wplfooter`

== Changelog ==

* Version 0.7.0

  Wordpress 3.1 compatible version. Attention: Do NOT update if you use a Wordpress version < 3.1 (everything to 3.0.4 should work with Permalauts 0.6.0.304)

* Version 0.6.0.304

  BUGFIXed.

* Version 0.5.0.304

  BUGFIX: No sanitization of URLs. Don't know why ...
  CHANGE: Better settings page - no dropdown list but checkboxes / radio buttons for better selections.

  * Version 0.5.0.304

  I18n of plugin settings.

* Version 0.5.0.304

	Now it's possible to sanitize category/taxonomy permalinks. Settings page extended: Option list "What should be 'cleaned' (sanitized) by Permalauts?". Default after install/update: post and page permalinks

  * Version 0.4.2

	Footer link is now opt-in.

* Version 0.4.1

	Rerelease of version 0.4 (don't know why wordpress ignored last rollout)


* Version 0.4

	Added option to show/hide footer text.


* Version 0.3

	Removed some useless filters. We need only the permalink filter, nothing else.

* Version 0.2

	Fix: Removed conversion of different types of dashes. So Javascript snippets in posts and pages should work again.

* Version 0.1

	Initial Release
	
== Upgrade Notice ==

= 0.7.0 =
Permalauts for Wordpress 3.1!

= 0.6.0.304 =
BUGFIX! Should work now! + Better settings page

= 0.5.1.304 =
I18n of plugin settings.

= 0.5.0.304 =
Category/Taxonomy permalinks can be cleaned by Permalauts! Go to Settings page to see options.

= 0.4.2 =
Cleaned version without footer link as default!

= 0.4.1 =
You can now switch the footer text on or off. Formatting via CSS id #wplfooter possible.

= 0.4 =
Please upgrade to version 0.4.1!

= 0.3 =
Please upgrade to version 0.4.1!
