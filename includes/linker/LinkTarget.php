<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @author Addshore
 */
namespace MediaWiki\Linker;

/**
 * @since 1.27
 */
interface LinkTarget {

	/**
	 * Get the namespace index.
	 * @since 1.27
	 *
	 * @return int Namespace index
	 */
	public function getNamespace(): int;

	/**
	 * Convenience function to test if it is in the namespace
	 * @since 1.27
	 *
	 * @param int $ns
	 * @return bool
	 */
	public function inNamespace( int $ns ): bool;

	/**
	 * Get the link fragment (i.e. the bit after the #) in text form.
	 * @since 1.27
	 *
	 * @return string link fragment
	 */
	public function getFragment(): string;

	/**
	 * Whether the link target has a fragment
	 * @since 1.27
	 *
	 * @return bool
	 */
	public function hasFragment(): bool;

	/**
	 * Get the main part with underscores.
	 * @since 1.27
	 *
	 * @return string Main part of the link, with underscores (for use in href attributes)
	 */
	public function getDBkey(): string;

	/**
	 * Returns the link in text form, without namespace prefix or fragment.
	 * This is computed from the DB key by replacing any underscores with spaces.
	 * @since 1.27
	 *
	 * @return string
	 */
	public function getText(): string;

	/**
	 * Creates a new LinkTarget for a different fragment of the same page.
	 * It is expected that the same type of object will be returned, but the
	 * only requirement is that it is a LinkTarget.
	 * @since 1.27
	 *
	 * @param string $fragment The fragment name, or "" for the entire page.
	 *
	 * @return LinkTarget
	 */
	public function createFragmentTarget( string $fragment );

	/**
	 * Whether this LinkTarget has an interwiki component
	 * @since 1.27
	 *
	 * @return bool
	 */
	public function isExternal(): bool;

	/**
	 * The interwiki component of this LinkTarget
	 * @since 1.27
	 *
	 * @return string
	 */
	public function getInterwiki(): string;

	/**
	 * Checks whether the given LinkTarget refers to the same target as this LinkTarget.
	 *
	 * Two link targets are considered the same if they have the same interwiki prefix,
	 * the same namespace ID, the same text, and the same fragment.
	 *
	 * @since 1.36
	 *
	 * @param LinkTarget $other
	 * @return bool
	 */
	public function isSameLinkAs( LinkTarget $other ): bool;

	/**
	 * Returns an informative human readable representation of the page identity,
	 * for use in logging and debugging.
	 *
	 * @return string
	 */
	public function __toString(): string;

}
