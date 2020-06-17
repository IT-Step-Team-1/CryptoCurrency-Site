<?php

$id         = random_int(1000000000000000, intval(9999999999999999999999));

$address    = $_POST['ik_x_Address'];
$tokens     = $_POST['ik_x_Tokens'];

$json       = json_decode(file_get_contents('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11'), true);

$amount     = round($tokens * $json[0]['sale']);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <form id="form" method="POST" id="payment" action="https://sci.interkassa.com/" enctype="UTF-8">
            <input type="hidden" type="text" name="ik_x_Address" value="<?php echo($address); ?>">
            <input type="hidden" type="text" name="ik_x_Tokens" value="<?php echo($tokens); ?>">
            <input type="hidden" type="text" name="ik_am" value="<?php echo($amount); ?>">
            <input type="hidden" name="ik_co_id" value="5ee3ef941ae1bd24008b456b">
            <input type="hidden" name="ik_pm_no" value="<?php echo($id); ?>">
            <input type="hidden" name="ik_cur" value="980">
            <input type="hidden" name="ik_desc" value="">
        </form>

        <script type="text/javascript">
        function send() {
            form = document.getElementById('form');
            form.submit();
        }
            send();
        </script>
    </body>
</html>