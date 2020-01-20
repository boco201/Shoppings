<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\OrderContract;
use App\Services\PayPalService;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckoutController extends Controller
{

      protected $payPal;

    protected $orderRepository;

   public function __construct(OrderContract $orderRepository, PayPalService $payPal)
{
    $this->payPal = $payPal;
    $this->orderRepository = $orderRepository;
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
  
    }


    public function getCheckout()
    {
        return view('site.products.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCheckout(Request $request)
    {
 
        $order = $this->orderRepository->storeOrderDetails($request->all());
        
        
          if ($order) {
            $this->payPal->processPayment($order); 
      
       }

        if ($order) {
        $this->payPal->processPayment($order);
    }

    return redirect()->back()->with('message','Order not placed');

    }

     public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.products.success', compact('order'));
    }


      public function stripeCheckout()
    {
        return view('site.products.stripe');
    }

    public function placeOrderStripe(Request $request) 
    {

        // Before storing the order we should implement the
        // request validation which I leave it to you

        $order = $this->orderRepository->storeOrderDetails($request->all());

    /* try {
          $charge = Stripe::charges()->create([
             'amount' => Cart::getSubTotal() * 100,
             'currency' => 'eur',
             'source' => $request->stripeToken,
             'description' => 'Description goes here',
             'receipt_email' => $request->email,
             'metadata' => [
                'data1' => 'metadata 1',
                'data2' => 'metadata 2',
                'data3' => 'metadata 3',
             ],
          ]);

          Cart::clear();

          return redirect()->route('checkout.cart');

        } catch (\Exception $ex) {
    return $ex->getMessage();

    }

      //dd(request()->all());
             */ try {
         Stripe::setApiKey(env('STRIPE_SECRET'));

          $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ));

    $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => Cart::getSubTotal() * 100,
        'currency' => 'eur'
    ));

    Cart::clear();

    return redirect()->route('site.products.index')->with('message','votre payement est accepté merci pour votre achat, un mail est envoyé');

  } catch (\Exception $ex) {
    return $ex->getMessage();


}

        // You can add more control here to handle if the order is not stored properly
       /* if ($order) {
            $this->payPal->processPayment($order);
        }*/
    
       // return redirect()->back()->with('message','Order not placed';
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
