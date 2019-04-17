wp.hooks.addFilter(
	'blocks.getSaveElement',
	'slug/modify-get-save-content-extra-props',
	modifyGetSaveContentExtraProps
);

/**
 * Wrap table block in div.
 *
 * @param {object} element
 * @param {object} blockType
 * @param {object} attributes
 *
 * @return The element.
 */
function modifyGetSaveContentExtraProps( element, blockType, attributes  ) {
	// Check if that is not a table block.
	if (blockType.name !== 'core/table') {
		return element;
	}

	// Return the table block with div wrapper.
	return (
		<div className='table-responsive'>
			{element}
		</div>
	);
}