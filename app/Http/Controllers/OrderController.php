<?php

namespace App\Http\Controllers;

use PDF;
use App\Book;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count() == 0){
            return redirect('404');
        }

        $user = Auth::user();
        /*sample*/
        $divisions = [
            'Dhaka' => 'Dhaka', 
            'Chattogram' => 'Chattogram',
            'Rajshahi' => 'Rajshahi',
            'Khulna' => 'Khulna',
            'Sylhet'=>'Sylhet',
            'Mymensingh'=>'Mymensingh',
            'Barishal'=> 'Barishal', 
            'Rangpur'=>'Rangpur'
        ];

        $districts = [
            'Dhaka' => 'Dhaka',
            'Gazipur' => 'Gazipur',
            'Rajbari' => 'Rajbari',
            'Faridpur' => 'Faridpur',
            'ManikGanj' => 'ManikGanj',
            'Madaripur' => 'Madaripur',
            'GopalGanj' => 'GopalGanj'
        ];

        return view('checkout', compact('user', 'divisions', 'districts'));
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
    public function store(Request $request)
    {
        $this->validateData($request);

        $user = Auth::user();
        $input = $request->all();

        $address = $input['district'] .', '. $input['division'] . ', ' . $input['zip_code'];

        unset($input['district']);
        unset($input['division']);
        unset($input['zip_code']);

        $input['user_id'] = $user['id'];
        $input['books'] = Cart::count();
        $input['bill'] = Cart::total();

        $input['address'] = $input['address'] . ', ' . $address;

        $order = Order::create($input);

        foreach(Cart::content() as $book){

            Book::where('id', $book->id)->increment('sales', $book->qty);

            OrderItem::create(['order_id' => $order->id, 'book_id' => $book->id, 'quantity' => $book->qty, 'subtotal' => ($book->qty * $book->price)]);
        }

        Cart::destroy();

        Session::flash('success_order', 'Order Successfull');

        return redirect()->route('order-details', [$order->slug])->with(compact('order'));
    }
    /**
    *
    *
    **/
    public function myorder(){
        $user = Auth::user();

        return view('order', compact('user'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_details($id){
        $user = Auth::id(); 
        $order = Order::where(['slug' => $id,'user_id' => $user])->first();
        if($order){
            return view('order-details', compact('order'));
        }
        return view('errors.404');
    }


    /**
    *
    *
    **/
    public function pdfGenerator($slug){
        $order = Order::findBySlugOrFail($slug);
        
        $pdf = PDF::loadView('invoice', compact('order'));
        //return $pdf->download('invoice.pdf');
        return $pdf->stream($order->slug.'.pdf');
    }

    protected function validateData(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string|unique:orders',
            'payment_method' => 'required',
        ]);
    }

}
