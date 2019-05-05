<?php 
include 'simple_dom/simple_html_dom.php';
ini_set('display_errors', 1);
	class Imsyak_reminder
	{
		
		public function main()
		{
			$html = $this->file_get_html2('https://www.jadwalsholat.org/adzan/monthly.php?id=141');
			$arr = [];
			$arr['month'][] 		= date('M');
			$arr['year'][] 			= date('Y');
			$arr['scrap_from'][] 	= 'https://www.jadwalsholat.org';
			$arr['scrap_by'][] 		= 'Nando';
			foreach ($html->find("table [class=table_light], [class=table_dark]") as $key => $value) 
			{
				$arr['date'][] 			= $value->find("td",0)->plaintext;
				$arr['imsyak_at'][] 	= $value->find("td",1)->plaintext;

			}
			header('Content-Type: application/json');
			return $this->prettyPrint(json_encode($arr));
		}


		private function file_get_html2($url){
			return str_get_html($this->curl($url));
		}

		private function curl($url){
			$data = file_get_contents($url);
			return $data;

		}

		function prettyPrint( $json )
		{
			$result = '';
			$level = 0;
			$in_quotes = false;
			$in_escape = false;
			$ends_line_level = NULL;
			$json_length = strlen( $json );

			for( $i = 0; $i < $json_length; $i++ ) {
				$char = $json[$i];
				$new_line_level = NULL;
				$post = "";
				if( $ends_line_level !== NULL ) {
					$new_line_level = $ends_line_level;
					$ends_line_level = NULL;
				}
				if ( $in_escape ) {
					$in_escape = false;
				} else if( $char === '"' ) {
					$in_quotes = !$in_quotes;
				} else if( ! $in_quotes ) {
					switch( $char ) {
						case '}': case ']':
						$level--;
						$ends_line_level = NULL;
						$new_line_level = $level;
						break;

						case '{': case '[':
						$level++;
						case ',':
						$ends_line_level = $level;
						break;

						case ':':
						$post = " ";
						break;

						case " ": case "\t": case "\n": case "\r":
						$char = "";
						$ends_line_level = $new_line_level;
						$new_line_level = NULL;
						break;
					}
				} else if ( $char === '\\' ) {
					$in_escape = true;
				}
				if( $new_line_level !== NULL ) {
					$result .= "\n".str_repeat( "\t", $new_line_level );
				}
				$result .= $char.$post;
			}

			return $result;
		}
	}

	$bot = new Imsyak_reminder();

	echo $bot->main();
?><?php 
include 'simple_dom/simple_html_dom.php';
	// error_reporting(E_ALL);
ini_set('display_errors', 1);
	class Imsyak_reminder
	{
		
		public function main()
		{
			$html = $this->file_get_html2('https://www.jadwalsholat.org/adzan/monthly.php?id=141');
			$arr = [];
			$arr['month'][] 		= date('M');
			$arr['year'][] 			= date('Y');
			$arr['scrap_from'][] 	= 'https://www.jadwalsholat.org';
			$arr['scrap_by'][] 		= 'Nando';
			foreach ($html->find("table [class=table_light], [class=table_dark]") as $key => $value) 
			{
				$arr['date'][] 			= $value->find("td",0)->plaintext;
				$arr['imsyak_at'][] 	= $value->find("td",1)->plaintext;

			}
			header('Content-Type: application/json');
			return $this->prettyPrint(json_encode($arr));
		}


		private function file_get_html2($url){
			return str_get_html($this->curl($url));
		}

		private function curl($url){
			$data = file_get_contents($url);
			return $data;

		}

		function prettyPrint( $json )
		{
			$result = '';
			$level = 0;
			$in_quotes = false;
			$in_escape = false;
			$ends_line_level = NULL;
			$json_length = strlen( $json );

			for( $i = 0; $i < $json_length; $i++ ) {
				$char = $json[$i];
				$new_line_level = NULL;
				$post = "";
				if( $ends_line_level !== NULL ) {
					$new_line_level = $ends_line_level;
					$ends_line_level = NULL;
				}
				if ( $in_escape ) {
					$in_escape = false;
				} else if( $char === '"' ) {
					$in_quotes = !$in_quotes;
				} else if( ! $in_quotes ) {
					switch( $char ) {
						case '}': case ']':
						$level--;
						$ends_line_level = NULL;
						$new_line_level = $level;
						break;

						case '{': case '[':
						$level++;
						case ',':
						$ends_line_level = $level;
						break;

						case ':':
						$post = " ";
						break;

						case " ": case "\t": case "\n": case "\r":
						$char = "";
						$ends_line_level = $new_line_level;
						$new_line_level = NULL;
						break;
					}
				} else if ( $char === '\\' ) {
					$in_escape = true;
				}
				if( $new_line_level !== NULL ) {
					$result .= "\n".str_repeat( "\t", $new_line_level );
				}
				$result .= $char.$post;
			}

			return $result;
		}
	}

	$imsyak = new Imsyak_reminder();

	echo $imsyak->main();
?>