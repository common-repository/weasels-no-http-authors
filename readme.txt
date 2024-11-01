=== Weasel's No HTTP Authors ===
Contributors: weasello
Donate link: 
Tags: author, comments, spam, http
Requires at least: 2.0.2
Tested up to: 2.3.1
Stable tag: 1.0

Checks to see if the author name in your comments contains "HTTP:" to help filter out spam.

== Description ==

We've been running the anti-spam Akismet plugin for Wordpress, but still we get spam comments of a particular breed. This breed is one where the username is a URL, and the message body is an inoffensive message. Something like, "Great news, thanks!", which looks innocent enough at first! Until you go to see who posted it and it's some Viagra site.

It appears other anti-spam plugins don't have the capability to really defend against a username attack, as they only scan the actual comment filler. This plugin attempts to fix this one specific spam attack.

This plugin will scan the username listed on each comment and scan it for the phrase "HTTP:", indicating that the username is actually an HTML link. (Version 0.4u also looks for the phrase "Goodwork", a common WP spambot response). The plugin doesn't actually delete the spam or send it to some central database; it instead activates Akismet and do it's thing automatically. So essentially, my plugin just flips a little flag and doesn't do any of the dirty work.

Planned updates are an admin screen where you can define custom strings to be banned from certain fields. For the time being, I have a very well documented source code and you can always edit it to combat your specific type of spam!

== Installation ==

1. Upload `nohttpauth.php` or it's containing directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress... There is no configuration!

== Frequently Asked Questions ==

= What is the difference between version 0.4 and 1.0? =

Better documentation!

== Screenshots ==