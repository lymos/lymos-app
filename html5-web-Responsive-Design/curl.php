<?php
$str = 'B01A5H3WJS,B01A5H3XTM,B01A5H3Z0O,B01A5H3VEY,B01A5H3XDI,B01ANPC6BM,B01ANPC716,B01ANPC7ZW,B01AWFG7OU,B01AWFG8Q2,B01AWFG9U2,B01ANPC996,B01ANPCA0E,B01ANPCBR6,B01ANPCCWK,B01ANPCDJC,B01ANPCEFK,B01ANPCF7W,B01ANPCFYA,B01ANPCGSK,B01ANPCI4M,B01ANPC7CA,B01ANPCI4M,B01ANPC7CA,B01ANPCI4M,B01ANPC7CA,B01ANPCI4M,B01ANPC7CA,B01ANPCAEU,B01ANPCB4O,B01ANPCC20,B01ANPCCZ2,B01ANPCE5U,B01ANPCEV4,B01ANPCE5U,B01ANPCEV4,B01ANPCE5U,B01ANPCEV4,B01ANPCE5U,B01ANPCEV4,B01A5H3XDI,B01AWBKYKM,B01AWBKX8K,B01AWBKYYI,B01AWBL0C8';
$asin_ar = explode(',', $str);

foreach ($asin_ar as $value) {
	//getReviewData($value, 1);
	getNewReviewData($value, 1);
	//break;
}

function getNewReviewData($asin_code, $page_number){
	$review_data = array();
	$response = http($asin_code, $page_number);
	$response = str_replace("\n", '', $response);
	$reg = '/<div id="cm_cr-review_list" class="a-section a-spacing-none reviews celwidget\">(.*)<\/div><div class=\"a-spinner-wrapper reviews-load-progess aok-hidden a-spacing-top-large\">/';
	preg_match($reg, $response, $matchs);
	$review_box = $matchs[1];
	unset($matchs, $response);
	if(! $review_box){
		return $review_data;
	}

	$reg = '/<i class="a-icon a-icon-star a-star-(\d) review-rating">|<a class=\"a-size-base a-link-normal author\"[^<>]*\">([^<]*)<\/a><\/span><span class=\"a-declarative\"';
	$reg .= '|<a class=\"a-size-base a-link-normal review-title a-color-base a-text-bold\"[^<>]*\">([^<]*)<\/a><\/div><div class=\"a-row\">';
	$reg .= '|<span class=\"a-size-base review-text\">([^<]*)<\/span><\/div><div class=\"a-row/';
	preg_match_all($reg, $review_box, $matchs);
	$star_ar = $matchs[1];
	$by_ar = $matchs[2];
	$title_ar = $matchs[3];
	$content_ar = $matchs[4];
	unset($matchs, $review_box);

	$star_ar = array_values(array_filter($star_ar));
	$by_ar = array_values(array_filter($by_ar));
	$title_ar = array_values(array_filter($title_ar));
	$content_ar = array_values(array_filter($content_ar));

	if($star_ar){
		foreach($star_ar as $key => $star_val){
			$review_data[$key]['star'] = intval($star_val);
			$review_data[$key]['title'] = $title_ar[$key];
			$review_data[$key]['by'] = $by_ar[$key];
			$review_data[$key]['content'] = $content_ar[$key];
		}
	}
	error_log(print_r($review_data, 1) . "\n", 3, "D:/wamp/www/temp/d.log");
	return $review_data;
}

/**
 * 获取评论数据
 * @param string $asin_code
 * @param int $page_number 页码
 * @return array
 */
function getReviewData($asin_code, $page_number){
	$review_data = array();

	$response = http($asin_code, $page_number);
	//error_log(print_r($response, 1)."\n", 3, "D:/wamp/www/temp/d.log");

	$response = str_replace("\n", '', $response);
	$reg = '/<div id="cm_cr-review_list" class="a-section a-spacing-none reviews celwidget\">(.*)<\/div><div class=\"a-spinner-wrapper reviews-load-progess aok-hidden a-spacing-top-large\">/';
	preg_match($reg, $response, $matchs);
	$review_box = $matchs[1];
	unset($matchs);
	if(! $review_box){
		return $review_data;
	}

	// star
	$reg_star = '/<i class="a-icon a-icon-star a-star-(\d) review-rating">/';
	preg_match_all($reg_star, $review_box, $star_matches);

	$star_ar = $star_matches[1];
	unset($star_matches);
	if(! $star_ar){
		return $review_data;
	}

	// by who
	$reg_by = '/<a class=\"a-size-base a-link-normal author\"[^<>]*\">([^<]*)<\/a><\/span><span class=\"a-declarative\"/';
	preg_match_all($reg_by, $review_box, $by_matchs);
	$by_ar = $by_matchs[1];
	unset($by_matchs);

	// title
	$reg_title = '/<a class=\"a-size-base a-link-normal review-title a-color-base a-text-bold\"[^<>]*\">([^<]*)<\/a><\/div><div class=\"a-row\">/';
	preg_match_all($reg_title, $review_box, $title_matchs);
	$title_ar = $title_matchs[1];
	unset($title_matchs);

	// content
	$reg_content = '/<span class=\"a-size-base review-text\">([^<]*)<\/span><\/div><div class=\"a-row/';
	preg_match_all($reg_content, $review_box, $content_matchs);
	$content_ar = $content_matchs[1];
	unset($content_matchs);

	if($star_ar){
		foreach($star_ar as $key => $star_val){
			$review_data[$key]['star'] = intval($star_val);
			$review_data[$key]['title'] = $title_ar[$key];
			$review_data[$key]['by'] = $by_ar[$key];
			$review_data[$key]['content'] = $content_ar[$key];
		}
	}

	error_log(print_r($review_data, 1)."\n", 3, "D:/wamp/www/temp/d.log");

	return $review_data;
}

/**
 * 发送请求
 * @param string $asin_code
 * @param int $page_number 页码
 * @return string
 */
function http($asin_code = '', $page_number = 1){
	$url = 'http://www.amazon.com/product-reviews/' . $asin_code . '/ref=cm_cr_pr_show_all?ie=UTF8&showViewpoints=1&sortBy=recent&pageNumber=' . $page_number;
	$cookie = '_mkto_trk=id:810-GRW-452&token:_mch-amazon.com-1447228094903-26910';
	$user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie');
	curl_setopt($ch, CURLOPT_URL, $url);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

function MutlHttp($asin_ar, $page_number = 1){
	if(! is_array($asin_ar)){
		return false;
	}
	$mh = curl_multi_init();
	$cookie = '_mkto_trk=id:810-GRW-452&token:_mch-amazon.com-1447228094903-26910';
	$user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0';

	foreach($asin_ar as $code){
		$url = 'http://www.amazon.com/product-reviews/' . $code . '/ref=cm_cr_pr_show_all?ie=UTF8&showViewpoints=1&sortBy=recent&pageNumber=' . $page_number;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie');
		curl_multi_add_handle($mh, $ch);
	}
	$running = null;
	do{
		curl_multi_exec($mh, $running);
	}while($running > 0);
	
	while($info = curl_multi_info_read($mh)){
			$handle = $info['handle'];
			$curl_info = curl_getinfo($handle);
			$url = $curl_info['url'];
			//$result_info[] = $curl_info;
			$cont[$url][] = curl_multi_getcontent($handle);
			//$error[$url][] = curl_error($handle);
			//$errno[$url][] = curl_errno($handle);
	}
	curl_multi_close($mh);

}

?>