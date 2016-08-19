<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        #myDIV {
            -webkit-animation: mymove 5s; /* Chrome, Safari, Opera */
            animation: mymove 5s;
        }
        #myDIV2 {
            -webkit-animation: mymove2 3s; /* Chrome, Safari, Opera */
            animation: mymove2 3s;
        }

        /* Chrome, Safari, Opera */
        @-webkit-keyframes mymove {
            from {color: white;}
            to {color: #14141f;}
        }

        /* Standard syntax */
        @keyframes mymove {
            from {color: white;}
            to {color: #14141f;}
        }
         /* Chrome, Safari, Opera */
        @-webkit-keyframes mymove2 {
            from {color: white;}
            to {color: #991f00;}
        }

        /* Standard syntax */
        @keyframes mymove2 {
            from {color: white;}
            to {color: #991f00;}
        }
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }
        a:link, a:visited {
            text-decoration: none;
            color: #991f00;
        }
        a:link:active, a:visited:active {
            color:  #cc2900;
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: top;
        }
        .content {
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 118px;
        }
    </style>
</head>
<body>
<div class="container" id="myDIV">
    <div class="content">
        <div class="title">PSG Tournament Scheduler</div>
            <h1 ><a id="myDIV2" href="{!! route('auth.login') !!}">Login </a> | <a id="myDIV2" href="{!! route('auth.register') !!}">Register</a></h1>
        <h3>{{ \Illuminate\Foundation\Inspiring::quote()  }}</h3>
    </div>
</div>
</body>
</html>