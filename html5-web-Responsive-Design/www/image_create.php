<?php

$big_img = $_REQUEST['big_img'];
$size = $_REQUEST['size'];
$item_id = $_REQUEST['item_id'];
if ($size != '' && $item_id != '') {
    img_create_small($item_id, $big_img, $size);
}

function img_create_small($item_id, $big_img, $size) {
    //判断是否是尺寸图片
    if (count(explode('size', $big_img)) > 1) {
        $path_img = realpath('./') . '/product/' . $item_id . '/' . $big_img . '.jpg';
    } else {
        $wei_zhi = strrpos($big_img, '-');
        $big_img_dir = substr($big_img, 0, $wei_zhi);
        $path_img = realpath('./') . '/product/' . $item_id . '/' . $big_img_dir . '/' . $big_img . '.jpg';
    }
    if (!is_file($path_img)) {
        $path_img = realpath('./') . '/image/demo.jpg';
    }
    $imgage = getimagesize($path_img); //得到原始大图片
    switch ($imgage[2]) { // 图像类型判断
        case 1:
            $im = imagecreatefromgif($path_img);
            break;
        case 2:
            $im = imagecreatefromjpeg($path_img);
            break;
        case 3:
            $im = imagecreatefrompng($path_img);
            break;
    }
    //$src_W = ($imgage[0] > $imgage[1]) ? $imgage[1] : $imgage[0]; //获取大图片宽度
    //$src_H = ($imgage[0] > $imgage[1]) ? $imgage[0] : $imgage[1]; //获取大图片高度
	
	$src_W = $imgage[0]; //获取大图片宽度
    $src_H = $imgage[1]; //获取大图片高度

    $image_size_data = image_size();
    $image_size_arr = $image_size_data[$size];
    $height = empty($image_size_arr['height']) ? $src_H * ($image_size_arr['width'] / $src_W) : $image_size_arr['height'];
    $width = empty($image_size_arr['width']) ? $src_W * ($height / $src_H) : $image_size_arr['width'];
    
	$quality = $image_size_arr['quality'];
	
    $tn = imagecreatetruecolor($width, $height); //创建缩略图
    $white = imagecolorallocate($tn, 255, 255, 255);

    imagefill($tn, 0, 0, $white);
	
	if($src_H >= $src_W) //高大于宽
	{
		$width_new = $src_W * ($height / $src_H);
		$height_new = $height;
	}
	else //宽大于高
	{
		$width_new = $width;
		$height_new = $src_H * ($width / $src_W);
	}
	
    $width_new = $src_W * ($height / $src_H);
    imagecopyresampled($tn, $im, ($width - $width_new) / 2, 0, 0, 0, $width_new, $height_new, $src_W, $src_H); //复制图像并改变大小

    $small_img = NULL;
    imagejpeg($tn, $small_img, $quality); //输出图像
}

//生成图片的尺寸
function image_size() {
    $image_size_arr = array(
        'product_list' => array('width' => '', 'height' => '350', 'quality' => '100'),
        'hot_list' => array('width' => '90', 'height' => '90', 'quality' => '80'),
        'product_detail' => array('width' => '343', 'height' => '430', 'quality' => '100'),
        'detail_min' => array('width' => '90', 'height' => '90', 'quality' => '80'),
        'like_product' => array('width' => '', 'height' => '350', 'quality' => '100'),
        'mini' => array('width' => '90', 'height' => '90', 'quality' => '60'),
        'big' => array('width' => '600', 'height' => '600', 'quality' => '80'),
        'common' => array('width' => '400', 'height' => '400', 'quality' => '80'),
        'small' => array('width' => '200', 'height' => '200', 'quality' => '60'),
		'large' => array('width' => '617', 'height' => '774', 'quality' => '60'), //large size = product_detail size * 1.8
    );
    return $image_size_arr;
}

?>
