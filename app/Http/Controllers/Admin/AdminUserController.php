<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Book;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function users(){
    	$users = User::paginate(20);

    	return view('admin.users.index', compact('users'));
    }


    public function comment(){
        $comments = Comment::paginate(20);
        return view('admin.users.comment', compact('comments'));
    }

    public function deleteComment(Request $request){
        
        $comments = Comment::findOrFail($request->checkBoxArray);
        foreach($comments as $comment){

            $book = Book::findOrFail($comment->book_id);
            
            $book->decrement('reviews', 1);
            $book->decrement('count_rating', $comment->rating);

            $book['avg_rating'] = floor($book->count_rating / $book->reviews);
            $book->save();

            $comment->delete();
        }
        return redirect()->back();

        return $request->all();
    }

    public function delete (Request $request){
        $users = User::findOrFail($request->checkBoxArray);
        foreach ($users as $user) {
            if(is_file(public_path() . $user->avatar)){
                unlink(public_path() . $user->avatar);
            }
            $user->delete();
        }
        return redirect()->back();
    }
}
