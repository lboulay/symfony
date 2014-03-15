<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title></title> 
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.2.0.min.css">
    <style type="text/css">
    body{ margin:0;}
#portfolio{
	margin: 0 auto;
}
.bloc{
	float:left; 
	margin: 5px;
	height: 100px;
}
.bloc .info{
	display:none;
	overflow:hidden;
	padding:10px 0;
	height:320px;
	
margin-bottom: 20px;
background-color: #f5f5f5;
border: 1px solid #e3e3e3;
border-radius: 4px;
box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
.bloc .info div {
	overflow:hidden;
	float:left;
	padding:10px 2%;
	width:59%;
}
.bloc .info div.infoThumb {
    padding:0 2%;
    margin-right:0;
    border-right:1px solid #CCCCCC;
    height:100%;
    width:32%;
}
.bloc .info div.infoThumb img {
    float:left;
    margin:10px 0;
    width:100%;
}
.bloc.unfold{
	height: 340px;
	width: 99%;
}
.bloc.unfold .info{
	display: block;
}
.bloc.unfold .thumb{
	display: none;
}
.close {
right :20px;
top:20px;
position:absolute;    
}
    </style>
    </head> 
    <body>       
      
        <div id="portfolio">
<?php
    $i = 0;
    while ($i < 20) {
?>
    <div class="bloc" id="projet<?= $i ?>">
        <a class="thumb" href="#projet<?= $i ?>"><img src="http://placehold.it/150x100" alt="" width="150" height="100"></a>
        <div class="info">
            <img class="close" src="close.jpg" />
            <div class="infoThumb">
                <img src="http://placehold.it/640x300" alt="" width="630" height="300">
            </div>
            <div>
                <p>Ici les infos de mon projet</p>
            </div>
        </div>
    </div>
<?php $i++; } ?>
	                </div>
         
    </body> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="masonry.js"></script>
    <script type="text/javascript" src="main.js"></script>
</html>