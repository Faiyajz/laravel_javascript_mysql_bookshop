<?php

namespace App\Http\Controllers;

use App\Book;
use App\Writer;
use App\Category;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $newbooks = Book::orderBy('created_at', 'ASC')->get();
    	$topsellingbooks = Book::orderBy('sales', 'DESC')->get();
        
        return view('home', compact('sliders', 'newbooks', 'topsellingbooks'));
    }

    public function showBook($slug) {
        $book = Book::findBySlugOrFail($slug);
        return view('book-details', compact('book'));
    }

    public function showWriter($slug) {
        $writer = Writer::findBySlugOrFail($slug);
        return view('writer', compact('writer'));
    }

    public function showCategory($slug) {
        $category = Category::findBySlugOrFail($slug);
        $books = $category->book()->paginate(2);
        return view('category', compact('books', 'category'));
    }


    public function singleSearch($slug){
        $book = Book::findBySlugOrFail($slug);
        $flag = true;
        return view('search', compact('book', 'flag'));
    }

    public function showSearchResult(Request $request) {
        $flag = false;
        $input =  $request->input('search');
        
        $books = Book::where('name', 'like', "%$input%")->paginate(2);

        return view('search', compact('books', 'flag'));
    }


    public function newReleasesBooks(){
        $newbooks = Book::orderBy('created_at', 'ASC')->offset(0)->limit(50)->paginate(50); 
        return view('new-releases', compact('newbooks'));
    }

    public function bestSellersBooks(){
        $topsellingbooks = Book::orderBy('sales', 'DESC')->offset(0)->limit(10)->paginate(40); 

        return view('best-sellers', compact('topsellingbooks'));
    }
}
