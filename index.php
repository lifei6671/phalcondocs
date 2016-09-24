<?php

/**
 * 发起一个 GET 请求
 * @param $url
 * @param array $params
 * @param array $header
 * @param int $timeout
 * @param bool $only_body
 * @return mixed
 */
function get($url,$params = array(),array $header = array(),$timeout = 30, $only_body = false){

    if(empty($params) === false){
        $param = http_build_query($params);

        $url = $url . ((strpos($url,'?') === false) ? '?' : '&') .$param;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

    if (empty($header) === false) {
        $items = array();
        foreach ($header as $key => $value) {
            $items[] = $key . ':' . $value;
        }
        if (empty($items) === false) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $items);
        }
    } else {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
    }
    $result = curl_exec($ch);
    $only_body  == false && $httpInfo = curl_getinfo($ch);

    curl_close($ch);
    if($only_body === true){
        return $result;
    }

    $httpInfo['body'] = $result;

    return $httpInfo;
}
function mkDirs($dir){
    if(!is_dir($dir)){
        if(!mkDirs(dirname($dir))){
            return false;
        }
        if(!mkdir($dir,0777)){
            return false;
        }
    }
    return true;
}

$param = isset($_GET['url'])?$_GET['url']:"";

if(empty($param)){
    $param = '/zh/latest/index.html';
    header('Location:'.$param);
    exit;
}elseif(strpos($param,'sources') > 0){
    if(file_exists(__DIR__ . $param)){
        header('Content-Type:text/html;');
        readfile(__DIR__ . $param);
    }

    $param = str_replace('sources','_sources',$param);
    $param = str_replace('.md','.txt',$param);
}
$url = 'https://docs.phalconphp.com/' . $param;

$body = get($url,[],[],300);

if($body['http_code'] == 200){
    $content = $body['body'];
    $content = str_replace('https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css','http://cdn.staticfile.org/twitter-bootstrap/3.3.6/css/bootstrap.min.css',$content);

    $content = str_replace('https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js','http://cdn.staticfile.org/jquery/1.8.1/jquery.min.js',$content);
    $content = str_replace('//static.phalconphp.com/www/','/www/',$content);
    $content = str_replace('../_static/','../static/',$content);
    $content = str_replace('../_images/','../images/',$content);
    $content = str_replace('../_sources/','../sources/',$content);
    $content = str_replace('.txt','.md',$content);

    $param = str_replace('_sources','sources',$param);
    $param = str_replace('.txt','.md',$param);

    @file_put_contents(__DIR__ . $param,$content);
    echo $content;
}else{
    print_r($body);
}


