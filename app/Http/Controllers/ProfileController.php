<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = User::findBySlugOrFail($slug);

        return view('profile', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user = User::
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $user = User::findBySlugOrFail($slug);
        if($user->id != Auth::id()){
            return view('errors.404');
        }
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

        return view('profile-edit', compact('user', 'divisions', 'districts'));
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
        $input = $request->all();
        $user = User::findOrFail($id);

        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName();
            $file->move('customers', $name);
            
            if(is_file(public_path() . $user->avatar)){
                unlink(public_path() . $user->avatar);
            }
          
            $input['avatar'] = $name;
        }

        $input['password'] = bcrypt($request->get('password'));

        $user['zip_code'] = $request->get('zip_code');
        $user->update($input);

        Session::flash('user_updated', 'Updated Successfully.');

        return redirect()->route('profile', [$user->slug]);

    }


}
