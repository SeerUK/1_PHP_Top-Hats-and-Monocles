<!DOCTYPE html>
<html>
    <head>
        <title>Watching: {{$strStreamTitle}} | {{$smarty.const.TITLE}}</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/main.css" />
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/dev.css" />

        <!-- Include JavaScript -->
        <script src="{{$smarty.const.STATIC_ROOT}}js/jquery.min.js" type="text/javascript"></script>
        <script src="{{$smarty.const.STATIC_ROOT}}js/modernizer.js" type="text/javascript"></script>

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
            <div class="SideBarBox inner">
                <div class="inner">
                    <div id="MainStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="{{$smarty.const.STATIC_ROOT}}images/games/lol.jpg" alt="" title="" />
                            <div class="left">
                                <span class="viewing">Currently Watching Live:</span>
                                <span class="game">League of Legends</span>
                                <span class="streamer"><em><span style="color: #0099ff;">Smoggy</span>::1,245 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="MT20"></div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="{{$smarty.const.STATIC_ROOT}}images/games/dksdr.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">Darksiders</span>
                                <span class="streamer"><em>Live: <span style="color: #009966;">Seer</span>::79 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="{{$smarty.const.STATIC_ROOT}}images/games/lol.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">League of Legends</span>
                                <span class="streamer"><em>Live: <span style="color: #0099ff;">FatMidget</span>::121 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="{{$smarty.const.STATIC_ROOT}}images/games/gw2.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">Guild Wars 2</span>
                                <span class="streamer"><em>Live: <span style="color: #0099ff;">Drazzian</span>::164 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="CentreColumn">
            <h1><span>Top Hats & Monocles</span></h1>
