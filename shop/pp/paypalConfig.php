<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    /**
    //Merchant ID
    define("MERCHANT_ID","E9GCL5FX4TU2C");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AZazaq902xcELwoNkYxhzsbbdIX-jShBHYnKT0d43ODzXRvHdwkdjubUXO9yR20kYlVAFabTsZJuhKmM");
    define("SANDBOX_CLIENT_SECRET", "EEsK8Bs1NKdA7VCxwO2tR1uMtUV5hhboEHKMR5HBkEa44rlJyeUlr7T12D5B1cMc2hqZ2daEVTOk6tWx");**/

    //Merchant ID
    define("MERCHANT_ID","UFBPU5NE6QDK6");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "ATbeuTVtgjwLu35gpe06yhr-iQlsaD40D4Ye6kClssLbHN_x2ZAWU5HZOxExRoCLfQhhobFJQWcxH3Vq");
    define("SANDBOX_CLIENT_SECRET", "EOf7wWqd6WQe2nsBlb1kfw2AmRw573AZWngs_ktttI_sj91dPiHVMVDDgN-LDtZBrk784333STuHelY9");


    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>