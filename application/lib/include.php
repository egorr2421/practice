<?php
require "application/core/View.php";
require "application/core/Controller.php";
require "application/core/Router.php";
function includeAll($startway){
    $oll = scandir($startway);
    foreach ($oll as $corent){
        if($corent!="."&&$corent!=".."){

            if(is_dir($startway."/".$corent)){
                if($corent!="core"&&$corent!="View")
                    includeAll($startway."/".$corent);
            }else{
                if($corent!="include.php"){

                    require $startway."/".$corent;
                }
            }

        }
    }
}
includeAll("/domains/lasttest/application");