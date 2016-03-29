<?php
/*
 用法：
 $data = getReviewData('B01A5H3XTM', 1);
 返回的数据格式:
 $data = [
		0 => [
			'star' => 5,
			'title' => 'Loved this dress!',
			'by' => 'Amazon Customer',
			'content' => 'This is probably my new favorite dress. It looks so beautiful and the fit is perfect!'
		],
		1 => ...
		2 => ...
 	]
*/
//getReviewData('B01A5H3WJS', 1);

/**
 * 获取评论数据
 * @param string $asin_code
 * @param int $page_number 页码
 * @return array
 */
function getReviewData($asin_code, $page_number){
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
	unset($content_matchs, $review_box);

	if($star_ar){
		foreach($star_ar as $key => $star_val){
			$review_data[$key]['star'] = intval($star_val);
			$review_data[$key]['title'] = $title_ar[$key];
			$review_data[$key]['by'] = $by_ar[$key];
			$review_data[$key]['content'] = $content_ar[$key];
		}
	}

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

?>