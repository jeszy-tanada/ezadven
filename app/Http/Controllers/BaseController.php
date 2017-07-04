<?php

namespace App\Http\Controllers;

use App\Http\Models\Area;
use App\Http\Models\Country;
use App\Http\Models\Inquiries;
use App\Http\Models\Product;
use App\Http\Models\ProductType;
use App\Http\Models\TarpProcess;
use App\Http\Models\TarpSpoils;
use App\Http\Models\TarpUsage;
use App\Http\Models\User;
use App\Http\Models\Customer;
use App\Http\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use Hash;
use Auth;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Session;
use App\Helpers\Helpers;

class BaseController extends Controller
{
    public function __construct(){
//        $this->middleware('guest');
        $this->middleware('auth');

    }

    public function settings(Request $request){
        if ($request->isMethod('post'))
        {
            $user = Auth::user();
            $user->rules['username'] =  'unique:user,username,'.$user->id.',id';
            $user->rules['user_type'] = '';
            $user->rules['password'] = '';
            $input = $request->except('password','discount_pin');
            if($request->get('discount_pin')!=""){
                $input = $request->except('password');
            }
            if($request->has('password')){
                $user->rules['password'] = 'min:4|confirmed';
                $input = $request->all();
            }

            if($user->validate($request->all())){
                if (Hash::check($request->get('old_password'), $user->password))
                {
                    if($request->get('password')!=""){$input['password'] = Hash::make($request->get('password'));}
                    $user->update($input);
                    Session::flash('success', 'Information updated!');
                } else {
                    Session::flash('error', 'Password Incorrect!');
                }
                return redirect()->back();
            } else {
                return redirect()->back()->
                withErrors($user->errors())->withInput();
            }

        }

        if ($request->isMethod('get')) {
            $data = [
                'menu' => 'users',
            ];
            return view('users/settings', $data);

        }
    }
    public function home(){
        $data = [
            'menu'=>'home',
        ];
        return view('cp/home', $data);
    }

    public function countries(){
        $countries = Country::all();
        $data = [
            'menu'=>'country',
            'countries'=>$countries
        ];
        return view('cp/countries', $data);
    }

    public function add_country(Request $request){
        if ($request->isMethod('post'))
        {
            $country = new Country();
            if ($country->validate($request->all())) {
                $country->create($request->all());
                Session::flash('success', 'Country successfully saved!');
                return redirect()->route('countries');
            }
            return redirect()->back()->
            withErrors($country->errors())->withInput();

        }
        if ($request->isMethod('get'))
        {
            $data = [
                'menu'=>'manage',
            ];
            return view('cp/add_country', $data);
        }

    }

    public function areas(){
        $areas = Area::all();
        $data = [
            'menu'=>'area',
            'countries'=>$areas
        ];
        return view('cp/areas', $data);
    }

    public function add_area(Request $request){
        if ($request->isMethod('post'))
        {
            $area = new Area();
            $name = null;
            if ($area->validate($request->all())) {
                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('area');
                    $image->move($destinationPath, $input['imagename']);
                    $name = $input['imagename'];
                }

                $area = $area->create($request->all());
                $area->image = $name;
                $area->save();
                Session::flash('success', 'Area successfully saved!');
                return redirect()->route('areas');
            }
            return redirect()->back()->
            withErrors($area->errors())->withInput();

        }
        if ($request->isMethod('get'))
        {
            $data = [
                'countries' => Country::all(),
                'menu'=>'manage',
            ];
            return view('cp/add_area', $data);
        }

    }

    public function tours(){
        $tours = Tour::all();
        $data = [
            'menu'=>'tour',
            'tours'=>$tours
        ];
        return view('cp/tours', $data);
    }

    public function add_tour(Request $request){
        if ($request->isMethod('post'))
        {
            $tour = new Tour();
            $name = null;
            if ($tour->validate($request->all())) {
                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('tours');
                    $image->move($destinationPath, $input['imagename']);
                    $name = $input['imagename'];
                }

                $tour = $tour->create($request->all());
                $tour->image = $name;
                $tour->save();
                Session::flash('success', 'Tour successfully saved!');
                return redirect()->route('tours');
            }
            return redirect()->back()->
            withErrors($tour->errors())->withInput();

        }
        if ($request->isMethod('get'))
        {
            $data = [
                'areas' => Area::all(),
                'menu'=>'tour',
            ];
            return view('cp/add_tour', $data);
        }

    }

    public function edit_tour($id, Request $request){
        $tour = Tour::findOrFail($id);
        if ($request->isMethod('post'))
        {
            $name = $tour->image;
            if ($tour->validate($request->all())) {
                if ($request->hasFile('image')) {
                    if($tour->image) {
                        unlink(public_path('tours/' . $tour->image));
                    }
                    $image = $request->file('image');
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('tours');
                    $image->move($destinationPath, $input['imagename']);
                    $name = $input['imagename'];
                }
                $request_data = $request->all();
                $request_data['image'] = $name;
                if(!isset($request_data['is_featured'])){
                    $request_data['is_featured'] = false;
                }
                $tour->fill($request_data)->save();

                Session::flash('success', 'Tour successfully updated!');
                return redirect()->route('tours');
            }
            return redirect()->back()->
            withErrors($tour->errors())->withInput();

        }
        if ($request->isMethod('get'))
        {
            $data = [
                'tour' => $tour,
                'areas' => Area::all(),
                'menu'=>'tour',
            ];
            return view('cp/edit_tour', $data);
        }

    }

    public function tour_view(Request $request, $id){

        $tour = Tour::find($id);
        $data = [
            'tour' => $tour,
            'menu'=>'tour',

        ];

//        return view('order/ajax/item_list', $data);
        return view('cp/tour_view', $data);
//        return view('order/ajax/item_list-table', $data);
    }

    public function inquiries(){
        $inquiries = Inquiries::orderBy('is_ok', 'is_done')->get();
        $data = [
            'menu'=>'inquiries',
            'inquiries'=>$inquiries
        ];
        return view('cp/inquiries', $data);
    }

    public function user_list(){
        $users = User::all();
        $data = [
            'users'=>$users,
            'menu'=>'users',
        ];
        return view('users/user_list', $data);
    }

    public function user_add(Request $request){
        if ($request->isMethod('post'))
        {
            $user = new User();
            if ($user->validate($request->all())) {
                $request->merge(array('password' => Hash::make($request->get('password'))));
                $user->create($request->all());
                Session::flash('success', 'User successfully saved!');
                return redirect()->route('user_list');
            }
            return redirect()->back()->
            withErrors($user->errors())->withInput();

        }
        if ($request->isMethod('get'))
        {
            $data = [
                'menu'=>'users',
            ];
            return view('users/user_add', $data);
        }

    }

    public function product_list(){
        $products = Product::with('product_types')->get();
        $data = [
            'products' => $products,
            'menu' => 'items',
        ];
        return view('product/product_list', $data);
    }

    public function product_add(Request $request){
        if ($request->isMethod('post'))
        {
            $product = new Product();
            if ($product->validate($request->all())) {
                $product->create($request->all());
                Session::flash('success', 'Product successfully saved!');
                return redirect()->route('product_list');
            }
            return redirect()->back()->
            withErrors($product->errors())->withInput();
        }
        if ($request->isMethod('get'))
        {
            $data = [
                'menu'=>'items',
            ];
            return view('product/product_add', $data);
        }


    }


    public function product_type_add(Request $request){
        if ($request->isMethod('post'))
        {
            $product_type = new ProductType();
            if ($product_type->validate($request->all())) {
                $product_type->create($request->all());
                Session::flash('success', 'Type of Product successfully saved!');
                return redirect()->route('product_list');
            }
            return redirect()->back()->
            withErrors($product_type->errors())->withInput();
        }
        if ($request->isMethod('get'))
        {
            $data = [
                'products' => Product::with('product_types')->get(),
                'menu'=>'items',
            ];
            return view('product/product_type_add', $data);
        }


    }

    public function order(Request $request){
        if ($request->isMethod('post')){
            $id = Helpers::idfier($request->get('customer_id'), True);
            $customer = Customer::find($id);
            if($customer){
                $order = new Order;
                $order->customer_id = $id;
                $order->created_by = Auth::user()->id;
                $order->updated_by = Auth::user()->id;
                $order->user_id = Auth::user()->id;
                $order->save();
                return redirect()->route('customer_order_add', array('id' => Helpers::idfier(($order->id), False)));
            }
        }else{
        $customers = Customer::paginate(10);
        $data = [
            'customers'=>$customers,
            'menu'=>'orders',
        ];
            return view('order/customer_select', $data);
        }
    }

    public function customer_order_add(Request $request, $id = null){
        if ($request->isMethod('post'))
        {
//            return $request->all();
            $order = Order::find(Helpers::idfier($id, True));
            $order_item = new OrderItem;
            if ($order_item->validate($request->all())) {
                $order_item->create($request->all());
                $payment = 0;
                foreach($order->order_items as $item){

                    if($item->product->sizeable){
                        $payment += $item->length * $item->width * $item->price * $item->quantity;
                    } else {
                        $payment += $item->price * $item->quantity;
                    }
                }
                $order->payment = $payment;
                $order->updated_by = Auth::user()->id;
                $order->paid = 0;
                $order->save();
            }
            return ['message'=> "Order items updated"];

        }

        $order = Order::find(Helpers::idfier($id, True));

        if(!$order){
            return redirect()->route('order');
        }
        $products = Product::with('product_types')->get();

        $data = [
            'products' => $products,
            'order' => $order,
            'menu'=> 'orders',
        ];
        if($order->order_status==1){
            return view('order/order_final', $data);
        }
        return view('order/order_add', $data);
    }

    public function order_item_delete(Request $request){

        if ($request->isMethod('post'))
        {
            $order_item = OrderItem::find($request->get('order_item_id'));
            $order = $order_item->order;
            $order->payment = $order->payment - ($order_item->price * $order_item->quantity);
            $order_item->delete();
            $order->save();
            return ['message'=> "Item deleted!"];
        }
        return ['message'=> "Deletion Failed!"];
    }

    public function order_item_list(Request $request, $id){

        $order = Order::find(Helpers::idfier($id, True));
        $data = [
            'order' => $order,
            'menu'=>'orders',

        ];

//        return view('order/ajax/item_list', $data);
        return view('order/ajax/item_list-grid', $data);
//        return view('order/ajax/item_list-table', $data);
    }


    public function tarps_list(){
        $tarps = Tarps::all();
        $data = [
            'cp'=>$tarps,
            'menu'=>'cp',
        ];
        return view('cp/tarps_list', $data);
    }

    public function tarp_add(Request $request){
        if ($request->isMethod('post'))
        {
            $tarp = new Tarps();
            if ($tarp->validate($request->all())) {

                $tarp->create($request->all());
                Session::flash('success', 'Tarp successfully saved!');
                return redirect()->route('tarps_list');
            }
            return redirect()->back()->
            withErrors($tarp->errors())->withInput();

        }

    }

    public function tarp_process(Request $request){
        if ($request->isMethod('post'))
        {
            $tarp_processed = new TarpProcess();

            $tarp = Tarps::find( $request->input('tarp_id'));
            $used_length = $request->input('length', 0);
            $used_width = $request->input('width', 0);
            $length = $tarp->length - $used_length;
            $width = $tarp->width - $used_width;
            $quantity = $request->input('quantity', 1);
            $counter = 1;
            $available = floor($tarp->width / $used_width);

            if($quantity < $available){
                $total_use_width = $tarp->width - ($quantity * $used_width);
                $total_use_length = $length;
            }else{
                while($quantity > $available){
                    $quantity = $quantity - $available;
                    $counter++;

                }

                $total_use_width = $tarp->width - ($quantity * $used_width);
                $total_use_length = $tarp->length - ($used_length * $counter);
            }

            if ($tarp_processed->validate($request->all())) {
                if($length < 0 or $width < 0 or $quantity < 1){
                    return redirect()->back()->
                    withErrors($tarp_processed->errors())->withInput();
                }
                $processed = $tarp_processed->create($request->all());
                $tarp_usage = new TarpUsage();
                $tarp_usage->tarp_process_id = $processed->id;
                $tarp_usage->length = $processed->tarp->length;
                $tarp_usage->width = $processed->tarp->width;
                $tarp_usage->use_length = $used_length;
                $tarp_usage->use_width = $used_width;
                $tarp_usage->name = $request->input('name');
                $tarp_usage->user_id = Auth::user()->id;
                $tarp_usage->quantity = $request->input('quantity', 1);
                $tarp_usage->save();

                if($counter > 1){
                    self::make_spoils($tarp_usage, $used_length * ($counter - 1), fmod($tarp->width,$used_width));
                }
                if($total_use_length){
                    self::make_spoils($tarp_usage, $total_use_length, $tarp_usage->width);
                }
                if($total_use_width and $total_use_length){
                    self::make_spoils($tarp_usage, $used_length, $total_use_width);
                }
                $tarp->count -=1 ;
                $tarp->save();
                Session::flash('success', 'Tarp successfully processed! Check processed list and view usages for more
                    information');
                return redirect()->route('tarps_list');
            }
            return redirect()->back()->
            withErrors($tarp_processed->errors())->withInput();

        }

    }

    public function make_spoils($usage, $length, $width){
        $tarp_spoils = new TarpSpoils();
        $tarp_spoils->tarp_usage_id = $usage->id;
        $tarp_spoils->length = $length;
        $tarp_spoils->width = $width;
        $tarp_spoils->save();
    }


    public function processed_list(){
        $tarps = Tarps::all();
        $processeds = TarpProcess::orderBy('id', 'desc')->paginate(25);

        $data = [
            'processeds'=>$processeds,
            'cp'=>$tarps,
            'menu'=>'processed',
        ];
        return view('cp/processed_list', $data);
    }

    public function processed_view(Request $request, $id = null){
        $processed = TarpProcess::find($id);
        $usage_ids = TarpUsage::where('tarp_process_id' ,'=' ,$id)->lists('id')->toArray();
        $spoils = TarpSpoils::whereIn('tarp_usage_id', $usage_ids)->where('is_used', False)->get();
//        return $spoils;
        $data = [
            'processed'=>$processed,
            'spoils'=>$spoils,
            'menu'=>'processed',
        ];
//        return $processed->processed;
        return view('cp/processed_view', $data);
    }

    public function status_change(Request $request)
    {
        if ($request->isMethod('post')) {
            $status = $request->input('status');

            $tarp_usage = $request->input('tarp_usage_id');
            $tarp_usage = TarpUsage::find($tarp_usage);
            $tarp_usage->status = $status;
            $tarp_usage->save();
            return redirect()->back();
        }
    }


    public function spoil_tarp_add(Request $request){
        if ($request->isMethod('post'))
        {
            $tarp_usage = new TarpUsage();

            $tarp = TarpSpoils::find( $request->input('tarp_spoil_id'));
            $used_length = $request->input('length', 0);
            $used_width = $request->input('width', 0);
            $length = $tarp->length - $used_length;
            $width = $tarp->width - $used_width;
            $quantity = $request->input('quantity', 1);
            $counter = 1;
            $available = floor($tarp->width / $used_width);

            if($quantity < $available){
                $total_use_width = $tarp->width - ($quantity * $used_width);
                $total_use_length = $length;
            }else{
                while($quantity > $available){
                    $quantity = $quantity - $available;
                    $counter++;
                }
                $total_use_width = $tarp->width - ($quantity * $used_width);
                $total_use_length = $tarp->length - ($used_length * $counter);
            }

            if ($tarp_usage->validate($request->all())) {

                if($length < 0 or $width < 0 or $quantity < 1){
                    return redirect()->back()->
                    withErrors($tarp_usage->errors())->withInput();
                }

//                $usage = $tarp_usage->create($request->all());
                $tarp_usage = new TarpUsage();
//                return $tarp->usage;
                $tarp_usage->tarp_process_id = $request->input('tarp_process_id');
                $tarp_usage->length = $tarp->length;
                $tarp_usage->width = $tarp->width;
                $tarp_usage->use_length = $used_length;
                $tarp_usage->use_width = $used_width;
                $tarp_usage->name = $request->input('name');
                $tarp_usage->user_id = Auth::user()->id;
                $tarp_usage->quantity = $request->input('quantity', 1);
                $tarp_usage->save();

                $tarp->is_used = True;
                $tarp->update();

                if($counter > 1){
                    self::make_spoils($tarp_usage, $used_length * ($counter - 1), fmod($tarp->width,$used_width));
                }

                if($total_use_length){
                    self::make_spoils($tarp_usage, $total_use_length, $tarp_usage->width);
                }
                if($total_use_width and $total_use_length){
                    self::make_spoils($tarp_usage, $used_length, $total_use_width);
                }
                Session::flash('success', 'Tarp successfully processed! Check processed list and view usages for more
                    information');
                return redirect()->route('processed_list');
            }
            return redirect()->back()->
            withErrors($tarp_usage->errors())->withInput();

        }

    }
}
