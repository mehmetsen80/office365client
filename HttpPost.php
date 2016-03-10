<?php

/**
 * Created by PhpStorm.
 * User: msen
 * Date: 3/10/16
 * Time: 12:13 PM
 */
class HttpPost
{
    public $url;
    public $postString;
    public $httpResponse;
    public $ch;

    public function __construct($url) {
        $this->url = $url;
        $this->ch = curl_init ( $this->url );
        curl_setopt ( $this->ch, CURLOPT_FOLLOWLOCATION, false );
        curl_setopt ( $this->ch, CURLOPT_HEADER, false );
        curl_setopt ( $this->ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $this->ch, CURLOPT_SSL_VERIFYPEER, false );
    }

    public function __destruct() {
        curl_close ( $this->ch );
    }
    public function setPostData($params) {
        // http_build_query encodes URLs, which breaks POST data
        $this->postString = rawurldecode ( http_build_query ( $params ) );
        curl_setopt ( $this->ch, CURLOPT_POST, true );
        curl_setopt ( $this->ch, CURLOPT_POSTFIELDS, $this->postString );
    }

    public function send() {
        $this->httpResponse = curl_exec ( $this->ch );
    }

    public function getHttpResponse() {
        return $this->httpResponse;
    }
}