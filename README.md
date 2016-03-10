# office365client

<h1>PHP CLIENT FOR OFFICE365</h1>

This has been improved by examining at the code of @ankitsam  https://github.com/ankitsam/office365-api-php-client  

<h3>Sources:<h3> 
<h4>- https://github.com/ankitsam/office365-api-php-client </h4>
<h4>- https://msdn.microsoft.com/library/office/dn707383.aspx </h4>
<br><br>
<h3>HOW TO INSTALL</h3>
<ul>
<li>copy paste the php files into your own server directory
    <h6>config.php, HttpPost.php, JWT.php, oauth2.php and Office365_Client.php</h6>
</li>
<li> Make sure you have curl library (i.e php5-curl) installed if not install it. For example for Ubuntu:
    
     <h6>$ sudo apt-get install php5-curl </h6> </li>

<li> Setup config.php with your client id, secret key and redirect url
    <h6>oauth2_client_id, oauth2_secret, oauth2_redirect</h6>  </li>
    
<li> <b><u>oauth2.php</u></b> is your main file that uses the client
</ul>

<br><br>
<h6>After you click the app icon on office 365, it redirects you to oauth2.php along with the continue button</h6>
<h6>Click Continue button to refresh the page and you get the user info</h6>
<pre>print "&lt;a class='login' href='$forward_url'&gt;Connect Me!&lt;/a&gt;";</pre>

<br>
<h6>It's also possible that you redirect the page automatically</h6>
<pre>  header( 'Location: $forward_url' );   </pre>

<br><br>

<h4>Finally Get User Info</h4>

<pre>
    //put the user token info into sessions
    $_SESSION['name'] = $client->getJwt()->getName();//full name of the user
    $_SESSION['unique_name'] = $client->getJwt()->getUniqueName();//could be email or id from office365
    $_SESSION['tid'] = $client->getJwt()->getTid();//tenant id
    </pre>


<h3>Example JWT</h3>
<pre>
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
</pre>

<h3>Another Example JWT</h3>
<pre>
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

</pre>
