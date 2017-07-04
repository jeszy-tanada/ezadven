<?php

namespace App\Http\Controllers;

use App\Http\Models\Inquiries;
use App\Http\Models\Product;
use App\Http\Models\ProductType;
use App\Http\Models\Tour;
use App\Http\Models\User;
use App\Http\Models\Customer;
use App\Http\Models\Order;
use App\Http\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests;

use Hash;
use Auth;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Session;
use App\Helpers\Helpers;

class PublicController extends Controller
{
    public function __construct(){
//        $this->middleware('guest');
//        $this->middleware('auth');

    }

    public function authenticate(Request $request)
    {
//        if (Hash::check('klabklab', '$2y$10$H3ytBSpmFr5CuN7PauMcZeTjMzMri6gcYBzI89bro1vsTfQtepZcq')) {
//            // The passwords match...
//            return 'shuit';
//        }
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return redirect()->to('cp/home');
        }
        return 'Invalid Login Details';
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
    public function index(){
//        if(Auth::user()){
//            return redirect()->to('home');
//        }
        $tours = Tour::where('is_featured' ,'=' , true)->get();
        $data = [
            'tours' => $tours,
        ];
        return view('base/index', $data);
    }

    public function cp(){
        return view('base/cp');
    }

    public function home(){
        $data = [
            'menu'=>'home',
        ];
        return view('base/home', $data);
    }

    public function contact(){
        $data = [
            'menu'=>'contact',
        ];
        return view('base/contact', $data);
    }

    public function about_us(){
        $data = [
            'menu'=>'about_us',
        ];
        return view('base/about_us', $data);
    }

    public function tours(){
        $featured = Tour::where('is_featured' ,'=' , true)->paginate(15);;
        $tours = Tour::all();
        $data = [
            'menu'=>'tour',
            'tours'=>$tours,
            'featured' => $featured
        ];
        return view('base/tours', $data);
    }

    public function tour_view(Request $request, $id){
        $featured = Tour::where('is_featured' ,'=' , true)->get();
        $tour = Tour::find($id);
        $data = [
            'tour' => $tour,
            'featured' => $featured
        ];

        return view('base/tour_view', $data);

    }

    public function inquire(Request $request){

        $inquiry = new Inquiries();
        if ($inquiry->validate($request->all())) {
                $inquiry = $inquiry->create($request->all());
                Session::flash('success', 'Inquiry successfully submitted!');
                return redirect()->back();
        }
        return redirect()->back()->
        withErrors($inquiry->errors())->withInput();

    }
}
