<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Writer;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(20);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $writers = Writer::pluck('name', 'id')->all();
        $categories = Category::pluck('title', 'id')->all();

        return view('admin.books.create', compact('writers', 'categories'));
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

        if($file = $request->file('cover_page')){
            $coverpage = time() . $file->getClientOriginalName();
            $file->move('coverpages', $coverpage);
            $input['cover_page'] = $coverpage;
        }

        if($file = $request->file('preview_page')){
            $previewpage = time() . $file->getClientOriginalName();
            $file->move('previewpages', $previewpage);
            $input['preview_page'] = $previewpage;
        }

        Book::create($input);
        Session::flash('book_added', 'Writer Added Successfully.');

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
        $book = Book::findOrFail($id);
        $writers = Writer::pluck('name', 'id')->all();
        $categories = Category::pluck('title', 'id')->all();

        return view('admin.books.edit', compact('book', 'writers', 'categories'));
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
        $book = Book::findOrFail($id);

        if($file = $request->file('cover_page')){
            $coverpage = time() . $file->getClientOriginalName();
            $file->move('coverpages', $coverpage);

            unlink(public_path() . $book->cover_page);

            $input['cover_page'] = $coverpage;
        }

        if($file = $request->file('preview_page')){
            $previewpage = time() . $file->getClientOriginalName();
            $file->move('previewpages', $previewpage);

            unlink(public_path() . $book->preview_page);

            $input['preview_page'] = $previewpage;
        }

        $book->update($input);

        Session::flash('book_updated', 'Updated Successfully.');

        return redirect('admin/book');

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
            'description' => 'required'
        ],
        [
          'description.required'  => 'Please provide Book\'s description',

        ]);
    }

}
