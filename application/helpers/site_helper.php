<?php
function getWord($CI, $key) {
    if($_REQUEST['lang'])
        setcookie("my_lang", $_REQUEST['lang'], null, "/");
    $local_lang = ($_COOKIE['my_lang'])?$_COOKIE['my_lang']:"cn";
    $CI->lang->load("main", $local_lang);
    return $CI->lang->line($key);
}

function encodeIdByUsers($id, $uid) {
    $key = getPrivateKey();
    $expire = time() + 3600 * 12;
    $str = $id . "-" . $uid . "-" . $expire;
    
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $str, MCRYPT_MODE_ECB, $iv);
    
    return urlencode(base64_encode($crypttext));
}

function decodeIdByUsers($str, $uid) {
    $key = getPrivateKey();

    $str = base64_decode(urldecode($str));
    
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $text = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $str, MCRYPT_MODE_ECB, $iv);
    
    $arr = explode("-", $text);
    if($arr[2] < time())
        return;
    
    if($arr[1] != $uid)
        return;
        
    return $arr[0];
    
}

function encodeStr($str) {
    $key = getPrivateKey();
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $str, MCRYPT_MODE_ECB, $iv);

    return base64_encode($crypttext);
}

function decodeStr($str) {
    $key = getPrivateKey();

    $str = base64_decode($str);

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $text = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $str, MCRYPT_MODE_ECB, $iv);

    return $text;
}

function getPrivateKey() {
    return "ae*fel*";
}

function goto404() {
    header("location:/page/page_not_exists");
    exit;
}

function pagination ($total, $page, $num, $list_number = 5, $argv = array()) {
    if($num >= $total)
        return;

    if(!$page)
        $page = 1;

    $page_num = ceil($total/$num);

    $prev = ($page <= 1)?1:$page-1;
    $next = ($page >= $page_num)?$page_num:$page+1;
    $start_num = $page - ceil($list_number/2);
    $start_num = (($start_num + $list_number)> $page_num )?$page_num - $list_number:$start_num;
    $start_num = ($start_num<0)?0:$start_num;

    $form_name = ($argv['form_name'])?$argv['form_name']:"pagination_form";
    $page_name = ($argv['page_name'])?$argv['page_name']:"pre_page";



    $str = '<nav><ul class="pagination">';
    $str .= '<li><a href="#" data-page="'.$prev.'" class="page_num" data-form="'.$form_name.'">上一页</a></li>';
    for($i=1;$i<=$list_number;$i++){
        $number = $start_num + $i;
        if($number > $page_num)
            break;
        $str .= '<li><a href="#" data-page="'.$number.'" class="page_num ';
        if($page == $number)
            $str .= "active";
        $str .= '" data-form="'.$form_name.'">'.$number.'</a></li>';
    }
    $str .= '<li><a href="#" data-page="'.$next.'" class="page_num" data-form="'.$form_name.'">下一页</a></li></ul></nav>';
    $str .= '<form action="" method="post" id="'.$form_name.'">';
    $str .= '<input type="hidden" name="'.$page_name.'" id="pre_page"></form>';

    return $str;
}

function filterHtml($str) {
    $str = str_replace("</p>", "\n", $str);
    $pattern = '/\<[^\>]{1,}\>/i';
    $replacement = '';
    return preg_replace($pattern, $replacement, $str);
}

function bbcodeRemove($str) {
    $pattern = '/\[[^\]]{1,}\]/i';
    $replacement = '';
    return preg_replace($pattern, $replacement, $str);
}

function textNewlineToHtmlNewline($str) {
    $tag = "";
    do{
        $tag .= "<p>";
        $op = stripos($str, "\n");
        if($op === false) {
            $tag .= $str . "</p>";
            break;
        }
        $tag_str = substr($str, 0, $op);
        $tag_str = str_replace(" ", "&nbsp;", $tag_str);
        $tag .= $tag_str . "</p>";
        $str = substr($str, $op+1);
    }while(true);

    return $tag;
}

function getImageExt($str) {
    $img_ext_arr = array("jpg", "jpeg", "gif", "png", "bmp");
    if($str) {
        $str = explode(".", $str);
        $ext = strtolower($str[count($str) - 1]);
        if(in_array($ext, $img_ext_arr)) {
            return $ext;
        }
    }

    return;
}

/**
 * 返回json格式的字符串
 * @param $arr
 */
function returnMsg($arr) {
    echo json_encode($arr);
    exit;
}

/**
 * 转换unix时间为比较模糊的时间区间，比如 今天 16点， 1天前
 */
function convertTimeToFuzzy($time) {
    if(!is_numeric($time))
        return;

    $show_time = time() - $time;
    $word = "前";

    if($show_time < 0) {
        $word = "后";
        $show_time = $show_time * -1;
    }

    if($show_time >= 0 && $show_time < 60) {
        $show = $show_time . "秒" . $word;
    }

    if($show_time >= 60 && $show_time < 3600) {
        $format = ceil($show_time / 60);
        $show = $format ."分钟" . $word;
    }

    if($show_time >= 3600 && $show_time < 86400) {
        $format = ceil($show_time / 3600);
        $show = $format ."小时" . $word;
    }

    if($show_time >= 86400 && $show_time < 2592000) {
        $format = ceil($show_time / 86400);
        $show = $format ."天" . $word;
    }

    if($show_time >= 2592000) {
        $show = date("Y-m-d", $time);
    }

    return $show;
}

function checkAu() {
    $decode = trim(decodeStr($_POST['_ua']));
    if($decode != $_POST['user_id'] || trim($_POST['user_id']) == "") {
        return false;
    }

    return true;
}

/**
 * 把xxx:xxx,xxx:xxx字符转为数组
 */
function strToArray($str) {
    if(!$str)
        return $str;

    $arr = explode(",", $str);

    $returnArr = array();

    for($i=0;$i<count($arr);$i++) {
        $arr2 = explode(":", $arr[$i]);
        $returnArr[$arr2[0]] = $arr2[1];
    }

    return $returnArr;
}

function getDevice() {
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if(stripos($agent, "MicroQuandnet/")){
        return "android_app";
    }

    if(stripos($agent, "android") == true || stripos($agent, "iphone") == true || stripos($agent, "ipad") == true)
    {
        return "mobile";
    }

    return "desktop";
}

function getDeviceBrowser() {
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if(stripos($agent, "MicroQuandnet/")){
        return "android_app";
    }

    if(stripos($agent, "MicroMessenger/")){
        return "weixin";
    }

    if(stripos($agent, "MQQBrowser/") || stripos($agent, "UCBrowser/")){
        return "uc";
    }
}

function getCurrentArea() {
    if($_COOKIE['current_area']){
        $obj = json_decode($_COOKIE['current_area']);
        $arr['area_id'] = $obj->area_id;
        $arr['area_name'] = $obj->area_name;
        $arr['rome'] = $obj->rome;
        return $arr;
    }

    $arr['rome'] = "shanghai";
    $arr['area_name'] = "上海市";
    $arr['area_id'] = "36";

    return $arr;
}

function getCurrentAreaRome() {
    $arr = getCurrentArea();
    return $arr['rome'];
}

function getCurrentAreaName() {
    $arr = getCurrentArea();
    return $arr['area_name'];
}

/**
 * 获取当前地区ID
 */
function getCurrentLocal() {
    $arr = getCurrentArea();
    return $arr['area_id'];
}

function loadView($th, $viewname, $data) {
    if(getDevice() == "mobile")
    {
        if(file_exists(__DIR__ . '/../views/mobile/' . $viewname . ".php")) {
            $th->load->view('mobile/' . $viewname, $data);
        }else {
            $th->load->view($viewname, $data);
        }
    }
    else
    {
        $th->load->view($viewname, $data);
    }
}

/**
 * 获取用户头像的url地址，没有头像根据提供的性别给出默认的头像
 */
function getPhotoCoverUrl($CI, $img, $gender) {
    if($img != "" && file_exists($CI->config->item("site_img_root") . "/photo/avatar/" . $img)) {
        $url = "http://" . $CI->config->item("site_img_domain") . "/photo/avatar/" . $img;
    }else {
        if($gender == "女") {
            $url = "http://" . $CI->config->item("site_img_domain") . "/img/ic_default_headphoto_fmale.jpg";
        }else {
            $url = "http://" . $CI->config->item("site_img_domain") . "/img/ic_default_headphoto.jpg";
        }
    }

    return $url;
}

function getUserPhotoUrl($CI, $img, $uid) {
    if($img != "" && file_exists($CI->config->item("site_img_root") . "/photo/". $uid ."/" . $img)) {
        $url = "http://" . $CI->config->item("site_img_domain") . "/photo/". $uid ."/" . $img;
    } else {
        $url = "http://" . $CI->config->item("site_img_domain") . "/img/1363TS310L30-93538.png";
    }

    return $url;
}

function getGroupLogoUrl($CI, $img, $group_id) {
    if($img != "" && file_exists($CI->config->item("site_img_root") . "/group/". $group_id ."/" . $img)) {
        $url = "http://" . $CI->config->item("site_img_domain") . "/group/". $group_id ."/" . $img;
    } else {
        $url = "http://" . $CI->config->item("site_img_domain") . "/img/1363TS310L30-93538.png";
    }

    return $url;
}

function getGroupBannerUrl($CI, $img, $group_id) {
    if($img != "" && file_exists($CI->config->item("site_img_root") . "/group/". $group_id ."/" . $img)) {
        $url = "http://" . $CI->config->item("site_img_domain") . "/group/". $group_id ."/" . $img;
    } else {
        $url = "";
    }

    return $url;
}

function getThumbUrl($CI, $dir, $img, $id) {
    $img = getPicThumbName($img);

    if($img != "" && file_exists($CI->config->item("site_img_root") . "/".$dir."/". $id ."/" . $img)) {
        $url = "http://" . $CI->config->item("site_img_domain") . "/$dir/". $id ."/" . $img;
    } else {
        $url = "http://" . $CI->config->item("site_img_domain") . "/img/1363TS310L30-93538.png";
    }

    return $url;
}
/**
 * 转换字符串中的表情符号为实体图片
 */
function covertFaceToImg($CI, $str) {
    $face = $CI->config->item("face");
    foreach($face as $k => $v) {
        $str = str_replace($k, '<span class="ico-face ' . $v . '"></span>', $str);
    }

    return $str;
}

function enCodeWithStar($str) {
    if(strlen($str) < 7)
        return $str;

    $start_str = substr($str, 0, 3);
    $end_str = substr($str, -3);
    $star_number = strlen($str) - 6;
    $star_str = "";
    for($i=0;$i<$star_number;$i++)
        $star_str .= "*";

    return $start_str . $star_str . $end_str;
}

function getAreaName($CI, $province_id, $town_id="", $district_id="") {
    static $area_list;

    if(count($area_list) == 0) {
        $sql = "SELECT * FROM data_area";
        $query = $CI->db->query($sql);
        $area_list = $query->result_array();
    }

    foreach($area_list as $v) {
        if($v['area_id'] == $province_id) {
            $name = $v['area_name'];
            break;
        }
    }

    if($town_id) {

        foreach($area_list as $v) {
            if($v['area_id'] == $town_id) {
                $name_town = $v['area_name'];
                break;
            }
        }
        if($name != $name_town) {
            $name .= " " . $name_town;
        }
    }

    if($district_id) {
        foreach($area_list as $v) {
            if($v['area_id'] == $district_id) {
                $name .= " " . $v['area_name'];
                break;
            }
        }
    }
    return $name;
}

function userIfLogin($CI) {
    if($_COOKIE['_ua']) {
        $str = decodeStr($_COOKIE['_ua']);
        if($str) {
            $str_arr = explode("||", $str);
            if($str_arr[0]>0 && $str_arr[1] && md5($str_arr[2]) == trim($str_arr[3])) {
                $arr['uid'] = $str_arr[0];
                $arr['account'] = $str_arr[1];
                $arr['nickname'] = $_COOKIE['_uinfo'];
                return $arr;
            }
        }
    }
}

function checkRadio($value, $match) {
    if($value == $match)
        return "checked";
}

function subCnStr($str, $start, $number, $end_tag="") {
    while($number < strlen($str)) {
        $char = substr($str, $number-1, 1);
        if(ord($char) > 127)
            $number++;
        else {
            break;
        }
    }

    $string = substr($str, $start, $number);
    return $string . $end_tag;
}

/**
 * 删除图片，和该图片的缩略图
 */
function delPic($path) {
    if($path != "" && !is_dir($path)) {
        $str_arr = explode(".", $path);
        if(count($str_arr) > 1) {
            $thumb_file = getPicThumbName($path);
            if(file_exists($thumb_file)) {
                unlink($thumb_file);
            }
            if(file_exists($path))
                unlink($path);
        }
    }
}

function getPicThumbName($path) {
    if($path != "") {
        $str_arr = explode(".", $path);
        if (count($str_arr) > 1) {
            $ext = $str_arr[count($str_arr) - 1];
            $file = substr($path, 0, strlen($path) - strlen($ext) - 1);
            if (strlen($file) > 6 && substr($path, -6) != "_thumb") {
                return $file . "_thumb" . "." . $ext;
            }
        }
    }
}


function getPicMobileName($path) {
    if($path != "") {
        $str_arr = explode(".", $path);
        if (count($str_arr) > 1) {
            $ext = $str_arr[count($str_arr) - 1];
            $file = substr($path, 0, strlen($path) - strlen($ext) - 1);
            if (strlen($file) > 6 && substr($path, -6) != "_small") {
                return $file . "_small" . "." . $ext;
            }
        }
    }
}
function checkGroupAuth($CI, $lev, $key) {
    $auth_key = $CI->config->item("group_auth");

    if($lev != "" && count($auth_key[$lev]) > 0 && in_array($key, $auth_key[$lev])) {
        return TRUE;
    }

    return FALSE;
}

function convertCondStringToArr($str) {
    $result = "";
    if($str) {
        $arr = explode(",", $str);
        for($i=0;$i<count($arr);$i++) {
            $v = $arr[$i];
            if($v){
                $arr2 = explode(":", $v);
                $result[$arr2[0]] = $arr2[1];
            }
        }
    }

    return $result;
}

function getSiteName($CI) {
    return $CI->config->item("site_name");
}

function isSiteDev($CI) {
    return $CI->config->item("site_dev");
}

function getFileModifyTime($path) {
    $str = "";
    if($_SERVER['HTTP_USER_AGENT'] == "51quandong_android_apk" || true) {
        if(file_exists($path)){
            $str = "?ct=".filectime($path);
        }
    }

    return $str;
}

function metaKeyword($str) {
    if(getDevice() == "desktop") {
        echo '<meta name="keywords" content="'.$str.'">';
    }
}

function metaDescription($str) {
    if(getDevice() == "desktop") {
        echo '<meta name="description" content="'.str_replace("\n","",$str).'">';
    }
}

function seeText($text, $arr) {
    if(!is_array($arr)) {
        if(stripos($arr, $text) !== false)
            return true;

        return false;
    }

    if(count($arr) > 0) {
        foreach($arr as $v) {
            if(seeText($text, $v)) {
                return true;
                break;
            }
        }
    }
}

function filterWords($str) {
    require_once(__DIR__ . "/badword.src.php");
    foreach($badword as $v) {
        $star = "";
        for($i=0;$i<strlen($v);) {
            if(ord(substr($v, $i, 1)) > 127) {
                $i = $i+3;
            }else {
                $i++;
            }
            $star .= "*";
        }

        $filter[$v] = $star;
    }

    return strtr($str, $filter);
}

function convertDateToTime($date) {
    $arr = explode(" ", $date);
    $arr_date = explode("-", $arr[0]);
    $arr_time = explode(":", $arr[1]);
    return @mktime($arr_time[0], $arr_time[1], $arr_time[2], $arr_date[1], $arr_date[2], $arr_date[0]);
}

function element_to_string($arr, $str_o) {

    if(is_array($arr) && count($arr) > 0) {
        foreach($arr as $v) {
            $str = "<" . $v['name'] ."";
            if($v['class']) {
                $str .= " class=\"" . $v['class'] . "\"";
            }

            if(count($v['attributes']) > 0) {
                foreach($v['attributes'] as $k1=>$v1) {
                    $str .= " $k1=\"".$v1."\"";
                }
            }
            $str .= ">" . $v['text'];

            if(count($v['children'])>0) {
                $str = element_to_string($v['children'], $str);
            }

            $str .= "</" . $v['name'] .">";
            if($str_o) {
                $str_r = str_replace($v['text'], $str, $str_o);
            }else {
                $str_r .= $str;
            }
        }
    }

    return $str_r;
}
