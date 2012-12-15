=== WP Permalauts ===
Contributors: blogcrafter_chris, cfoellmann
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K7386WKAAVYWQ
Tags: permalinks, umlauts, umlaute, url, umwandeln, rewrite, german, deutsch, encoding, decoding, letters
Requires at least: 2.x
Tested up to: 3.5
Stable Tag: 1.0.2


Deutsche Umlaute in Permalinks von WordPress

== Description ==

Plugin home: [WP Permalauts](http://permalauts.de/)

= General =

[DE] Umschreiben von deutschen Umlauten in URLs für Artikel, Seiten, Kategorien und Schlagwörter - nur mit **WP Permalauts!**

[EN] Rewrite German umlauts for URLs for Posts, Pages, Categories and Tags - only with Permalauts!

*The following plugin description will be in German only, because the target audience are German users.*

= Beschreibung =

Selbst in der aktuellen Fassung von Wordpress werden die Permalinks ganz simpel auf den erlaubten ASCII-Zeichensatz heruntergebrochen, das resultiert dann zu folgenden Umformungen: ä=a, ö=o, ü=u und ß=s — wobei gerade die letzte Umformung sehr unschön anmutet.

Korrekterweise werden Umlaute und das ß aber im Deutschen anders umgeschrieben, wenn man keine Möglichkeit hat, diese zu nutzen.

So folgt dann: ä=ae, ö=oe, ü=ue und ß=ss.

Dieses Plugin ist zugleich die Erneuerung und Fortführung des leider nicht mehr gepflegten o42-clean-umlauts (http://otaku42.de/2005/06/30/plugin-o42-clean-umlauts/).

**Nur hier:** Es werden die Permalinks/Slugs von Beiträgen, Seiten, Kategorien und Schlagwörtern umgeschrieben! (Kann feinjustiert werden in den Einstellungen.)

Plugin home: [WP Permalauts](http://permalauts.de/)
GitHub repo: [https://github.com/kaffee-mit-milch/wp-permalauts](https://github.com/kaffee-mit-milch/wp-permalauts)
Help to translate the plugin at [https://translate.foe-services.de/projects/wp-permalauts](https://translate.foe-services.de/projects/wp-permalauts)

== Installation ==

Plugin home: [WP Permalauts](http://permalauts.de/)

Use the Plugin installation system in your Wordpress system

-OR-

Upload "wp-permalauts" folder in wp-content/plugins/ . Then just activate it on your plugin management page.

That's it, you're done!

Go to the Settings page for Permalauts and select, what should be sanitized (default: post and page permalinks).

== Changelog ==

Plugin home: [WP Permalauts](http://permalauts.de/)

* Version 1.0.2

  Code cleanups. Compatibility check: WP 3.5 works.

* Version 1.0.0

  MIT/X11 license added.

* Version 0.8.0

  Windows Livewriter support. Compatibility check: WP 3.3 works.

* Version 0.7.0

  Wordpress 3.1 compatible version.

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

= 1.0.2 =
Code cleanups. Compatibility check: WP 3.5 works.

= 1.0.0 =
MIT/X11 license added.

= 0.8.0 =
Users of Windows Livewriter should upgrade to get better permalauts support.

= 0.7.0 =
Permalauts updated for Wordpress 3.1!

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
