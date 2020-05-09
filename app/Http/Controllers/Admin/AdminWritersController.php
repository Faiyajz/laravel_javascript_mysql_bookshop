<?php

namespace App\Http\Controllers\Admin;

use App\Writer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminWritersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::paginate(20);
        
        return view('admin.writers.index',compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.writers.create');
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


        $input = $request->all();

        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName();
            $file->move('writers', $name);
            $input['avatar'] = $name;
        }
        Writer::create($input);
        Session::flash('writer_added', 'Writer Added Successfully.');

        return redirect()->back();
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
        $writer = Writer::findOrFail($id);
        return view('admin.writers.edit', compact('writer'));
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
        $writer = Writer::findOrFail($id);

        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName();
            $file->move('writers', $name);

            unlink(public_path() . $writer->avatar);

            $input['avatar'] = $name;
        }

        $writer->update($input);

        Session::flash('writer_updated', 'Updated Successfully.');

        return redirect('admin/writer');
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

    protected function validateData(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'about' => 'required',
            'avatar' => 'required'
        ],
        [
          'about.required'  => 'Please provide writer information',
          'avatar.required'  => 'Please provide Profile Picture'
        ]);
    }


}
