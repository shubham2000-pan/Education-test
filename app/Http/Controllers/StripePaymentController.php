<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Model\Payment;
use Auth;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {   
        return view('admin_view.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $price = Session::get('product_price');
        $courceID = Session::get('product_id');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $res = Stripe\Charge::create ([
                "amount" => $price * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => Auth::user()->name,
        ]);
       if(!empty($res)){
        
            Payment::insert ([
            'cource_fees'=>$res['amount'],
            'cource_id' => $courceID,
            'user_id'  => Auth::user()->id,
            'transation_id'=>$res['balance_transaction'],
            'payment_id'=>$res['id'],
            'receipt'=>$res['receipt_url'],
            'payment_status'=>$res['status'],
            'payment_mode'=>$res['payment_method'],
            'other_detailes'=>$res,
            'status' => 1,
            ]);


       }
        Session::flash('success', 'Payment successful!');
          
        return back();
    }


}