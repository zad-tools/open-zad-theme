#!/usr/bin/env bash
#
# Deploy a version of Open ZAD Theme to the WordPress.org themes SVN.
#
# ONLY run this AFTER the theme has been approved and you have SVN access at
# https://themes.svn.wordpress.org/open-zad-theme/ . Themes SVN uses one
# directory per version (there is no trunk/tags split like plugins).
#
# Usage:
#   bin/svn-deploy.sh [version]
#
#   version   Optional. Defaults to the Version: line in style.css.
#
# Environment:
#   WPORG_USER   Your wordpress.org username (svn will also prompt if unset).
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SLUG="open-zad-theme"
SVN_URL="https://themes.svn.wordpress.org/${SLUG}"

if ! command -v svn >/dev/null 2>&1; then
	echo "error: subversion (svn) is not installed." >&2
	exit 1
fi

VERSION="${1:-}"
if [ -z "${VERSION}" ]; then
	VERSION="$(grep -iE '^\s*Version:' "${REPO_ROOT}/style.css" | head -1 | sed -E 's/.*Version:[[:space:]]*//' | tr -d '[:space:]')"
fi

if [ -z "${VERSION}" ]; then
	echo "error: could not determine version; pass it explicitly." >&2
	exit 1
fi

echo "Deploying ${SLUG} version ${VERSION} to ${SVN_URL}"

# Fresh build of the exact files that ship.
bash "${REPO_ROOT}/bin/build-zip.sh" >/dev/null

WORKDIR="$(mktemp -d)"
trap 'rm -rf "${WORKDIR}"' EXIT

# Sparse checkout: we only need to add a new version directory.
svn checkout --depth=immediates "${SVN_URL}" "${WORKDIR}/svn" ${WPORG_USER:+--username "${WPORG_USER}"}

if [ -d "${WORKDIR}/svn/${VERSION}" ]; then
	echo "error: version ${VERSION} already exists in SVN. Bump the version first." >&2
	exit 1
fi

# Unpack the built zip into the version directory.
mkdir -p "${WORKDIR}/svn/${VERSION}"
( cd "${WORKDIR}" && unzip -q "${REPO_ROOT}/dist/${SLUG}.zip" -d unpacked )
cp -R "${WORKDIR}/unpacked/${SLUG}/." "${WORKDIR}/svn/${VERSION}/"

cd "${WORKDIR}/svn"
svn add "${VERSION}"
svn commit -m "Release ${VERSION}" ${WPORG_USER:+--username "${WPORG_USER}"}

echo "Committed ${SLUG} ${VERSION} to WordPress.org SVN."
