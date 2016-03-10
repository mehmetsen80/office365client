# office365client
php client for office365

This client has been modified by improving the code of @ankitsam  https://github.com/ankitsam/office365-api-php-client  

Sources: 
1- https://github.com/ankitsam/office365-api-php-client 
2- https://msdn.microsoft.com/library/office/dn707383.aspx

<h3>HOW TO</h3>
<ul>
<li> First make sure you have curl library (i.e php5-curl) installed if not install it 
    
     $ sudo apt-get install php5-curl </li>
<li> Create an app in your Office365 portal and get your client id and secret key  </li>
<li> Setup config.php with your client id, secret key and redirect url
    oauth2_client_id, oauth2_secret, oauth2_redirect  </li>
    
<li> oauth2.php is your main file that uses the client
</ul>
