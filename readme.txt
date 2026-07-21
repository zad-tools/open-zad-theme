=== Open ZAD ===
Contributors: ahmedvnabil
Requires at least: 6.5
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.0.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, news, two-columns, right-sidebar, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, rtl-language-support, block-styles, wide-blocks, sticky-post, footer-widgets

A fast, accessible, RTL-first WordPress theme with a clean, utilitarian design system configured from the Customizer.

== Description ==

Open ZAD Theme is a lightweight, presentation-only theme for blogs, magazines, and content sites. It ships a compiled utility stylesheet and a tiny vanilla-JavaScript navigation script — everything is served from the theme folder, with no external requests and no page builder required to run it.

Colors, logo, site title, and menus are all set from the WordPress Customizer. The design is RTL-first with logical properties throughout, uses the system font stack for zero-latency text rendering, and targets WCAG 2.1 AA with a skip link, keyboard-navigable menu, and proper ARIA labelling.

Features:

* Customizer color controls (primary, accent, text) with live preview
* Core custom logo, custom menus (primary + footer), and widget areas (sidebar + footer)
* Featured images, threaded comments, and post/comment pagination
* Right sidebar on blog and archive views; full-width pages
* Translation-ready and RTL-ready out of the box

== Installation ==

1. In your admin, go to Appearance > Themes > Add New.
2. Click Upload Theme and choose the theme zip, or copy the `open-zad-theme` folder to `wp-content/themes/`.
3. Click Activate.
4. Go to Appearance > Customize to set your colors, logo, and menus.

== Frequently Asked Questions ==

= Does this theme require any plugins? =

No. The theme is self-contained and works with a default WordPress install.

= Does it load anything from a CDN or external server? =

No. The stylesheet and script are bundled in the theme and served locally.

= Is it compatible with the block editor? =

Yes. It declares wide-alignment, responsive-embeds, and editor styles so block content matches the front end.

== Copyright ==

Open ZAD Theme, Copyright 2024-2026 Ahmed Nabil.
Open ZAD Theme is distributed under the terms of the GNU GPL v2 or later.

This theme uses the following resource at build time only (it is not shipped as a runtime dependency):

* Tailwind CSS — compiles src/input.css into assets/css/main.css
  License: MIT, https://github.com/tailwindlabs/tailwindcss

The compiled stylesheet source (src/input.css + tailwind.config.js) is included in the theme for transparency; rebuild with `npm install && npm run build`.

screenshot.png is a rendering of this theme itself; the featured-image graphic shown in it is self-authored by the theme author. Both are licensed under GPL-2.0-or-later.

== Changelog ==

= 1.0.2 =
* Point the Theme URI at the theme's GitHub repository.

= 1.0.1 =
* Add Customizer support for a custom background and an optional header image.
* Add three block styles (Bordered quote, Framed image, Bordered card group).
* Add two block patterns (Call to action card, Three-column features) under an "Open ZAD" category.

= 1.0.0 =
* Initial release.
