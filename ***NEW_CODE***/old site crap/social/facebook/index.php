<html>
    <head>
      <title>iSchool Faculty Locator | Login with Facebook</title>
    </head>
    <body>
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
      
      <H1>SHARE ABOUT US</H1>
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
      
    </body>
 </html>