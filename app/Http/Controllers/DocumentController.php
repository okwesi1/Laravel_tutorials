<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::query()->get();
        return view('document.index', compact('documents'));
    }

    public function create()
    {
        return view('document.create');
    }
}
