<?php
/**
  * Template Name: Oracle Recruiting
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package LCCC Framework
 */
?>

<!DOCTYPE html>

<html>

 

<head>

    <script>

    function makeHttpObject() {

        try {

            return new XMLHttpRequest();

        } catch(error) {}

        try {

            return new ActiveXObject();

        } catch(error) {}

        throw new Error("Could not create HTTP request object.");

    }

 

    function readCookie(name) {

        let nameEQ = name + "=";

        let ca = document.cookie.split(';');

        for(let i = 0; i < ca.length; i++) {

            let c = ca[i];

            while(c.charAt(0) == ' ')

                c = c.substring(1, c.length);

            if(c.indexOf(nameEQ) == 0)

                return c.substring(nameEQ.length, c.length);

        }

        return '';

    }

 

    function replacecontent() {

        // required for honoring site preferences from provided cookie consent

        let langCookieVal = readCookie('siteLang');

        let anchortext = (document.URL.split('#').length > 1) ? document.URL.split('#')[1] : langCookieVal;

         

        //Replace the FUSION_CE_HOST_ADDRESS with Fusion CE Host details

        //Example:

        //host = 'https://fuscdrmsmc82-fa-ext.us.oracle.com';

        //const host = "https://ccyj-dev2.fa.us6.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX" ;
        
        const host = "https://ccyj.fa.us6.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX" ;
        
        //const host = "https://ccyj.fa.us6.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX_1";
                
        const ceBaseURL = host + '/hcmUI/CandidateExperience/';

        var replaced = null;

        var xhr = makeHttpObject();

        xhr.open('GET', ceBaseURL + anchortext, true);

        xhr.setRequestHeader('ora-irc-vanity-domain', 'Y');

        xhr.send();

        xhr.onreadystatechange = function() {

            if(xhr.readyState !== 4) return;

            if(xhr.status >= 200 && xhr.status < 300) {

                replaced = xhr.responseText;

                //REQUIRED: makes the short links work by replacing

                window.location.href = '#' + xhr.responseURL.replace(ceBaseURL, "");

                document.open("text/html", "replace");

                document.write(replaced);

                document.close();

            }

        };

    }

    </script>

 

    <style>

        .app-loading-spinner {

            background: #f2f2f0;

            position: fixed;

            top: 0;

            left: 0;

            right: 0;

            bottom: 0;

            opacity: 1;

            visibility: visible;

            z-index: 100;

            transition: opacity .4s, visibility .4s;

            color: #5e717d;

        }      

        .app-loading-spinner::before {

            display: block;

            content: "";

            background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48cGF0aCBkPSJNOTggNTBoMmMwIDI3LjYxNC0yMi4zODYgNTAtNTAgNTBTMCA3Ny42MTQgMCA1MCAyMi4zODYgMCA1MCAwdjJDMjMuNDkgMiAyIDIzLjQ5IDIgNTBzMjEuNDkgNDggNDggNDggNDgtMjEuNDkgNDgtNDh6IiBmaWxsPSIjMzMzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=);

            position: absolute;

            top: 50%;

            left: 50%;

            width: 100px;

            height: 100px;

            margin: -50px 0 0 -50px;

            animation: app-loading-rotate-spinner .6s linear infinite;

        }

         

        @keyframes app-loading-rotate-spinner {

            0% {

                transform: rotate(0deg);

            }

 

            100% {

                transform: rotate(360deg);

            }

        }

    </style>

    <!-- Favicon support for Chrome and Edge to be served up from Vanity domain.

         Uncomment and provide favicon url in the href property. -->

    <!--

         <link rel="icon" sizes="16x16" type="image/png"

            title="favicon" href="<favicon_url_16x16>">

         <link rel="icon" sizes="144x144" type="image/png"

            title="favicon" href="<favicon_url_144x144>">

         <link rel="icon" sizes="152x152" type="image/png"

            title="favicon" href="<favicon_url_152x152>">

         <link rel="apple-touch-icon" sizes="152x152" type="image/png"

            title="favicon" href="<favicon_url_152x152>">

         -->

</head>

 

<body onload="replacecontent()">

    <div class="app-loading-spinner"></div>

</body>

 

</html>