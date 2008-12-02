<?php
/*
		Options page for the In The Loop plugin
		http://xentek.net/code/wordpress/plugins/in-the-loop/
*/

/*  Copyright 2008  Eric Marden  (email : wp@xentek.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$path = PLUGINDIR.'/'.dirname(plugin_basename(__FILE__));

if ( !empty($_POST ) ) :
	update_option('intheloop_before_content',$_POST['intheloop_before_content']);
  	update_option('intheloop_after_content',$_POST['intheloop_after_content']);

	if (!isset($_POST['intheloop_before_content_teaser'])) { $_POST['intheloop_before_content_teaser'] = 0; }
	if (!isset($_POST['intheloop_before_content_content'])) { $_POST['intheloop_before_content_content'] = 0; }
	if (!isset($_POST['intheloop_before_content_excerpt']	)) { $_POST['intheloop_before_content_excerpt']	 = 0; }
	if (!isset($_POST['intheloop_before_content_rss'])) { $_POST['intheloop_before_content_rss'] = 0; }
	if (!isset($_POST['intheloop_before_content_php'])) { $_POST['intheloop_before_content_php'] = 0; }
	if (!isset($_POST['intheloop_before_content_page'])) { $_POST['intheloop_before_content_page'] = 0; }
	if (!isset($_POST['intheloop_after_content_teaser'])) { $_POST['intheloop_after_content_teaser'] = 0; }
	if (!isset($_POST['intheloop_after_content_content'])) { $_POST['intheloop_after_content_content'] = 0; }
	if (!isset($_POST['intheloop_after_content_excerpt'])) { $_POST['intheloop_after_content_excerpt'] = 0; }
	if (!isset($_POST['intheloop_after_content_rss'])) { $_POST['intheloop_after_content_rss'] = 0; }
	if (!isset($_POST['intheloop_after_content_php'])) { $_POST['intheloop_after_content_php'] = 0; }
	if (!isset($_POST['intheloop_after_content_page'])) { $_POST['intheloop_after_content_page'] = 0; }
	
	update_option('intheloop_before_content_teaser',$_POST['intheloop_before_content_teaser']);
	update_option('intheloop_before_content_content',$_POST['intheloop_before_content_content']);
	update_option('intheloop_before_content_excerpt',$_POST['intheloop_before_content_excerpt']);	
	update_option('intheloop_before_content_rss',$_POST['intheloop_before_content_rss']);
	update_option('intheloop_before_content_php',$_POST['intheloop_before_content_php']);
	update_option('intheloop_before_content_page',$_POST['intheloop_before_content_page']);
	update_option('intheloop_after_content_teaser',$_POST['intheloop_after_content_teaser']);
	update_option('intheloop_after_content_content',$_POST['intheloop_after_content_content']);
	update_option('intheloop_after_content_excerpt',$_POST['intheloop_after_content_excerpt']);	
	update_option('intheloop_after_content_rss',$_POST['intheloop_after_content_rss']);
	update_option('intheloop_after_content_php',$_POST['intheloop_after_content_php']);
	update_option('intheloop_after_content_page',$_POST['intheloop_after_content_page']);

?>
<div id="message" class="updated fade"><p><strong><em><?php _e("You're in the loop!",'intheloop'); ?></em> <?php _e('Options Saved.','intheloop'); ?></strong></p></div>
<?php endif; 
	$intheloop_before_content_teaser = get_option('intheloop_before_content_teaser');
	$intheloop_before_content_content = get_option('intheloop_before_content_content');
	$intheloop_before_content_excerpt = get_option('intheloop_before_content_excerpt');	
	$intheloop_before_content_rss = get_option('intheloop_before_content_rss');
	$intheloop_before_content_php = get_option('intheloop_before_content_php');
	$intheloop_before_content_page = get_option('intheloop_before_content_page');
	$intheloop_after_content_teaser = get_option('intheloop_after_content_teaser');
	$intheloop_after_content_content = get_option('intheloop_after_content_content');
	$intheloop_after_content_excerpt = get_option('intheloop_after_content_excerpt');	
	$intheloop_after_content_rss = get_option('intheloop_after_content_rss');
	$intheloop_after_content_php = get_option('intheloop_after_content_php');
	$intheloop_after_content_page = get_option('intheloop_after_content_page');
?>
<script type="text/javascript" src="/<?php echo $path; ?>/jquery.textarearesizer.compressed.js"></script>
<script type="text/javascript">
	/* jQuery textarea resizer plugin usage */
	jQuery(document).ready(function() {
		jQuery('textarea.resizable:not(.processed)').TextAreaResizer();
	});
</script>
<style type="text/css" media="screen">
<!--
	label.head {
		display: block;
		font-weight: bold;
		font-size: 120%;
		margin-bottom: 5px;
		width: 720px;
		padding: 5px;
	}
	
	label.small {
		font-weight: bold;
		font-size: 80%;
		display: inline;
		margin-right: 30px;
	}

	p.hook {
		border-bottom: 1px solid #ebebeb;
		margin-bottom: 10px;
		padding: 20px;
	}

	p.info {
		border-top: 1px solid #ebebeb;
	}

	
	small {
		font-weight: bold;
	}
	
	div.grippie {
		background: #EEEEEE url(/<?php echo $path; ?>/grippie.png) no-repeat scroll center center;
		border-color: #DDDDDD;
		border-style: solid;
		border-width: 0 1px 1px;
		cursor: s-resize;
		height: 9px;
		overflow: hidden;
	}
	
	.resizable-textarea textarea {
		display: block;
		margin-bottom: 0;
		font-family: monospace;
		height: 66px;
	}
	
-->
</style>
<div class="wrap">
	<h2><?php _e('In The Loop','intheloop'); ?></h2>
	<p><strong><?php _e('Be in the loop!','intheloop'); ?></strong> <?php _e("Not all plugins provide a way to automatically attach code before or after the post content. Or you might have some other HTML, CSS or JavaScript you'd like to include with every post. Now's your chance. With",'intheloop'); ?> <strong><?php _e('In The Loop','intheloop'); ?></strong> <?php _e('you can easily add any code you like to your posts and pages, and not have to do any messy edits to your theme files either. Bonus!','intheloop'); ?></p>
	<p><small><?php _e('The options below control where the content will show up, but all locations will use the same content.','intheloop'); ?></small></p>
	<form method="post" action="" id="intheloop-settings">
		<?php wp_nonce_field('update-options'); ?>
		<input type="hidden" name="action" value="update" />
		
		<p class="hook">
			<label class="head" for="intheloop_before_content">Before The Content</label>
			<textarea class="resizable" id="intheloop_before_content" name="intheloop_before_content" rows="9" cols="108"><?php echo stripslashes(get_option('intheloop_before_content')); ?></textarea>
			<br />
			<input <?php if ($intheloop_before_content_teaser) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_teaser" id="intheloop_before_content_teaser" /> <label for="intheloop_before_content_teaser" class="small"><?php _e('Apply to Teaser?','intheloop'); ?></label>
			<input <?php if ($intheloop_before_content_content) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_content" id="intheloop_before_content_content" /> <label for="intheloop_before_content_content" class="small"><?php _e('Apply to Full Content?','intheloop'); ?></label>
			<input <?php if ($intheloop_before_content_excerpt) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_excerpt" id="intheloop_before_content_excerpt" /> <label for="intheloop_before_content_excerpt" class="small"><?php _e('Apply to Excerpt?','intheloop'); ?></label>
			<input <?php if ($intheloop_before_content_page) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_page" id="intheloop_before_content_page" /> <label for="intheloop_before_content_page" class="small"><?php _e('Apply to Pages?','intheloop'); ?></label>
			<input <?php if ($intheloop_before_content_rss) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_rss" id="intheloop_before_content_rss" /> <label for="intheloop_before_content_rss" class="small"><?php _e('Apply To RSS Feed?','intheloop'); ?></label>
			<input <?php if ($intheloop_before_content_php) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_before_content_php" id="intheloop_before_content_php" /> <label for="intheloop_before_content_php" class="small"><?php _e('Execute PHP?','intheloop'); ?></label>
		</p>
		
		<p class="hook">
			<label class="head" for="intheloop_after_content">After The Content</label>
			<textarea class="resizable" id="intheloop_after_content" name="intheloop_after_content" rows="9" cols="108"><?php echo stripslashes(get_option('intheloop_after_content')); ?></textarea>
			<br />
			<input <?php if ($intheloop_after_content_teaser) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_teaser" id="intheloop_after_content_teaser" /> <label for="intheloop_after_content_teaser" class="small"><?php _e('Apply to Teaser?','intheloop'); ?></label>
			<input <?php if ($intheloop_after_content_content) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_content" id="intheloop_after_content_content" /> <label for="intheloop_after_content_content" class="small"><?php _e('Apply to Full Content?','intheloop'); ?></label>
			<input <?php if ($intheloop_after_content_excerpt) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_excerpt" id="intheloop_after_content_excerpt" /> <label for="intheloop_after_content_excerpt" class="small"><?php _e('Apply to Excerpt?','intheloop'); ?></label>
			<input <?php if ($intheloop_after_content_page) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_page" id="intheloop_after_content_page" /> <label for="intheloop_after_content_page" class="small"><?php _e('Apply to Pages?','intheloop'); ?></label>
			<input <?php if ($intheloop_after_content_rss) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_rss" id="intheloop_after_content_rss" /> <label for="intheloop_after_content_rss" class="small"><?php _e('Apply To RSS Feed?','intheloop'); ?></label>
			<input <?php if ($intheloop_after_content_php) { echo 'checked="checked"'; } ?> type="checkbox" value="1" name="intheloop_after_content_php" id="intheloop_after_content_php" /> <label for="intheloop_after_content_php" class="small"><?php _e('Execute PHP?','intheloop'); ?></label>
		</p>

		<div class="tablenav">
			<div class="alignleft"><input type="submit" name="submit" value="<?php _e('Update Options »', 'intheloop') ?>" class="button-secondary" /></div>
			<div class="alignright"><a href="http://xentek.net/?utm_source=plugin&amp;utm_medium=options&amp;utm_content=icon&amp;utm_campaign=intheloop" title="visit xentek.net - creator of this plugin"><img src="http://xentek.net/img/icons/recruiter_32.png" width="52" height="32" alt="bullhorn icon" title="visit xentek.net - creator of this plugin" border="0" valign="middle" /></a></div>
		</div>

	</form>
</div>
