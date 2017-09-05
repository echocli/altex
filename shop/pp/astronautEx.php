<?php
    /*
        * Home Page - has Sample Buyer credentials, Camera (Product) Details and Instructiosn for using the code sample
    */
    include('apiCallsData.php');
    include('header.php');
    include('paypalConfig.php');

    //setting the environment for Checkout script
    if(SANDBOX_FLAG) {
        $environment = SANDBOX_ENV;
    } else {
        $environment = LIVE_ENV;
    }
?>
    <style>
        tr{
            line-height:30px;
        }
        td{
            padding:5px;
        }
    </style>
    <div class="row">
        <div class="col-md-3">
            <div>
                <img src="img/camera.jpg" width="200" height="150"/>
            </div>
            <h3>AstronautEx</h3>
            <br/><br/>

        </div>

        <div class="col-md-4">
            <h3> Pricing Details </h3>
            <form action="startPayment.php" method="POST">
                 <input type="text" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
                 <table>
                    <!-- Item Details - Actual values set in apiCallsData.php -->
                     <tr><td>Product </td><td><input class="form-control" type="text" name="camera_amount" value="20" readonly></input></td></tr>
                     <tr><td>Tax </td><td><input class="form-control" type="text" name="tax" value="1" readonly></input> </td></tr>
                     <tr><td>Total Amount </td><td><input class="form-control" type="text" name="total_amount" value="21" readonly></input> </td></tr>
                     <tr><td>Currency</td><td>
                        <select class="form-control" name="currencyCodeType">
                        						<option value="AUD">AUD</option>
                        						<option value="BRL">BRL</option>
                        						<option value="CAD">CAD</option>
                        						<option value="CZK">CZK</option>
                        						<option value="DKK">DKK</option>
                        						<option value="EUR">EUR</option>
                        						<option value="HKD">HKD</option>
                        						<option value="MYR">MYR</option>
                        						<option value="MXN">MXN</option>
                        						<option value="NOK">NOK</option>
                        						<option value="NZD">NZD</option>
                        						<option value="PHP">PHP</option>
                        						<option value="PLN">PLN</option>
                        						<option value="GBP">GBP</option>
                        						<option value="RUB">RUB</option>
                        						<option value="SGD">SGD</option>
                        						<option value="SEK">SEK</option>
                        						<option value="CHF">CHF</option>
                        						<option value="THB">THB</option>
                        						<option value="USD" selected>USD</option>
                     </td></tr>

                 </table>

                <br/>
                <!--Container for Checkout with PayPal button-->
                <div id="myContainer"></div>
                <br/>
                <span style="margin-left:60px">OR</span>
                <br/><br/>
                <div>
                    <button class="btn btn-primary" formaction="shipping.php" role="button">Proceed to Checkout</button>
                </div>
            </form>
        </div>
        

    <!-- PayPal In-Context Checkout script -->
    <script type="text/javascript">
     window.paypalCheckoutReady = function () {
         paypal.checkout.setup('<?php echo(MERCHANT_ID); ?>', {
             container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
             environment: '<?php echo($environment); ?>' //or 'production' depending on your environment
         });
     };
     </script>
     <script src="//www.paypalobjects.com/api/checkout.js" async></script>
<?php
     include('footer.php');
?>