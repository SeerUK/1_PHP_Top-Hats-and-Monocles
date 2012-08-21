<!DOCTYPE html>
<html>
    <head>
        <title>Watching: {{$strStreamTitle}} | {{$smarty.const.TITLE}}</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/fonts.css" />
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/main.css" />

        <!-- Include JavaScript -->
        <script src="{{$smarty.const.STATIC_ROOT}}js/jquery.min.js" type="text/javascript"></script>

        <!-- Setup Page -->
        <script src="{{$smarty.const.STATIC_ROOT}}js/tophats.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="LeftColumn" class="SideColumn">
            <ul id="PrimaryNavigation">
                {{foreach $arrPN as $PNKey=>$PNItem}}
                    <li><a href="{{$PNItem}}">{{$PNKey}}</a></li>
                {{/foreach}}
            </ul>
        </div>
        <div id="CentreColumn">
            <h1><span>Top Hats & Monocles</span></h1>
