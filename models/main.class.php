<?

class Main {

	public static function getPostcontent () {
	$path = Config::get('path_posts');
	$files = array_slice(scandir($path),3);
		foreach ($files as $key => $file) {
			$post_date = date('F, jS Y', filemtime($path.'/'.$file));
			$post_title = basename($file, '.rtf');
			$post1 = file_get_contents($path.'/'.$file,  FALSE, NULL, 0, 300);
			$post2 = file_get_contents($path.'/'.$file,  FALSE, NULL, 301);
			$files[$key] = [
							'title' => $post_title,
							'date' => $post_date,
							'post_pre' => $post1, 
							'post_full'=> $post2
						];
		}
		return $files;
	}
}