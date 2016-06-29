<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="auth/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="auth/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="auth/assets/css/form-elements.css">
        <link rel="stylesheet" href="auth/assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="auth/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="auth/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="auth/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="auth/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="auth/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        @yield('content')


        <!-- Javascript -->
        <script src="auth/assets/js/jquery-1.11.1.min.js"></script>
        <script src="auth/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="auth/assets/js/jquery.backstretch.min.js"></script>
        <script src="auth/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="auth/assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>