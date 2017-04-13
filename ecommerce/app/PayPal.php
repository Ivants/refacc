<?php 

namespace App;

class PayPal{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'AYrrYnKnEA3KWKZR9O-UyamrEN2LPqnU97nxXtydFtc28pcpvOlonYzQVSMv8rAjM3r-l2Jj_lV_vmu4';
	private $_ClientSecret = 'EDxMZIwd5ARUlrno1GZB2YMWQXaWXjg8zFDRuGgf9w0EoH9ILzFnZr2yVaLlLXTENP203DO2-N1orB9S';

	public function __construct($shopping_cart){
		
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId,$this->_ClientSecret);
		//Archivo de configutacion de la carpeta config
		$config = config('paypal_payment');

		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);

		$this->shopping_cart = $shopping_cart;
	}


	public function generate(){
	//setIntent es el objetivo de la peticion
	//setPayer quien va a pagar
	//setTransactions son las cosas que queremos pagar
	//setRedirectURl
	$payment = \PaypalPayment::payment()->setIntent('sale')
						->setPayer($this->payer())
						->setTransactions([$this->transaction()])
						->setRedirectUrls($this->redirectURLs());

	try{
		$payment->create($this->_apiContext);
	} catch(\Exception $ex){
		//Helper dd de laravel
		dd($ex);
		exit(1);
	}

	return $payment;

	}


	public function payer(){
		//Regresa la iformacion de pago del usuario
		return \PaypalPayment::payer()
							->setPaymentMethod('paypal');
	}


	public function redirectURLs(){
		// Returns transaction's info
		//	$baseURL = url('/');
		$baseURL = url('/');
		return \PaypalPayment::redirectUrls()
							->setReturnUrl("$baseURL/payments/store")
							->setCancelUrl("$baseURL/carrito");
	}

	public function transaction(){
		// Returns transaction's info
		// setAmount monto a pagar
		return \PaypalPayment::transaction()
				->setAmount($this->amount())
				->setItemList($this->items())
				->setDescription('Tu compra en Vivet')
				->setInvoiceNumber(uniqid());
	}    


	public function amount(){
		//Aquí es donde se debe hacer la conversión de las monedas
		return \PaypalPayment::amount()->setCurrency('USD')
							->setTotal($this->shopping_cart->totalUSD());
	}


	public function items(){
		$items = [];
		$products = $this->shopping_cart->products()->get();
		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}


	
	public function execute($paymentId, $payerId){

		//_apiContext son los permisos
		$payment = \PaypalPayment::getById($paymentId,$this->_apiContext);

		//Id del comprador
		$execution = \PaypalPayment::PaymentExecution()
							->setPayerId($payerId);

		//dd($payment->execute($execution,$this->_apiContext));
		dd($payment->execute($execution,$this->_apiContext));
	}
}

?>