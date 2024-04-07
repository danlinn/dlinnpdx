import toast from 'react-hot-toast';
import { twMerge } from 'tailwind-merge';
import clsx from 'clsx';
import { toastBody } from '../helpers';

export const classNames = ( ...classes ) => twMerge( clsx( classes ) );

export const debounce = ( func, wait, immediate ) => {
	let timeout;
	return ( ...args ) => {
		const later = () => {
			timeout = null;
			if ( ! immediate ) {
				func( ...args );
			}
		};
		const callNow = immediate && ! timeout;
		clearTimeout( timeout );
		timeout = setTimeout( later, wait );
		if ( callNow ) {
			func( ...args );
		}
	};
};

export const getPatternsWithCategories = (
	allBlocks = [],
	allCategories = [],
	type = 'block'
) => {
	const categories = new Map();
	const patterns = new Array();

	allCategories.forEach( ( categoryItem ) => {
		const pattern = allBlocks.find(
			( patt ) => categoryItem.id === patt.category
		);
		const allCatBlocks = allBlocks.filter(
			( patt ) => categoryItem.id === patt.category && patt.type === type
		);

		if ( pattern?.category && !! categoryItem ) {
			if ( ! categories.has( pattern.category ) ) {
				categories.set( pattern.category, categoryItem );
			}
		}
		patterns.push( ...allCatBlocks );
	} );

	return { patterns, categories: Array.from( categories.values() ) };
};

export const getPagesWithCategories = (
	allPages = [],
	allCategories = [],
	type = 'page'
) => {
	const categories = new Map();
	const pages = new Array();

	allCategories.forEach( ( categoryItem ) => {
		const pattern = allPages.find(
			( patt ) => categoryItem.id === patt.category
		);
		const allCatPages = allPages.filter(
			( patt ) => categoryItem.id === patt.category && patt.type === type
		);

		if ( pattern?.category && !! categoryItem ) {
			if ( ! categories.has( pattern.category ) ) {
				categories.set( pattern.category, categoryItem );
			}
		}
		pages.push( ...allCatPages );
	} );

	return { pages, categories: Array.from( categories.values() ) };
};

/**
 * Updates the sequence of blocks by category.
 *
 * @param {Array}  allItems      - An array of all blocks.
 * @param {Array}  allCategories - An array of all categories.
 * @param {string} type          - The type should be either "block" or "page".
 */
export const updateSequenceByCategory = (
	allItems = [],
	allCategories = [],
	type = 'block'
) => {
	const updatedItems = [];

	allCategories.forEach( ( categoryItem ) => {
		const allCatItems = allItems.filter(
			( patt ) => categoryItem.id === patt.category && patt.type === type
		);
		updatedItems.push( ...allCatItems );
	} );

	return updatedItems;
};

/**
 * Get row number by index value.
 *
 * @param {number} index
 * @return {number} number of row
 */
export const getRowNum = ( index ) => {
	return Math.floor( index / 3 ) + 1;
};

/**
 * Get column number by index value.
 *
 * @param {number} index
 * @return {number} number of column
 */
export const getColumnNum = ( index ) => {
	return ( index % 3 ) + 1;
};

/**
 * Get the loading skeleton type by row and column number.
 *
 * @param {number} row    row number.
 * @param {number} column column number.
 * @return {number} skeleton type number.
 */
export const getLoadingSkeletonType = ( row, column ) => {
	const types = [ 1, 2, 3 ];
	const index = ( row - 1 ) % 3;
	const typeIndex = ( column - 1 + index ) % 3;
	return types[ typeIndex ];
};

/**
 * Set value to session storage by key.
 *
 * @param {string} key
 * @param {*}      value
 */
export const setToSessionStorage = ( key, value ) => {
	const sessionStorageAPI = window.sessionStorage;
	try {
		sessionStorageAPI.setItem( key, JSON.stringify( value ) );
	} catch ( error ) {
		console.error( error );
	}
};

/**
 * Get value from session storage by key.
 *
 * @param {string} key
 * @param {*}      defaultValue
 * @return {*} value
 */
export const getFromSessionStorage = ( key, defaultValue = undefined ) => {
	const sessionStorageAPI =
		typeof sessionStorage !== 'undefined'
			? sessionStorage
			: window.sessionStorage;
	try {
		const value = sessionStorageAPI.getItem( key );
		return !! value ? JSON.parse( value ) : defaultValue;
	} catch ( error ) {
		console.error( error );
		return defaultValue;
	}
};

/**
 * Clear the session storage by key.
 *
 * @param {string} key
 */
export const clearSessionStorage = ( key ) => {
	const sessionStorageAPI =
		typeof sessionStorage !== 'undefined'
			? sessionStorage
			: window.sessionStorage;
	try {
		sessionStorageAPI.removeItem( key );
	} catch ( error ) {
		console.error( error );
	}
};

/**
 * Generate a unique string of specified length.
 *
 * @param {number} length The length of the string to be generated. Default is 8.
 * @return {string} The generated unique string.
 */
const uniqString = ( length = 8 ) => {
	// Define the characters to be used in the string.
	const chars =
		'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	let result = '';
	// Generate the string by randomly selecting characters from the defined set.
	for ( let i = length; i > 0; --i ) {
		result += chars[ Math.floor( Math.random() * chars.length ) ];
	}
	return result.toLowerCase();
};

/**
 * Recursively manipulate the block ID attribute of an array of blocks.
 *
 * @param {Array} blocks The array of blocks to manipulate.
 */
export const manipulateAttributeBlockId = ( blocks ) => {
	blocks.forEach( ( item ) => {
		if ( item?.attributes ) {
			item.attributes.block_id = uniqString();
		}
		if ( item?.innerBlocks?.length > 0 ) {
			manipulateAttributeBlockId( item.innerBlocks );
		}
	} );

	// Return the manipulated blocks.
	return blocks;
};

/**
 * Get plugin status.
 *
 * @param {string} pluginStatus
 * @return {Object} status object
 */

/**
 * Returns an object with the status of a plugin.
 *
 * @param {string} pluginStatus - The status of the plugin. Can be 'active', 'inactive', or 'not-installed'.
 * @return {{ active: boolean, inactive: boolean, notInstalled: boolean }} - An object with the status of the plugin.
 */
const getPluginStatus = ( pluginStatus ) => {
	const status = {
		active: false,
		inactive: false,
		notInstalled: false,
	};
	switch ( pluginStatus ) {
		case 'active':
			status.active = true;
			break;
		case 'inactive':
			status.inactive = true;
			break;
		case 'not-installed':
			status.notInstalled = true;
			break;
		default:
			status.notInstalled = true;
			break;
	}
	return status;
};

/**
 * Get Spectra Pro status.
 *
 * @return {{ active: boolean, inactive: boolean, notInstalled: boolean }} - An object with the status of the plugin.
 */
export const getSpectraProStatus = () => {
	const { spectra_pro_status } = astraSitesVars;

	return getPluginStatus( spectra_pro_status );
};

/**
 * Get Astra Pro status.
 *
 * @return {{ active: boolean, inactive: boolean, notInstalled: boolean }} - An object with the status of the plugin.
 */
export const getAstraSitesProStatus = () => {
	const { astra_sites_pro_status } = astraSitesVars;

	return getPluginStatus( astra_sites_pro_status );
};

/**
 * Adjusts the height of a textarea element based on its content.
 * If the content exceeds a maximum height, the element will be scrollable.
 *
 * @param {HTMLElement} node      - The textarea element to adjust.
 * @param {number}      maxHeight
 */
export const adjustTextAreaHeight = ( node, maxHeight = 400 ) => {
	if ( ! node ) {
		return;
	}
	node.style.height = 'auto';
	if ( node.scrollHeight > maxHeight ) {
		node.style.height = `${ maxHeight }px`;
		node.style.overflowY = 'auto';
	} else {
		node.style.height = `${ node.scrollHeight }px`;
		node.style.overflowY = 'hidden';
	}
};

/**
 * Converts an object's keys from snake_case to camelCase.
 *
 * @param {Object} obj - The object to convert.
 * @return {Object} - A new object with camelCase keys.
 */
export const objSnakeToCamelCase = ( obj ) => {
	if ( ! obj ) {
		return {};
	}

	const newObj = {};
	for ( const [ key, value ] of Object.entries( obj ) ) {
		const camelKey = key.replace( /_([a-z])/g, ( match, p1 ) =>
			p1.toUpperCase()
		);
		newObj[ camelKey ] = value;
	}
	return newObj;
};

/**
 * Formats a number to display in a human-readable format.
 *
 * @param {number} num - The number to format.
 * @return {string} The formatted number.
 */
export const formatNumber = ( num ) => {
	if ( ! num ) {
		return '0';
	}
	const thresholds = [
		{ magnitude: 1e12, suffix: 'T' },
		{ magnitude: 1e9, suffix: 'B' },
		{ magnitude: 1e6, suffix: 'M' },
		{ magnitude: 1e3, suffix: 'K' },
		{ magnitude: 1, suffix: '' },
	];

	const { magnitude, suffix } = thresholds.find(
		( { magnitude: magnitudeValue } ) => num >= magnitudeValue
	);

	const formattedNum = ( num / magnitude ).toFixed( 1 ).replace( /\.0$/, '' );

	return num < 1000
		? num.toString()
		: formattedNum + suffix + ( num % magnitude > 0 ? '+' : '' );
};

/**
 * Get color className based on the percentage.
 *
 * @param {number} percentage - The percentage.
 * @return {string} - The color className.
 */
export const getColorClass = ( percentage ) => {
	const colorClassNames = {
		default: '',
		warning: 'text-credit-warning',
		danger: 'text-credit-danger',
	};

	if ( percentage <= 10 ) {
		return colorClassNames.danger;
	} else if ( percentage <= 20 ) {
		return colorClassNames.warning;
	}
	return colorClassNames.default;
};

export const addHttps = ( url ) => {
	if ( ! /^https?:\/\//i.test( url ) ) {
		url = 'https://' + url;
	}
	return url;
};

export const sendPostMessage = ( data, id ) => {
	const frame = document.getElementById( id );
	if ( ! frame ) {
		return;
	}
	frame.contentWindow.postMessage(
		{
			call: 'zipwpPreviewDispatch',
			value: data,
		},
		'*'
	);
};

export const copyToClipboard = ( text ) => {
	// Copy the text inside the text field
	navigator.clipboard.writeText( text );
};

export const handleCopyToClipboard = ( event, text ) => {
	copyToClipboard( text );
	toast.success(
		toastBody( {
			message: 'Copied to clipboard',
		} )
	);
};

export const limitExceeded = () => {
	const zipPlans = astraSitesVars?.zip_plans;
	const sitesRemaining = zipPlans?.plan_data?.remaining;
	const aiSitesRemainingCount = sitesRemaining?.ai_sites_count;
	const allSitesRemainingCount = sitesRemaining?.all_sites_count;

	if (
		( typeof aiSitesRemainingCount === 'number' &&
			aiSitesRemainingCount <= 0 ) ||
		( typeof allSitesRemainingCount === 'number' &&
			allSitesRemainingCount <= 0 )
	) {
		return true;
	}

	return false;
};
