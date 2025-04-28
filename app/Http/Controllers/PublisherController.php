<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller {
    public function index() {
        
    
        return view('publisher.home.home');
    }
    
}