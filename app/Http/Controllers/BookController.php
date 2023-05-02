<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function all() {
        $books = Book::all();
        return $books;
    }

    public function changeAvailabilty($id){
        $book = Book::find($id);
        $book->availability = !$book->availability;
        $book->save();

        return response('ok');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();

        return response('ok');
    }

    public function add(Request $request){
        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->availability = 1;
        $book->save();

        return response('ok');
    }
}
