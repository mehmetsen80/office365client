# office365client
php client for office365

This client has been improving by looking at the code of @ankitsam  https://github.com/ankitsam/office365-api-php-client  

Sources: 
<h4>- https://github.com/ankitsam/office365-api-php-client </h4>
<h4>- https://msdn.microsoft.com/library/office/dn707383.aspx </h4>

<h3>HOW TO</h3>
<ul>
<li> First make sure you have curl library (i.e php5-curl) installed if not install it 
    
     <h6>$ sudo apt-get install php5-curl </h6> </li>

<li> Setup config.php with your client id, secret key and redirect url
    <h6>oauth2_client_id, oauth2_secret, oauth2_redirect</h6>  </li>
    
<li> oauth2.php is your main file that uses the client
</ul>

<h6>After you click the app icon on office 365, it redirects you to oauth2.php along with the continue button</h6>
<h6>Click Continue button to refreshe the page and you get the user info</h6>
<pre>print "&lt;a class='login' href='$forward_url'&gt;Connect Me!&lt;/a&gt;";</pre>

<b>It's also possible that you redirect the page automatically</b>

<h4>Finally Get User Info</h4>

<pre>
    //put the user token info into sessions
    $_SESSION['name'] = $client->getJwt()->getName();//full name of the user
    $_SESSION['unique_name'] = $client->getJwt()->getUniqueName();//could be email or id from office365
    $_SESSION['tid'] = $client->getJwt()->getTid();//tenant id
    </pre>
