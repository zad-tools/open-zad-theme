#!/usr/bin/env bash
#
# Build the WordPress.org submission zip: dist/open-zad.zip
#
# Stages the theme files under dist/open-zad/ (so the folder inside the
# zip is the theme slug) and zips it. Repo tooling is excluded; the Tailwind
# source (src/, tailwind.config.js, package.json) is kept for transparency.
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SLUG="open-zad"
DIST="${REPO_ROOT}/dist"
STAGE="${DIST}/${SLUG}"
ZIP="${DIST}/${SLUG}.zip"

# Rebuild CSS if tailwindcss is installed, so the zip always ships fresh assets.
if [ -x "${REPO_ROOT}/node_modules/.bin/tailwindcss" ]; then
	( cd "${REPO_ROOT}" && npm run build >/dev/null )
	echo "Rebuilt assets/css/main.css"
fi

rm -rf "${STAGE}" "${ZIP}"
mkdir -p "${STAGE}"

rsync -a "${REPO_ROOT}/" "${STAGE}/" \
	--exclude ".git" \
	--exclude ".claude" \
	--exclude ".gitignore" \
	--exclude ".editorconfig" \
	--exclude "node_modules" \
	--exclude "dist" \
	--exclude "bin" \
	--exclude "README.md" \
	--exclude "package-lock.json" \
	--exclude ".DS_Store"

( cd "${DIST}" && zip -qr "${SLUG}.zip" "${SLUG}" )
rm -rf "${STAGE}"

echo "Built ${ZIP}"
unzip -l "${ZIP}" | tail -1
