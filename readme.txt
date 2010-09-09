=== WP PermaLauts ===
Contributors: blogcrafter_chris
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7035372
Tags: permalinks, umlauts, german, deutsch, encoding, decoding, letters
Requires at least: 2.x
Tested up to: 3.0.1
Stable Tag: 0.4.1

Encoding/Converting German umlauts correctly for permalinks! The solution: WP PermaLauts!


== Description ==

Deutsche Umlaute für Permalinks richtig umkodieren/konvertieren!

Encoding/Converting German umlauts correctly for permalinks!

Die Lösung / the solution: WP PermaLauts!

This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.

(Replaces german umlauts in permalinks.)

= German description =

Dieses Plugin ist zugleich die Erneuerung und Fortführung des leider nicht mehr gepflegten o42-clean-umlauts (http://otaku42.de/2005/06/30/plugin-o42-clean-umlauts/).

Selbst in der aktuellen Fassung von Wordpress werden die Permalinks ganz simpel auf den erlaubten ASCII-Zeichensatz heruntergebrochen, das resultiert dann zu folgenden Umformungen: ä=a, ö=o, ü=u und ß=s — wobei gerade die letzte Umformung sehr unschön anmutet.

Korrekterweise werden Umlaute und das ß aber im Deutschen anders umgeschrieben, wenn man keine Möglichkeit hat, diese zu nutzen. So folgt dann: ä=ae, ö=oe, ü=ue und ß=ss.

Plugin home: [WP PermaLauts](http://blogcraft.de/wordpress-plugins/wp-permalauts/) on blogcraft.de

== Installation ==

Upload "wp-permalauts.php" in wp-content/plugins/ . Then just activate it on your plugin management page.

That's it, you're done!

No options, no settings. Works fully in the background!


== Frequently Asked Questions ==

* Do you really have questions?

	I hope, not! :-)

* Since version 0.3 there is a footer text. It breaks my design.

	Easy going. Do an update to version 0.4.1 and you can change visibility of the footer under Settings in Wordpress.
	You also can hack the footer part with CSS, the ID of the box is `#wplfooter`

== Changelog ==

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

= 0.4.1 =
You can now switch the footer text on or off. Formatting via CSS id #wplfooter possible.

= 0.4 =
Please upgrade to version 0.4.1!

= 0.3 =
Please upgrade to version 0.4.1!
