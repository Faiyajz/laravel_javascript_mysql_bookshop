<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$orders = Order::where('is_paid', 0)->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function approve($id){
    	$order = Order::findOrFail($id);
    	$order->update(['is_paid' => 1]);
    	return redirect()->back();
    }

    public function details($slug){
        $order = Order::findBySlugOrFail($slug);
        return view('admin.orders.details', compact('order'));
    }

    public function delete($slug){
    	$order = Order::findBySlugOrFail($slug);
    	$order->delete();
    	return redirect()->back();
    }


}
