<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {

        $book = Book::
        join('authors','authors.id','books.author_id')
        ->select('books.publish_date','books.tittle','authors.id','authors.name')
        ->get();
        echo json_encode($book);

    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->publish_date = $request->input('date');
        $book->tittle = $request->input('tittle');
        $book->author_id = $request->input('author',1);
        $book->save();
        return response()->json([
            'message' => 'El libro se ha guardado correctamente!'], 201);
    }

}
