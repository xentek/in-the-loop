<?php
/*
	Plugin Name: In The Loop
	Plugin URI: http://xentek.net/code/wordpress/plugins/in-the-loop/
	Description: This plugin allows you to insert arbitrary content before or after your post or page content. Great for integrating other plugins or ad code into the body of your posts or pages, without having to hack your theme. <a href="/wp-admin/options-general.php?page=in-the-loop/in-the-loop-options.php">Configure Settings</a> or <a href="http://xentek.net/code/wordpress/plugins/in-the-loop/">Get Support</a>. <em>Code</em> 
	Version: 0.4
	Author: Eric Marden
	Author URI: http://www.xentek.net/
*/
/*  Copyright 2008  Eric Marden  (email : wp@xentek.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('init','intheloop_load_translation');
add_action('admin_menu', 'add_intheloop_options_page');
add_filter('the_content','intheloop_process');
add_filter('the_excerpt','intheloop_process_excerpt');
//add_filter('the_content_rss','intheloop_process_rss');
add_filter('the_excerpt_rss','intheloop_process_rss');

function intheloop_load_translation()
{
	load_plugin_textdomain('intheloop', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));
}

function add_intheloop_options_page()
{
	if (function_exists('add_options_page'))
	{
		add_options_page('In The Loop', 'In The Loop', 10, dirname(__FILE__) . '/in-the-loop-options.php');
	}
}

function intheloop_process($content = '')
{
	$intheloop_before_content = stripslashes(get_option('intheloop_before_content'));
	$intheloop_before_content_teaser = get_option('intheloop_before_content_teaser');
	$intheloop_before_content_content = get_option('intheloop_before_content_content');
	$intheloop_before_content_php = get_option('intheloop_before_content_php');
	$intheloop_after_content = stripslashes(get_option('intheloop_after_content'));
	$intheloop_after_content_teaser = get_option('intheloop_after_content_teaser');
	$intheloop_after_content_content = get_option('intheloop_after_content_content');
	$intheloop_after_content_php = get_option('intheloop_after_content_php');

	if ($intheloop_before_content != '')
	{
		if ($intheloop_before_content_php)
		{
			$intheloop_before_content = _intheloop_eval($intheloop_before_content);
		}

		if ($intheloop_before_content_teaser)
		{
			if (!is_single())
			{
				$content = $intheloop_before_content . $content;		
			}
		}
		
		if ($intheloop_before_content_content)
		{
			if (is_single())
			{
				$content = $intheloop_before_content . $content;
			}
		}

		if ($intheloop_before_content_page)
		{
			if (is_page())
			{
				$content = $intheloop_before_content . $content;
			}
		}

	}

	if ($intheloop_after_content != '')
	{
		if ($intheloop_after_content_php)
		{
			$intheloop_after_content = _intheloop_eval($intheloop_after_content);
		}

		if ($intheloop_after_content_teaser)
		{
			if (!is_single())
			{
				$content = $content . $intheloop_after_content;
			}
		}

		if ($intheloop_after_content_content)
		{
			if (is_single())
			{
				$content = $content . $intheloop_after_content;
			}
		}

		if ($intheloop_after_content_page)
		{
			if (is_page())
			{
				$content = $content . $intheloop_after_content;
			}
		}

	}
	
	return $content;
}

function intheloop_process_rss($content = '')
{
	$intheloop_before_content = stripslashes(get_option('intheloop_before_content'));
	$intheloop_before_content_rss = get_option('intheloop_before_content_rss');
	$intheloop_before_content_php = get_option('intheloop_before_content_php');
	$intheloop_after_content = stripslashes(get_option('intheloop_after_content'));
	$intheloop_after_content_rss = get_option('intheloop_after_content_rss');
	$intheloop_after_content_php = get_option('intheloop_after_content_php');

	if ($intheloop_before_content != '')
	{
		if ($intheloop_before_content_php)
		{
			$intheloop_before_content = _intheloop_eval($intheloop_before_content);
		}

		if ($intheloop_before_content_rss)
		{
			$content = $intheloop_before_content . $content;
		}
	}

	if ($intheloop_after_content != '')
	{
		if ($intheloop_after_content_php)
		{
			$intheloop_after_content = _intheloop_eval($intheloop_after_content);
		}

		if ($intheloop_after_content_rss)
		{
			$content = $content . $intheloop_after_content;
		}
	}

	return $content;	
}

function intheloop_process_excerpt($content = '')
{
	global $post;
	$intheloop_before_content = stripslashes(get_option('intheloop_before_content'));
	$intheloop_before_content_excerpt = get_option('intheloop_before_content_excerpt');
	$intheloop_before_content_php = get_option('intheloop_before_content_php');
	$intheloop_after_content = stripslashes(get_option('intheloop_after_content'));
	$intheloop_after_content_excerpt = get_option('intheloop_after_content_excerpt');
	$intheloop_after_content_php = get_option('intheloop_after_content_php');

	if ($intheloop_before_content != '')
	{
		if ($intheloop_before_content_php)
		{
			$intheloop_before_content = _intheloop_eval($intheloop_before_content);
		}

		if ($intheloop_before_content_excerpt)
		{
			if (!empty($post->post_excerpt))
			{
				$content = $intheloop_before_content . $content;		
			}
		}
	}

	if ($intheloop_after_content != '')
	{
		if ($intheloop_after_content_php)
		{
			$intheloop_after_content = _intheloop_eval($intheloop_after_content);
		}

		if ($intheloop_after_content_excerpt)
		{
			if (!empty($post->post_excerpt))
			{
				$content = $content . $intheloop_after_content;
			}
		}
	}
	
	return $content;
}

function _intheloop_eval($val) {
	ob_start();
	eval("?>$val<?php ");
	$val = ob_get_contents();
	ob_end_clean();
	return $val;
}

?>
