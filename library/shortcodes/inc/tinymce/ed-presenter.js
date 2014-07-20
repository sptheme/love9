/**
 * Presenter Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.presenter', {
        init : function( ed, url ) {
             ed.addButton( 'presenter', {
                title : 'Insert Presenter',
                image : url + '/ed-icons/presenter.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Presenter Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-presenter-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'presenter', tinymce.plugins.presenter );
	jQuery( function() {
		var form = jQuery( '<div id="sc-presenter-form"><table id="sc-presenter-table" class="form-table">\
							<tr>\
							<th><label for="post_num">Number of video per page</label></th>\
							<td><input type="text" size="3" name="post_num" id="post_num" value="10" /><small> (value = -1 will show all)</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-presenter-submit" class="button-primary" value="Add Presenter" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-presenter-submit' ).click( function() {
			var post_num = table.find( '#post_num').val(),
			shortcode = '[presenter post_num="' + post_num + '"]';

			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();