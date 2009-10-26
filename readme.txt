=== WP PermaLauts ===
Contributors: blogcrafter_chris
Donate link: 
Tags: permalinks, umlauts, german, deutsch, encoding, decoding, letters
Requires at least: 2.x
Tested up to: 2.8.5
Stable Tag: 0.2

Encoding/Converting German umlauts correctly for permalinks! The solution: WP PermaLauts!


== Description ==

Deutsche Umlaute für Permalinks richtig umkodieren/konvertieren!

Encoding/Converting German umlauts correctly for permalinks!

Die Lösung / the solution: WP PermaLauts!

It transforms the german umlauts into well-formed entities (especially for permalinks).

(Replaces german umlauts in permalinks, posts, comments and feeds.)

= German description =

Dieses Plugin ist zugleich die Erneuerung und Fortführung des leider nicht mehr gepflegten o42-clean-umlauts (http://otaku42.de/2005/06/30/plugin-o42-clean-umlauts/).

Selbst in der aktuellen Fassung von Wordpress werden die Permalinks ganz simpel auf den erlaubten ASCII-Zeichensatz heruntergebrochen, das resultiert dann zu folgenden Umformungen: ä=a, ö=o, ü=u und ß=s — wobei gerade die letzte Umformung sehr unschön anmutet.

Korrekterweise werden Umlaute und das ß aber im Deutschen anders umgeschrieben, wenn man keine Möglichkeit hat, diese zu nutzen. So folgt dann: ä=ae, ö=oe, ü=ue und ß=ss.


== Installation ==

Upload "wp-permalauts.php" in wp-content/plugins/ . Then just activate it on your plugin management page.

That's it, you're done!

No options, no settings. Works fully in the background!


== Frequently Asked Questions ==

* Do you really have questions?

	I hope, not! :-)


== Changelog ==

* Version 0.2

	Fix: Removed conversion of different types of dashes. So Javascript snippets in posts and pages should work again.

* Version 0.1

	Initial Release