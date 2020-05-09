<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\CommentReply;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function postComent(Request $request){
    	
    	$input = $request->all();
    	
    	$input['user_id'] = Auth::user()->id;

    	Comment::create($input);

    	//Book::where('id', $input['book_id'])->increment('reviews', 1, ['updated_at' => Carbon::now()]);
        
        $book = Book::findOrFail($input['book_id']);
        
        $book->increment('reviews', 1);
        $book->increment('count_rating', $input['rating']);

        $book['avg_rating'] = floor($book->count_rating / $book->reviews);
        $book->save();
        
        Session::flash('new_comment', 'New comment.');

    	return redirect()->back();
    }

    public function postReply(Request $request){
    	$input = $request->all();
    	$input['user_id'] = Auth::user()->id;

    	CommentReply::create($input);

        Session::flash('new_reply', 'New reply.');

    	return redirect()->back();
    }
}
