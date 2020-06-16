<?php

require "API/Config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MAX(ID) FROM Transactions";

$result = $conn->query($sql);


$Max_ID = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Imovi | Buy Token</title>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
        <link rel="stylesheet" href="Styles/Fonts.css">
        <link rel="stylesheet" href="Styles/AdaptiveStyles.css">
        <link rel="stylesheet" href="Styles/BuyToken.css">
        <link rel="stylesheet" href="Styles/GlobalStyles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="shortcut icon" href="Images/Icon.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/d90820cc16.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="top_bar">
                <div class="top_bar_left_block">
                    <a class="top_bar_item" href="#">BUY TOKEN</a>
                    <p class="top_bar_item">|</p>
                    <a class="top_bar_item" href="#">GET A FREE WALLET</a>
                </div>
            </div>
            <div class="middle_bar">
                <img class="Logo" src="Images/Logo.png" alt="">
                <nav>
                    <a class="nav_item" href="Index.html">Home</a>
                    <a class="nav_item" href="#">Contract</a>
                    <a class="nav_item" href="#">Technology</a> 
                    <a class="nav_item" href="Contact_Us.html">Contact us</a>
                </nav>
            </div>
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>{"symbols": [{"description": "Bitcoin","proName": "BITBAY:BTCUSD"},{"description": "Ethereum","proName": "KRAKEN:ETHUSD"},{"description": "BitcoinCash","proName": "KRAKEN:BCHUSD"},{"description": "Ripple","proName": "BITFINEX:XRPUSD"},{"description": "Litecoin","proName": "BITFINEX:LTCUSD"},{"description": "EOS","proName": "BITFINEX:EOSUSD"},{"description": "Cardano","proName": "BITTREX:ADAUSD"}],"colorTheme": "dark","isTransparent": false,"displayMode": "adaptive","locale": "en"}</script>
            </div>
            <!-- TradingView Widget END -->
        </header>

        <div class="Page_title">
            <h2 class="Page_title_h2">Buy Token</h2>
            <p class="Page_title_p"><a href="Index.html" class="Page_title_a">Home</a> > Buy Token</p>
        </div>

        <div class="Content_1">
            <h1 class="C1_Title">Buy Token</h1>
            <p class="C1_subTitle">In this form you can buy Imovi tokens whose price is equal to 1 hryvnia per piece.</p>
            <form class="C1_form" method="POST" id="payment" action="https://sci.interkassa.com/" enctype="UTF-8">
                <input class="C1_input" type="text" maxlength="42" name="ik_x_Address" placeholder="Your Ethereum Address: 0x6ace58eCa55522...">
                <br>
                <input class="C1_input" type="text" name="ik_am" placeholder="Number of tokens IMOV: 1000">
                <br>
                <input type="hidden" name="ik_co_id" value="5ee3ef941ae1bd24008b456b">
                <input type="hidden" name="ik_pm_no" value="<?php echo($Max_ID["ID"]); ?>">
                <input type="hidden" name="ik_cur" value="980">
                <input type="hidden" name="ik_desc" value="">
                    <button class="C1_button" type="submit">Buy</button>
            </form>
        </div>

        <footer>
            <div class="Footer_nav">
                <a class="Footer_nav_item" href="Index.html">Home</a>
                <a class="Footer_nav_item" href="#">Contract</a>
                <a class="Footer_nav_item" href="#">Technology</a> 
                <a class="Footer_nav_item" href="Contact_Us.html">Contact us</a>
            </div>
            <hr class="Footer_line">

            <div class="Footer_block">
                <div class="Footer_mini_block">
                    <h1 class="Footer_mini_block_h1_1">About Imovi</h1>
                    <p class="Footer_mini_block_p_1">Mea ad quem platonem persequeris, mazim democritum at vis. Eu e</p>
                    <img src="Images/World-Map-PNG-Photos.png" alt="World-map">
                </div>
                <div class="Footer_mini_block_2">
                    <h1 class="Footer_mini_block2_h1_1">Contacts</h1>
                    <p class="Footer_mini_block2_p_1"><i class="zmdi zmdi-pin"></i> Ukraine, Lviv</p>
                    <p class="Footer_mini_block2_p_1"><i class="zmdi zmdi-email"></i> Email: ImoviToken@gmail.com</p>
                    <p class="Footer_mini_block2_p_1"><i class="zmdi zmdi-phone"></i> Call: +380 97 281 2383</p>
                    <div>
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-twitter-square"></i>
                        <i class="fab fa-instagram-square"></i>
                        <i class="fab fa-youtube-square"></i>
                    </div>
                </div>
                <div class="Footer_mini_block_3">
                    <h1 class="Footer_mini_block2_h1_1">Leave us a message</h1>
                    <p class="Footer_mini_block3_p_1">You can leave us a message with an offer and we will contact you via email</p>
                    <form method="POST" action="Leave_message.php">
                        <input class="Footer_mini_block3_input" name="email" maxlength="50" type="email" placeholder="Your email here">
                        <br>
                        <input class="Footer_mini_block3_input" name="message" maxlength="500" type="text" placeholder="Your message here">
                        <br>
                        <button class="Footer_mini_block3_button" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </footer>
        <dir class="Footer_copyright_bar">
            <p class="Copyright"><i class="far fa-copyright"></i> 2020 ImoviToken. All Rights Reserved </p>
        </dir>
    </body>
</html>