<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class payments extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helpers('string');
    }

    public function index() {
        $config['business'] = 'diwaskandel19-facilitator@gmail.com';
        $config['cpp_header_image'] = ''; //Image header url [750 pixels wide by 90 pixels high]
        $config['return'] = 'http://localhost/ci/payments/notify_payment';
        $config['cancel_return'] = 'http://localhost/ci/payments/cancel_payment';
        $config['notify_url'] = 'process_payment.php'; //IPN Post
        $config['production'] = FALSE; //Its false by default and will use sandbox
        //$config['discount_rate_cart'] = 20; //This means 20% discount
        $config["invoice"] = random_string('numeric',8); //The invoice id

        $this->load->library('paypal', $config);

        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

        $this->paypal->add('T-shirt', 2.99, 6); //First item
        $this->paypal->add('Pants', 40);    //Second item
        $this->paypal->add('Blowse', 10, 10, 'B-199-26'); //Third item with code

        $this->paypal->pay(); //Proccess the payment
//        The notify url is where paypal will POST the information of the payment so you
//        can save that POST directly into your DB and analize as you want.
//
//        With $config["invoice"] is how you identify a bill and you can compare, save or update
//        that value later on your DB.
//
//        For test porpuses i do recommend to save the entire POST into your DB and analize if
//        its working according to your needs before putting it in production mode. EX.

       // $received_post = print_r($this->input->post(), TRUE);
        //Save that variable and analize.
//        Note: html reference page http://bit.ly/j4wRR
    }
    public function notify_payment(){
        $recieved_data= print_r($this->input->post(),TRUE);
       
        echo "<pre>".$recieved_data."</pre>";
    }
    public function cancel_payment(){
        
    }

}
