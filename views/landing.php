<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 25/11/2016
 * Time: 09:00
 */
 $pagetitle = "Smartphamily - Home";
 include(__DIR__."/header.php");
?>

<div id="landingPage">

    <svg id="form1" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 2895.6 1743.8" style="enable-background:new 0 0 2895.6 1743.8;" xml:space="preserve">
    <style type="text/css">
        .st0{opacity:0.15;fill:#27273A ;}
    </style>
    <path id="XMLID_1_" class="st0" d="M1630.7,24.6L33.4,1441.7c-79.8,70.8-4.3,199.9,96.5,165.1L879.7,1348c27.5-9.5,57.9-6.2,82.7,9
        l608.5,372.5c32.2,19.7,73,19.1,104.6-1.7l1176.2-775.2c57.5-37.9,58.7-121.7,2.3-161.2L1751.4,17.7
        C1714.4-8.3,1664.4-5.4,1630.7,24.6z"/>
    </svg>

    <svg id="form2" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 298.4 282.5" style="enable-background:new 0 0 298.4 282.5;" xml:space="preserve">
    <style type="text/css">
        .st1{opacity:0.19;fill:#FFFFFF ;}
    </style>
    <path id="XMLID_3_" class="st1" d="M17.7,0.5L75.8,0c5.3,0,10.4,2.3,13.8,6.4l74,88c2.1,2.5,4.9,4.4,8.1,5.5l114.5,37.6
        c12.8,4.2,16.5,20.5,6.8,29.8L177.7,277.5c-6.5,6.2-16.6,6.6-23.6,0.9L23.3,172.1c-3.6-2.9-5.9-7.1-6.5-11.7L0.1,20.4
        C-1.1,9.9,7.1,0.6,17.7,0.5z"/>
    </svg>
    <div class="vertical-align-wrap">
        <div class="vertical-align vertical-align--middle foreground">
            <img id="logo" src="../assets/images/Logo-Smartphamily.png" alt="logo smartphamily"/>
            <h1>L'application qui</br> révolutionne l'éducation.</h1>
            <p class="henry-talking">Initialisation d' Henry</br> en cours...</p>

            <div id="henry">
                <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 291.3 328" style="enable-background:new 0 0 291.3 328;" xml:space="preserve" width="100" height="auto">
                <style type="text/css">
                    .st2{fill:none;stroke:#FFFFFF ;stroke-width:18;stroke-linecap:round;stroke-miterlimit:10;stroke-dasharray:0.9996,0;}
                </style>
                <g id="XMLID_111_">
                    <path id="XMLID_230_" class="st2" d="M18.6,80.7L137.5,12c5.2-3,11.6-3,16.8,0l118.9,68.7c5.2,3,8.4,8.6,8.4,14.6l0,137.3
                        c0,6-3.2,11.6-8.4,14.6l-118.9,68.7c-5.2,3-11.6,3-16.8,0L18.6,247.1c-5.2-3-8.4-8.6-8.4-14.6l0-137.3
                        C10.2,89.2,13.4,83.7,18.6,80.7z"/>
                </g>
                </svg>
            </div>

            <div id="info">
            <div>Soyez informé de mon arrivé</div>
                <span></span>
            </div>
            <div class="newsletter-form">
               <?php include("newsletter.php"); ?>
           </div>

        </div>
    </div>
</div>


