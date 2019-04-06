<?php

function template($title, $message){
    $html = 
      '<html>
        <head>
            <title>Notification Mail</title>
            <style>
                html,
                body{
                    width: 100%;
                    height: 100vh;
                    margin: 0;
                    padding: 0;
                }
                .clear{
                    clear: both;
                }
                /* header styles */
                header{
                    width: 100%;
                    padding: 30px;
                    background-color: steelblue;
                    text-align: center;
                }
                header h2{
                    color: #fff;
                    font-family: cursive;
                    font-weight: bolder;
                }

                /* body styles */
                .body{
                    padding: 70px 5px;
                    text-align: center;
                }
                .body img{
                    width: 150px;
                    border-radius: 100%;
                    background-color: steelblue;
                }
                .body .user-title{
                    font-weight: bolder;
                    font-family: sans-serif;
                }
                .body .message{
                    font-weight: bolder;
                    font-size: 1.5em;
                    color: grey;
                    font-family: serif;
                }
                .body .date-sent{
                    font-weight: bolder;
                    font-family: serif;
                    padding: 20px 10px;
                    color: darkgray;
                }
                .body .date-sent span{
                    color: steelblue;
                }

                /* footer styles */
                footer{
                    padding: 20px 10px;
                    background-color: steelblue;
                    font-weight: bolder;
                    color: #fff;
                    font-size: 12px;
                    font-family: monospace;
                    height: 70px;
                }
                footer div{
                    width: 50%;
                    float: left;
                }
                footer div:nth-child(2){
                    text-align: right;
                }
                footer div:nth-child(2) a{
                    color: #fff;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <header>
                <h2>'.$title.' &#128276;</h2>
            </header>
            <div class="body">
                <img src="http://themba.website/themba-lucas-ngubeni.png"/>
                <h3 class="user-title">Themba Lucas Ngubeni.</h3>
                <br>
                <p class="message">
                    '.$message.'.
                </p>
                <h2 class="date-sent">
                    <span class="">Message Sent : </span>'.date(" j-F-Y g:ia").'
                </h2>
            </div>
            <footer>
                <div>
                   <p>Themba Lucas Ngubeni</p> 
                </div>
                <div>
                    <p><a href="http://themba.website">&#127760; My Website</a></p>
                </div>
            </footer>
        </body>
    </html>';
    
    return $html;
}

?>