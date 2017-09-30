<!doctype html>
<html>
  <head>
    <title>Mobile Breaking News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <!-- MATERIALICEcss BEGIN-->

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Local style file -->
    <link href="css/base.css" rel="stylesheet">


    <!-- Compiled and minified JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>-->
    <!-- MATERIALICEcss END-->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
          

    <!-- Include the AngularJS library -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.js"></script>

    <!-- Include for parse text as Html without problems -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.1/angular-sanitize.js"></script>

    <!-- https://github.com/kresCruz/angular-materialize -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.2/angular-materialize.min.js"></script>

  </head>
  <body ng-app="mbn" ng-controller="mainc">
    <div class="navbar-fixed">
       <!-- Dropdown Content -->
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="/features/integrations">Integrations</a></li>
        <li><a href="/features/codeblock">Code blocks</a></li>
        <li><a href="/features/user">User API</a></li>
        <li><a href="/features/object">Data API</a></li>
        <li><a href="/features/hosting">Hosting</a></li>          
        <!-- <li class="divider"></li>
        <li><a href="#!">three</a></li> -->
      </ul>
      
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <img src="http://icons.iconarchive.com/icons/itzikgur/my-seven/32/Newspapers-1-icon.png" style="    vertical-align: middle;" alt="">
            <a href="/" class="brand-logo">Last NEWS</a> 
            <!--      
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            -->
            <!-- Navbar menu -->
            <ul class="right hide-on-med-and-down">          
              <li class="link">
                <!--<li class="link"><a target="_blank" href="http://lucianothoma.xyz">Autor</a></li>-->
              <!-- <li class="link"><a href="/pricing">Pricing</a></li>    -->
              <!--<li><a href="https://editor.stamplay.com/home" class="waves-effect waves-light btn yellow darken-2 grey-text text-darken-4 segment-track-login">Login</a>-->
              </li>     
            </ul>

            <!-- Navbar menu mobile -->
            <ul class="side-nav" id="mobile-demo" style="transform: translateX(-100%);">
              <li><a href="/product">Vacio</a></li>                    
              <!--  <li><a href="/pricing">Pricing</a></li>  -->
            </ul>

          </div>
        </div>
      </nav>
    </div>

    <div class="main" >
      <div class="row ">
      <label>Noticias del ámbito:</label>
      <select class="browser-default" ng-model="seccionActual" ng-options="val for val in secciones">
      </select>  
      </div>
      <div class="row">
        <card-news ng-repeat="noti in noticias | orderBy:'-noti.date'" info="noti" location2see="seccionActual"></card-news>
      </div>
    </div>

    <!-- Modules -->
    <script src="angularjs/app.js"></script>

    <!-- Controllers -->
    <script src="angularjs/controllers/mainc.js"></script>

    <!-- Services -->
    <script src="angularjs/services/news.js"></script>

    <!-- Directives -->
    <script src="angularjs/directives/cardNews.js"></script>

    <!--
    <script>

      $('.button-collapse').sideNav({
          menuWidth: 300, // Default is 300
          edge: 'left', // Choose the horizontal origin
          closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true, // Choose whether you can drag to open on touch screens,
          onOpen: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is opened
          onClose: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is closed
        }
      );
    </script>
    -->
  </body>
</html>
