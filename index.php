<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if(!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>


<?php
  $app_name = 'VDM';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$currDir = dirname(__FILE__);
	include("{$currDir}/defaultLang.php");
	include("{$currDir}/language.php");
    include("{$currDir}/lib.php");
    

	$x = new DataList;
	$x->TableTitle = $Translation['homepage'];
	$tablesPerRow = 2;
	$arrTables = getTableList();

	// according to provided GET parameters, either log out, show login form (possibly with a failed login message), or show homepage
	if(isset($_GET['signOut'])){
		logOutUser();
		redirect("index.php?signIn=1");
	}elseif(isset($_GET['loginFailed']) || isset($_GET['signIn'])){
        if(!headers_sent() && isset($_GET['loginFailed'])) header('HTTP/1.0 403 Forbidden');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VDM | home</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" href="images/heads.png">
  
  <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/lightbox/css/lightbox.css" media="screen">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/select2/select2.css" media="screen">
    

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

  <!-- Custom styles for this template -->
  <link href="css/new-age.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/responsive.css">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script>var $j = jQuery.noConflict();</script>
  <style>
.masthead{
  background-repeat: no-repeat;
  background-size: auto;
}
.home-area, .navbar-collapse, nav {
    padding: 12px 40px;
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#482cbf+0,6ac6f0+100 */
    background: #333;
    /* Old browsers */
    /* FF3.6-15 */
    background: -webkit-linear-gradient(45deg, #333 0%, #4CAF50 100%);
    /* Chrome10-25,Safari5.1-6 */
    background: -o-linear-gradient(45deg, #333 0%,  #4CAF50 100%);
    background: linear-gradient(45deg, #333 0%,  #4CAF50 100%);
    /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#482cbf', endColorstr='#6ac6f0', GradientType=1);
    color: #ffffff;
    -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
}
.modal {
  text-align: center;
}
#home-text{
  margin-top: 150px;
}
@media screen and (max-width: 768px) { 
  #home-text{
        margin-top: 0px;
        top: 10px;
    }
    .modal-body{
      width: 300px;
      overflow-x: scroll;
  } 
    
}
@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

/* Make the image fully responsive */
.carousel-inner img {
      width: 100%;
      height: 100%;
  }
  .buttonx {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.buttonx {
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.buttonx:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}
  .regbutton{
      background-color: white;
      color: black;
      border: 2px solid #4CAF50;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  }
 
.modal-dialog {
    margin-top: 100px;
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>



<script>
    var user_state="";
    var user_grp="";
</script>

<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-auth.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyDmbDHBDU2l5UhsTR_aqRD0A6rKhkzNr1k",
      authDomain: "userauth-d2121.firebaseapp.com",
      databaseURL: "https://userauth-d2121.firebaseio.com",
      projectId: "userauth-d2121",
      storageBucket: "",
      messagingSenderId: "233079482561",
      appId: "1:233079482561:web:06d9db4a02e096e5"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>

<script src="https://cdn.firebase.com/libs/firebaseui/4.1.0/firebaseui.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/4.1.0/firebaseui.css" />
<script type="text/javascript">
  // FirebaseUI config.
  var uiConfig = {
    signInSuccessUrl: '',
    signInOptions: [
      // Leave the lines as is for the providers you want to offer your users.
      
      {
        provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
        defaultCountry: 'KE'
      }
    ],
    // tosUrl and privacyPolicyUrl accept either url string or a callback
    // function.
    // Terms of service url/callback.
    tosUrl: '',
    // Privacy policy url/callback.
    privacyPolicyUrl: function() {
      window.location.assign('');
    },
callbacks: {
signInSuccessWithAuthResult: function(authResult, redirectUrl) {
  // Process result. This will not trigger on merge conflicts.
  // On success redirect to signInSuccessUrl.

  // get user mobile
  $j("#phone").val(authResult.user.providerData[0].uid);
  switch(window.user_state){
    case "new-group" :
      $j("#register-group").show();
      $j("#firebaseui-auth-container").hide();
    break;
    default:
      $j("#firebaseui-auth-container").hide();
      $j("#register-user").show();
  }
  

  return true;
},
// signInFailure callback must be provided to handle merge conflicts which
// occur when an existing credential is linked to an anonymous user.
signInFailure: function(error) {
  // For merge conflicts, the error.code will be
  // 'firebaseui/anonymous-upgrade-merge-conflict'.
  if (error.code != 'firebaseui/anonymous-upgrade-merge-conflict') {
    return Promise.resolve();
  }
  // The credential the user tried to sign in with.
  var cred = error.credential;
  // If using Firebase Realtime Database. The anonymous user data has to be
  // copied to the non-anonymous user.
  var app = firebase.app();
  // Save anonymous user data first.
  return app.database().ref('users/' + firebase.auth().currentUser.uid)
      .once('value')
      .then(function(snapshot) {
        data = snapshot.val();
        // This will trigger onAuthStateChanged listener which
        // could trigger a redirect to another page.
        // Ensure the upgrade flow is not interrupted by that callback
        // and that this is given enough time to complete before
        // redirection.
        return firebase.auth().signInWithCredential(cred);
      })
      .then(function(user) {
        // Original Anonymous Auth instance now has the new user.
        return app.database().ref('users/' + user.uid).set(data);
      })
      .then(function() {
        // Delete anonymnous user.
        return anonymousUser.delete();
      }).then(function() {
        // Clear data in case a new user signs in, and the state change
        // triggers.
        data = null;
        // FirebaseUI will reset and the UI cleared when this promise
        // resolves.
        // signInSuccessWithAuthResult will not run. Successful sign-in
        // logic has to be run explicitly.
        window.location.assign('<url-to-redirect-to-on-success>');
      });

}
}
  };

  // Initialize the FirebaseUI Widget using Firebase.
  var ui = new firebaseui.auth.AuthUI(firebase.auth());
  // The start method will wait until the DOM is loaded.
  ui.start('#firebaseui-auth-container', uiConfig);
</script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" >
    <div class="container">
      <a class="navbar-brand js-scroll-trigger btn btn-success"  href="#home"><b color="#fff">VDM</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signin">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="home-area" id="home">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-xs-12 hidden-sm col-md-5">
                    <figure class="mobile-image wow fadeInUp" data-wow-delay="0.2s">
                        <img src="images/header-mobileb.png" alt="">
                    </figure>
                </div>
                <div id="home-text" class="col-xs-12 col-md-7 ">
                    <div class="space-80 hidden-xs"></div>
                    <h3 class="wow fadeInUp" data-wow-delay="0.4s">Start your amazing project proposals through <span class="h2">Village Developers Management Limited</span>.</h3>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>A place people are proud to own it.</p>
                  </div>
                  <div class="space-20"></div>
                  <a href="#" class="badeInUp btn btn-sm btn-primary" data-wow-delay="0.8s" data-toggle="modal" data-target="#signup"><i class="lnr lnr-chevron-right"></i>Register</a>
                <span class="h5">or </span> 
              <a href="#signin" class="fadeInUp btn btn-sm btn-success">Sign in</a>
          </div>
      </div>
    </div>
  </header>

  <section class="section-padding" id="about">
        <!-- About heading -->
  <div class="jumbotron text-center">
    <h1 class="display-4">ABOUT US</h1>
    <p class="font-italic">Let's make something great together.</p>
  </div>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="mods/girlchild.png" alt="START TODAY" width="1366" height="400">
    </div>
    <div class="carousel-item">
      <img src="mods/youth.png" alt="MAKE A DIFFERENCE" width="1366" height="400">
    </div>
    <div class="carousel-item">
      <img src="mods/yeah.png" alt="BELIEVE" width="1366" height="400">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <!-- a very nice quote -->
    <div class="jumbotron text-center">
        <p style="font-size: 16px;">There is a powerful driving froce inside every human being that, once unleashed, can make any vision, dream or a desire a reality.</p>
    </div>
    <!-- some more data -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid" src="mods/boss.png" alt="What is VDM">
            </div>
            <div class="col-sm-4">
                <img class="img-fluid" src="mods/whatwedo.png" alt="What is VDM">
            </div>
            <div class="col-sm-4">
                <img class="img-fluid" src="mods/progress.png" alt="What is VDM">
            </div>
            <!-- register today -->
            <div class="col-sm-12 text-center">
                <div class="display-4" style="color: green; margin: 30px;">Register Today</div>
            </div>
             <!-- register button -->
             <div class="col-sm-12 text-center">
                <button class=" buttonx regbutton">Register</button>
            </div>
            <!-- our goal implemented using card -->
            <div class="col-sm-12">
                <div class="card text-white">
                    <div class="card-header bg-dark text-center">Our Goal</div>
                    <div class="card-body" style="color: black;">
                        <p class="card-text">
                          VDM seaks to join people and groups that will earn them a living. Most people face challenges in management of finance and hence it increases the poverty level and hereby we came up with this programme of reducing poverty level. Investing on young entreprenuers whose ventures on their project proposals, will give them oppotunities on earning and self employment.
                        <p>
                    </div>
                </div>
            </div>
            <!-- our vision and mission -->
            <!-- VISION -->
            <div class="col-sm-4">
                <div class="card text-white">
                    <div class="card-header bg-danger text-center">Vision</div>
                    <div class="card-body" style="color: black;">
                        <p class="card-text">To contest community in practical income generating.</p>
                    </div>
                </div>
            </div>
            <!-- MISSION -->
            <div class="col-sm-8">
                <div class="card text-white">
                    <div class="card-header bg-danger text-center">Mission</div>
                    <div class="card-body" style="color: black;">
                        <p class="card-text">To be the best empowering management firm in the community on services to offer such as business management and advertisement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    <!-- Home-Area-End -->
    <!-- register -->
    <?php include("register.php")?>
    <!-- login section -->
    <section class="section-padding" id="signin">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="page-title text-center">
                        <img src="images/about-logoa.png" alt="About Logo">
                        <div class="space-20"></div>
                        <h5 class="title">Sign in</h5>
                    </div>
                    <?php include("{$currDir}/login.php");?>
                </div>
            </div>
        </div>
    </section>
    <!-- login-Area-End -->
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Contact US</h5>
                            <h3 class="dark-color" style="color: green;">Find Us By Below Details</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <!-- quick links -->
                <div class="row">
                  <div class="col-sm-4">
                      <div class="row">
                          <div class="footer-box">
                              <div class="box-icon">
                                  <span class="fa fa-map-marker h3"></span>&nbsp;Eldoret Kenya
                              </div>
                              
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <div class="box-icon">
                                  <span class="fa fa-phone h3"> </span>&nbsp;+254771019469
                              </div>
                           
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <div class="box-icon">
                                  <span class="fa fa-envelope h3"></span>&nbsp;reducepovertyclub@gmail.com
                              </div>
                                
                          </div>
                      </div>
                  </div>

                  <!-- social media -->
                  <div class="col-sm-4">
                      <div class="row">
                          <div class="footer-box">
                              <a  href="#" class="box-icon">
                                  <i class="fab fa-facebook-f h3"></i>
                                  Facebook
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <a  href="https://twitter.com/ReduceClub" class="box-icon">
                                <i class="fab fa-twitter h3"></i>
                                  Twitter
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <a  href="https://www.youtube.com/channel/UCWEzgdZ-_xbWUPqMU-sTpdA?view_as=subscriber" class="box-icon">
                                <i class="fab fa-youtube h3"></i>
                                  Youtube
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                  </div>

                    <!-- social media -->
                    <div class="col-sm-4">
                      <div class="row">
                          <div class="footer-box">
                              <a  href="#home" class="box-icon" style="color: green;">
                              <i class="fas fa-home h3"></i>
                                  Home
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <a  href="#about" class="box-icon" style="color: green;">
                              <i class="fas fa-address-card h3"></i>
                                  About us
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                      <div class="row">
                          <div class="footer-box">
                              <a  href="#signin" class="box-icon" style="color: green;">
                              <i class="fas fa-user h3"></i>
                                  Sign in
                              </a>
                          </div>
                          <div class="space-30 hidden visible-xs"></div>
                      </div>
                  </div>
                  
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="lnr lnr-heart" aria-hidden="true"></i> </a></span>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="footer-menu">
                            <ul>
                                <!-- <li><a href="#">About</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Contacts</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>

  <!-- Bootstrap core JavaScript -->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/new-age.min.js"></script>
  <script>
    var groupID=0;
    $j(document).ready(function(){
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
        
      $j("#register-user").hide();
      $j("#firebaseui-auth-container").hide();
      $j("#register-group").hide();
      $j("#register-start").show();

      $j('#register-start-join_group').css("font-size", "11px");
      $j('#register-start-join_group').css("margin-top", "10px");

      $j('#register-start-new_group').css("font-size", "11px");
      $j('#register-start-new_group').css("margin-top", "10px");

      $j("#register-start-new_group").click(function(){
        $j("#firebaseui-auth-container").show();
        window.user_state="new-group";
        $j("#register-start").hide();
      });

      $j("#signup-close").click(function(){
        $j("#register-user").hide();
        $j("#firebaseui-auth-container").hide();
        $j("#register-group").hide();
        $j("#register-start").show();
        //$j("#firebaseui-auth-container").children().remove();
        ui.start('#firebaseui-auth-container', uiConfig);
      });
       
      $j("#register-group-btn").click(function(){
        var gName =$j.trim($j("#grp-name").val());
        var gDes=$j.trim($j("#grp-description").val());
        if(gName && gDes){ 
          //check if group exist
          //add group
          $j(this).prop("disabled",true);
          $j(this).text("loading...");
          $j.post("register-grp.php",{"table": "membership_groups", "name": $j("#grp-name").val(), "description": $j("#grp-description").val()})
          .done(function(dat){
			      data = $j.parseJSON(dat);
            if(data){

            }

			    });
          setTimeout(function(){
            getGroupID();
          }, 100);
        }else alert("all fields are requred");
      });

      $j("#register-start-join_group").click(function(){
          $j("#firebaseui-auth-container").show();
          window.user_state="join-group";
          $j("#register-start").hide();
      });
      
    });

    function prepGrp(name, id){
      set_groupID(id);
      $j("#register-user").show();
      $j("#register-group").hide();
      $j("#register-group-btn").prop("disabled",false);
      $j("#register-group-btn").text("Next");
      if($j("#groupID").val()!=id){
           $j("#groupID").prepend('<option value="'+id+'" class="">'+name+' *</option>');
            $j("#groupID").val(id);
      }
     
      
    }

    function getGroupID(){
      $j.post("register-grp.php",{"table": "membership_groups", "name": $j("#grp-name").val(), "description": $j("#grp-description").val()})
      .done(function(dat){
			  data = $j.parseJSON(dat);
        if(data[0].groupID>0){
          prepGrp($j("#grp-name").val(), data[0].groupID);
        }else if(data[0].groupID==null){
          setTimeout(function(){
            getGroupID();
          }, 500);
        }else {
          setTimeout(function(){
            getGroupID();
          }, 500);
        }
		  });
      if(groupID<1){
        setTimeout(function(){
            getGroupID();
          }, 500);
      }
      
    }

    function set_groupID(id){
      groupID=id;
    }
    </script>


</body>

</html>
<?php
    	}else{
            include("{$currDir}/dashboard.php");
        }
?>