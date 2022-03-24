<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>REALTIME APP </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <style>

        a{
            text-decoration:none ;
        }
    </style>
</head>
<body>

<div id="app">
    <v-app>
    <home-component></home-component>
    </v-app>
</div>

</body>

<script src="{{ asset('js/app.js') }}" defer></script>


</html>

