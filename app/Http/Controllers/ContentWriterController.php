<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class ContentWriterController extends Controller {
    public function index() {
        
    
        return view('contentwriter.home.home');
    }
    
}