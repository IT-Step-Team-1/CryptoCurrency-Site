
var IMOV_TOKENS = 1000000000;
var formatter = new Intl.NumberFormat("ua", {maximumSignificantDigits: 10});


function SetETH() {
    let settings = {
        "url": "https://api.coincap.io/v2/assets/ethereum",
        "method": "GET",
        "timeout": 0,
    };

    let Eth_obj         = document.getElementById("ETH");
    let ETH_Price_obj   = document.getElementById("ETH_Price");
      
    $.ajax(settings).done(function (response) {
        let price = Math.round(response.data.priceUsd);
        
        Eth_obj.innerText       = "$" + price;
        ETH_Price_obj.innerText = formatter.format(Math.round(IMOV_TOKENS / price));
    });
}

function SetBTC() {
    let settings = {
        "url": "https://api.coincap.io/v2/assets/bitcoin",
        "method": "GET",
        "timeout": 0,
    };

    let BTC_Price_obj   = document.getElementById("BTC_Price");
      
    $.ajax(settings).done(function (response) {
        let price = Math.round(response.data.priceUsd);
        
        BTC_Price_obj.innerText = formatter.format(Math.round(IMOV_TOKENS / price));
    });
}

function init() {
    SetETH();
    SetBTC();
}

init();