<?php

use Illuminate\Database\Seeder;

class ProviderConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provider_config')->insert([
            [
                "name" => "Zalo",
                "app_id" => "3880164948819230085",
                "app_secrect" => "7XDfPcQVl3T3JbKSh63R",
                "app_code" => "4u5ASn8gdmegvbmb17swUZMF73Hf9yDZUeriDJmKXKiFZa860K6782ckSbeaOzKLTieJTr9QfJ4u_d1E36Qs30AkSY8hDBrI4izAE7LdWcvdo3e3EMdqVGkl8HCf7BvsMzyzQ4qHX2O6fJfm4mECO1pu6L8zBjGUN-OGA6HMlYSjmKmE8p_X07EDGcyYDf4J0x0l8Me3an9Hm1K63HkJFmFa7ZSEMSi36gD6B3GwW7Wvv59i6dYJ91QZLpiRNiCrd_PLQDa8j1BSXaKewNYz5_NK3a1rSxau7ky9pGhrdv5iO5wABPc8jJGrNVvnmvJKOd4hvI2zdC9J0q-wPxFxhbacLgUwON4VgZa",
                "app_token" => "1AHSQ3pl37O8hLbcCES1V0EiK6ms-GSpUDSvDZoTD75TlpWm1A8ZK5M83p8ccpTOVwyRNHsmC09-fpb2JuCX3ZMF9bDyfnuoDgv9QG6qJG8tXMDeTAb1UKE7VpeNfdOZUQzqNKwaVWGvxIfDJTCo4s3wPbm2xKu3H-54HoN0G0rKwqb99zzmCcBbUrDMh6esPRKuJWcKAqjztmaDAT41GclZ11qH_Ye2FB4nUstv21a8p21KP84M2mEyJsWxWLS1VfvEN0-D5YvhbmLd6DmmEcLH07jXA3Vn3dW",
                "pages_id" => null,
                "created_at" =>  date('Y-m-d H:i:s'), 
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Facebook",
                "app_id" => "1319329061467034",
                "app_secrect" => "0a03cf21ebbe89bcb13e4938acf6e859",
                "app_code" => null,
                "app_token" => "EAASv7DwM85oBAI1rDGB4kPODCj6nZAiO5MpNvx9St3vNDYdfpjJ3QwvUHTXRQJmtcL34XgY6Dftnj8IUHkD6ZBwdNyk7h4Q8OzPt5RCwTaOnW03BhoFtToupvyxILvRBy4CqG8Y9XDB1uwrkdezW31oAumfUL1xKhl71OaYWMmReb8TvZALTSF9ZBLkpoMptygc20xKe2ycGEwel8ZA1yMerwTZBO3GXsZD",
                "pages_id" => "491152857694713",
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
