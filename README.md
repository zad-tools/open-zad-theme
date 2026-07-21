# Open ZAD Theme

A fast, accessible, RTL-first WordPress theme with a clean, utilitarian design
system configured entirely from the Customizer. Presentation-only — no page
builder, no admin console, no external requests — built to meet the
[WordPress.org Theme Directory](https://make.wordpress.org/themes/handbook/review/required/)
requirements.

This repository **is** the theme: the repo root is the theme folder
(`open-zad-theme`). It is a standalone codebase, independent from the
full-featured "Open ZAD Theme" used for self-hosted distribution.

## Requirements

- WordPress 6.5+
- PHP 8.0+

## Local development

The stylesheet is compiled from Tailwind CSS. The compiled
`assets/css/main.css` is committed, so the theme runs with no build step;
rebuild only when you edit templates or `src/input.css`.

```bash
npm install          # installs tailwindcss (build-time only)
npm run build        # src/input.css -> assets/css/main.css (minified)
npm run watch        # rebuild on change while developing
```

## Repository layout

```
.                       repo root == theme folder
├── *.php               template hierarchy (index, single, page, archive, ...)
├── inc/                customizer.php, template-tags.php
├── template-parts/     content*.php partials
├── assets/
│   ├── css/main.css    compiled (committed)
│   └── js/             navigation.js, customizer.js (vanilla, no framework)
├── src/input.css       Tailwind source (compiles to assets/css/main.css)
├── tailwind.config.js  build config
├── languages/          open-zad-theme.pot
├── readme.txt          WordPress.org readme (user-facing)
├── style.css           theme header
├── screenshot.png      1200x900  (see "Before first submission")
└── bin/                build + deploy helpers (not shipped in the theme)
```

## Build the submission zip

```bash
bin/build-zip.sh        # -> dist/open-zad-theme.zip
```

The zip contains the theme files (including the Tailwind source for
transparency) and excludes repo tooling (`bin/`, `.git`, `node_modules`,
`README.md`, `.editorconfig`, `.gitignore`).

## Before your first submission

WordPress.org review runs gates that cannot be checked without a live
WordPress install. Do these first — they are required, not optional:

1. **Regenerate `screenshot.png`.** The committed file is a placeholder and
   must be replaced with a real 1200×900 render of *this* theme. A screenshot
   that does not represent the theme is a common rejection reason.
2. **Run the Theme Check plugin** and **Theme Sniffer** (WPCS) on a local
   install and confirm zero REQUIRED / ERROR results.
3. **Test with the Theme Unit Test data** (the official WordPress.org XML):
   RTL, threaded comments, pagination, widgets, and every Customizer control.
4. **Confirm the slug `open-zad-theme` is available** in the directory and the
   name is not trademarked.

## Submitting and updating on WordPress.org

Initial submission is a zip upload at
<https://wordpress.org/themes/upload/>. After approval you get SVN access at
`https://themes.svn.wordpress.org/open-zad-theme/`. Themes SVN uses one
folder per version (no trunk/tags). `bin/svn-deploy.sh` automates that:

```bash
bin/svn-deploy.sh 1.0.0            # reads the version from style.css by default
```

Read the script header before first use — it needs your wordpress.org
credentials and only runs after the theme is approved.

## License

GPL-2.0-or-later. See [LICENSE](LICENSE). The theme uses Tailwind CSS (MIT) at
build time only; it is not a runtime dependency.
