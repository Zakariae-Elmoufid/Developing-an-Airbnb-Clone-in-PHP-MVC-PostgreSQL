<?php 

namespace App\controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\core\Controller;

class PaymentsController extends Controller {
    private $stripeSecretKey = 'sk_test_51Qs3ZsQVjEmWX5ct39SAQn6tgTjoapP2TwY6MN2QSV3yU0kCT5RPk7QRu6wgVXTg1rEREMu1vtcLlNS8V3oRE17800Udq1szZg';

    public function __construct() {
        Stripe::setApiKey($this->stripeSecretKey);
    }



    public function payments($dateStart, $dateEnd, $total) {
    
        $checkout_session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Reservation from ' . $dateStart . ' to ' . $dateEnd,
                    ],
                    'unit_amount' => $total * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => "http://localhost:8080/success",
            'cancel_url' => "http://localhost:8080/cancel",
        ]);
        http_response_code(303);
        header("location: ". $checkout_session->url);
      
 
    }

    public function successPage(){
        $this->views('Traveler/success');
    }
}
