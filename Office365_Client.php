<?php

/**
 * Created by PhpStorm.
 * User: msen
 * Date: 3/10/16
 * Time: 11:58 AM
 */

require_once "config.php";
require_once "JWT.php";
require_once "HttpPost.php";

class Office365_Client
{

    private $code;
    private $accessToken;
    private $refreshToken;
    private $id_token;
    private $jwt;

    public function __construct($config = array()) {
        global $apiConfig;
        $apiConfig = array_merge ( $apiConfig, $config );
    }

    public function createAuthUrl() {
        global $apiConfig;
        $query_params = array ('response_type' => 'code','client_id' => $apiConfig ['oauth2_client_id'],'client_secret' => $apiConfig ['oauth2_secret'],'redirect_uri' => $apiConfig ['oauth2_redirect'],'resource' => $apiConfig ['resource'],'state' => $apiConfig ['state']
        );

        $auth_url = $apiConfig ['oauth2_auth_url'] . '?' . http_build_query ( $query_params );
        return $auth_url;
    }

    public function fetchTokens() {
        global $apiConfig;
        $url = $apiConfig['oauth2_token_url'];
        $params = array ("code" => $this->code,"client_id" => $apiConfig ['oauth2_client_id'],"client_secret" =>$apiConfig ['oauth2_secret'],"resource" => $apiConfig ['resource'],"redirect_uri" => $apiConfig ['oauth2_redirect'],"grant_type" => "authorization_code"
        );

        // build a new HTTP POST request
        $request = new HttpPost ( $url );
        $request->setPostData ( $params );
        $request->send();
        $responseObj = json_decode($request->getHttpResponse ());
        $this->accessToken = $responseObj->access_token;
        $this->refreshToken = $responseObj->refresh_token;
        $this->id_token = $responseObj->id_token;
    }

    // Fetches JWT returned from Azure to get the user's info
    public function fetchJWT() {


        $token_parts = explode(".", $this->getIdToken());

        // First part is header, which we ignore
        // Second part is JWT, which we want to parse
        // First, in case it is url-encoded, fix the characters to be
        // valid base64
        $encoded_token = str_replace('-', '+', $token_parts[1]);
        $encoded_token = str_replace('_', '/', $encoded_token);


        // Next, add padding if it is needed.
        switch (strlen($encoded_token) % 4){
            case 0:
                // No pad characters needed.
                break;
            case 2:
                $encoded_token = $encoded_token."==";
                error_log("Added 2: ".$encoded_token);
                break;
            case 3:
                $encoded_token = $encoded_token."=";
                error_log("Added 1: ".$encoded_token);
                break;
            default:
                // Invalid base64 string!
                return null;
        }

        $json_string = base64_decode($encoded_token);
        $jwt_arr = json_decode($json_string, true);

        $this->jwt = new JWT($jwt_arr);

    }


    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return mixed
     */
    public function getIdToken()
    {
        return $this->id_token;
    }

    /**
     * @param mixed $id_token
     */
    public function setIdToken($id_token)
    {
        $this->id_token = $id_token;
    }

    /**
     * @return JWT
     */
    public function getJwt()
    {
        return $this->jwt;
    }

    /**
     * @param JWT $jwt
     */
    public function setJwt($jwt)
    {
        $this->jwt = $jwt;
    }

    public function toString(){

        return "Office365 ==> <br/>
                code: ". $this->code ."<br/>".
                "accessToken: ". $this->accessToken ."<br/>".
                "refreshToken: ".$this->refreshToken ."<br/>";
    }


}