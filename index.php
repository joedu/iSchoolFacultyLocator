<?php

   require 'config.php';

   $session = $facebook->getSession();


   $me = null;
   if ($session) {
     try {
       $uid = $facebook->getUser();
       $me = $facebook->api('/me');
     } catch (FacebookApiException $e) {
       error_log($e);
       $facebook->setSession(null);
     }
   }

   if ($me) {
      $logoutUrl = $facebook->getLogoutUrl(array(
         'next'=>'http://localhost/fb/logout.php'
      ));
   } else {
      $loginUrl = $facebook->getLoginUrl(array(
         'next'=>'http://localhost/fb/login.php'
      ));
   }

?>
<html>
<head>
	<title>iSchool Faculty Locator - Home</title>
	<link rel="stylesheet" href="style.css" />
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxTPZYElJSBeBUeMSX5xXgq6lLjHthSAk20WnZ_iuuzhMt60X_ukms-AUg"
            type="text/javascript"></script>
            
    <script type="text/javascript">
    //<![CDATA[

    var iconBlue = new GIcon(); 
    iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlue.iconSize = new GSize(12, 20);
    iconBlue.shadowSize = new GSize(22, 20);
    iconBlue.iconAnchor = new GPoint(6, 20);
    iconBlue.infoWindowAnchor = new GPoint(5, 1);

    var iconRed = new GIcon(); 
    iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconRed.iconSize = new GSize(12, 20);
    iconRed.shadowSize = new GSize(22, 20);
    iconRed.iconAnchor = new GPoint(6, 20);
    iconRed.infoWindowAnchor = new GPoint(5, 1);

    var customIcons = [];
    customIcons["restaurant"] = iconBlue;
    customIcons["bar"] = iconRed;

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(47.614495, -122.341861), 13);

        GDownloadUrl("projectphp/phpsqlajax_genxml.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var profFName = markers[i].getAttribute("profFName");
             var profLName = markers[i].getAttribute("profLName");
            var type = markers[i].getAttribute("type");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, name, address, profFName, profLName, type);
            map.addOverlay(marker);
          }
        });
      }
    }

    function createMarker(point, name, address, profFName, profLName, type) {
      var marker = new GMarker(point, customIcons[type]);
      var html = "<b>" + name + "</b> <br/>" + address + "<br><br>" + profFName + profLName;
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }
    //]]>
  </script>

</head>

<body onload="load()" onunload="GUnload()">
<script>function clearText(field){if (field.defaultValue == field.value) field.value = ''; else if (field.value == '') field.value = field.defaultValue;}</script>
	<div id="contain">
		<div id="header">test </div><!--/header-->
		<div id="left" style="margin-top:5px;">
			<div id="map" style="width: 730px; height: 300px"></div>
		</div><!--/left-->
		<div id="right" style="margin-top:5px;">
		<form name="form" action="src/php/search.php" method="get">
		  <input type="text" name="q" value="Search Professor" onfocus="clearText(this)" />
		  <input type="submit" name="Submit" value="Search" />
		</form>
		<h2 class="title">Twitter Login</h2>
		<?php 

include 'lib/EpiCurl.php';
include 'lib/EpiOAuth.php';
include 'lib/EpiTwitter.php';
include 'lib/secret.php';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
$oauth_token = $_GET['oauth_token'];
	if($oauth_token == '')
  	  { 
	  	$url = $twitterObj->getAuthorizationUrl();
  		echo "<div style='width:200px;margin-top:200px;margin-left:auto;margin-right:auto'>";
        echo "<a href='$url'>Sign In with Twitter</a>";
        echo "</div>";
     } 
	else
	  {
		$twitterObj->setToken($_GET['oauth_token']);
		$token = $twitterObj->getAccessToken();
		$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);	  	
		$_SESSION['ot'] = $token->oauth_token;
		$_SESSION['ots'] = $token->oauth_token_secret;
		$twitterInfo= $twitterObj->get_accountVerify_credentials();
		$twitterInfo->response;
		
		$username = $twitterInfo->screen_name;
		$profilepic = $twitterInfo->profile_image_url;

		include 'lib/update.php';
        
     } 

if(isset($_POST['submit']))
	  {
	  	$msg = $_REQUEST['tweet'];
		
		$twitterObj->setToken($_SESSION['ot'], $_SESSION['ots']);
		$update_status = $twitterObj->post_statusesUpdate(array('status' => $msg));
		$temp = $update_status->response;
		
		echo "<div align='center'>Updated your Timeline Successfully .</div>";
		
	  }
	  #END TWITTER-----------
?> 
	  <!-- begin facebook  -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '238948352849195',
            status     : true, 
            cookie     : true,
            xfbml      : true,
            oauth      : true,
          });
        };
        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           d.getElementsByTagName('head')[0].appendChild(js);
         }(document));
      </script>
      <div 
        class="fb-registration" 
        data-fields="[{'name':'name'}, {'name':'email'},
          {'name':'favorite_car','description':'What is your favorite car?',
            'type':'text'}]" 
        data-redirect-uri="http://localhost/SENIORDESIGN/social/"
      </div>
      
       <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '238948352849195',
            status     : true, 
            cookie     : true,
            xfbml      : true,
            oauth      : true,
          });

          FB.ui({ method: 'feed', 
              message: 'Facebook for Websites is super-cool'});
        };

        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           d.getElementsByTagName('head')[0].appendChild(js);
         }(document));
      </script>
      <h2 class="title">Facebook</h2>
          <?php if ($me): ?>
    <?php echo "Welcome, ".$me['first_name']. ".<br />"; ?>
    <a href="<?php echo $logoutUrl; ?>">
      <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
    </a>
    <?php else: ?>
      <a href="<?php echo $loginUrl; ?>">
        <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
      </a>
    <?php endif ?>

		</div><!--/right-->
		<div id="clear"></div>
	</div><!--/contain-->
</body>
</html>