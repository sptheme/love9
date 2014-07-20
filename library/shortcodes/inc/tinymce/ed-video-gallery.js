/**
 * Video Gallery Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.video_gallery', {
        init : function( ed, url ) {
             ed.addButton( 'video_gallery', {
                title : 'Insert Video Gallery',
                image : url + '/ed-icons/video_gallery.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Video Gallery Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-video-gallery-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'video_gallery', tinymce.plugins.video_gallery );
	jQuery( function() {
		var form = jQuery( '<div id="sc-video-gallery-form"><table id="sc-video-gallery-table" class="form-table">\
							<tr>\
							<th><label for="post_num">Number of video per page</label></th>\
							<td><input type="text" size="3" name="post_num" id="post_num" value="10" /><small> (value = -1 will show all)</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-video-gallery-submit" class="button-primary" value="Add Video Gallery" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-video-gallery-submit' ).click( function() {
			var post_num = table.find( '#post_num').val(),
			shortcode = '[video_gallery post_num="' + post_num + '"]';

			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();