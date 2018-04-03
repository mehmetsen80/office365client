<?php
/**
 * Created by PhpStorm.
 * User: msen
 * Date: 3/10/16
 * Time: 12:25 PM
 */

require_once('Office365_Client.php');
session_start();
$client = new Office365_Client();
$forward_url = $client->createAuthUrl();
if(isset($_GET['code'])) {
    //TODO: verfiy unquie key state to check CSRF attack

    $code = $_GET['code'];
    $client->setCode($code);
    //get tokens
    $client->fetchTokens();
    echo '<br/><br/>';
    //print access tokens
    print($client->toString());
    echo '<br/><br/>';


    //you can set the tokens into your own session
    $_SESSION['accesstoken'] = $client->getAccessToken();
    $_SESSION['refreshtoken'] = $client->getRefreshToken();

    //let's get user info
    $client->fetchJWT();
    //print the usr info
    print($client->getJwt()->toString());


    /*****
     * Example, the real values are modified for security reasons
     *
     * JWT ==>
    aud: 2bb002b0-e94a-43b3-993e-99b62c153129
    iss: https://sts.windows.net/4001e375-31b4-4f03-b7d2-cb95ac6f5ff7/
    iat: 1490630128
    nbf: 1490630128
    exp: 1457612368
    ver: 1.0
    tid: 1261e375-31b4-4f03-b002-cbdeac6f5ff7
    amr: Array
    oid: f30854cb-4a90-b339-a03f-594w18cc59c1
    upn: msen@na.edu
    puid:
    sub: HhbpMSalPJd8BPkkyhh5wa3XWhd2q8Jz4fQRwSsCScU
    given_name: Mehmet
    family_name: Sen
    name: Mehmet Sen
    unique_name: msen@na.edu
    appid:
    appidacr:
    scp:
    acr:
     *
     */



    //put the user token info into sessions
    $_SESSION['name'] = $client->getJwt()->getName();//full name of the user
    $_SESSION['unique_name'] = $client->getJwt()->getUniqueName();//could be email or id from office365
    $_SESSION['tid'] = $client->getJwt()->getTid();//tenant id





    /********
     * Another Example JWT from microsoft site  https://msdn.microsoft.com/library/office/dn707383.aspx
     *
     * {
    "aud": "https://manage.office.com",
    "iss": "https://sts.windows.net/41463f53-8812-40f4-890f-865bf6e35190/",
    "iat": 1427246416,
    "nbf": 1427246416,
    "exp": 1427250316,
    "ver": "1.0",
    "tid": "41463f53-8812-40f4-890f-865bf6e35190",
    "amr": [
    "pwd"
    ],
    "oid": "1cef1fdb-ff52-48c4-8e4e-dfb5ea83d357",
    "upn": "admin@contoso.onmicrosoft.com",
    "puid": "1003BFFD8EC47CA6",
    "sub": "7XpD5OWAXM1OWmKiVKh1FOkKXV4N3OSRol6mz1pxxhU",
    "given_name": "John",
    "family_name": "Doe",
    "name": "Contoso, Inc.",
    "unique_name": "admin@contoso.onmicrosoft.com",
    "appid": "a6099727-6b7b-482c-b509-1df309acc563",
    "appidacr": "1",
    "scp": "ActivityFeed.Read ServiceHealth.Read",
    "acr": "1"
    }
     *
     *
     */




} else{
    //click Continue button instead of redirecting to itself
    //print "<a class='login' href='$forward_url'>Connect Me!</a>";

    //you can also redirect automatically
    header( 'Location: '.$forward_url );
}

?>