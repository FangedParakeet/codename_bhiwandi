<?php
if ( ! function_exists('getNextPosition'))
{
	function getNextPosition($table, $group_field=FALSE, $group_value=FALSE) {
		$ci = get_instance();
		$ci->load->library('Priority_manager');
		$priority_field = 'priority';
		$maxCount = $ci->priority_model->getMaxCount($table, $priority_field, $group_field, $group_value);
		return $maxCount+1;
	}
}

if ( ! function_exists('set_download_priority'))
{
	function set_download_priority($post_array) {
		$post_array['priority'] = getNextPosition('downloads');
		return $post_array;
	}
}

if ( ! function_exists('set_client_priority'))
{
	function set_client_priority($post_array) {
		$post_array['priority'] = getNextPosition('clients');
		var_dump($post_array);
		return $post_array;
	}
}

if ( ! function_exists('set_news_priority'))
{
	function set_news_priority($post_array) {
		$post_array['priority'] = getNextPosition('news', 'category_id', $post_array['category_id']);
		return $post_array;
	}
}

if ( ! function_exists('set_proto_album_priority'))
{
	function set_proto_album_priority($post_array) {
		$post_array['priority'] = getNextPosition('photo_gallery', 'language', $post_array['language']);
		return $post_array;
	}
}

if ( ! function_exists('set_photos_priority'))
{
	function set_photos_priority($post_array) {
		$post_array['priority'] = getNextPosition('photos', 'album_id', $post_array['album_id']);
		return $post_array;
	}
}

if ( ! function_exists('set_video_albums_priority'))
{
	function set_video_albums_priority($post_array) {
		$post_array['priority'] = getNextPosition('video_gallery', 'language', $post_array['language']);
		return $post_array;
	}
}

if ( ! function_exists('set_videos_priority'))
{
	function set_videos_priority($post_array) {
		$post_array['priority'] = getNextPosition('videos', 'album_id', $post_array['album_id']);
		return $post_array;
	}
}

if ( ! function_exists('set_breaking_news_priority'))
{
	function set_breaking_news_priority($post_array) {
		$post_array['priority'] = getNextPosition('breaking_news', 'language', $post_array['language']);
		return $post_array;
	}
}

if ( ! function_exists('set_thought_of_day_priority'))
{
	function set_thought_of_day_priority($post_array) {
		$post_array['priority'] = getNextPosition('thought_of_day', 'language', $post_array['language']);
		return $post_array;
	}
}