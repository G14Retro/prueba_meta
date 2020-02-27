<?php

namespace App\Http\Controllers;

use App\author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
    {
        $author=Author::get();
        echo json_encode($author);
    }

    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->input('name');
        $author->save();
        return response()->json([
            'message' => 'Autor guardado correctamente!'], 201);
    }

}
