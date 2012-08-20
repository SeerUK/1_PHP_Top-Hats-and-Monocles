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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="LeftColumn" class="SideColumn">
            <ul id="PrimaryNavigation">
                {{foreach $arrPN as $PNKey=>$PNItem}}
                    <li><a href="{{$PNItem}}">{{$PNKey}}</a></li>
                {{/foreach}}
            </ul>
        </div>
