<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class ModerationController extends Controller {
    public function index() {
        
    
        return view('moderation.home.home');
    }
    
}