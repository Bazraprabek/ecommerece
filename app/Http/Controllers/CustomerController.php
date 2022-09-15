<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Models\Products;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Products::paginate(3);
        $setting = Setting::all();
        $data = compact('products', 'setting');
        return view('User.home')->with($data);
    }
    public function sendContact(Request $res)
    {
        $contact = new Contact;
        $contact->fullname = $res->fullname;
        $contact->email = $res->email;
        $contact->msg = $res->msg;
        $contact->save();
        return redirect('/')->with('success', "Contact Send Successfull");
    }
    public function product($id)
    {
        $product = Products::find($id);
        if ($product) {
            $data = compact('product');
            return view('User.product')->with($data);
        } else {
            echo "Page not Found";
        }
    }
    public function products(Request $res)
    {
        $search = $res->search;
        $results = "";
        if (!is_null($search)) {
            $products = Products::where('title', 'LIKE', "%$search%")->orWhere('genre', 'LIKE', "%$search%")->get();
            $result = $products->count();
            $results = $result . " items found for '" . $search . "'";
            $data = compact('products', 'search', 'results');
            return view('User.products')->with($data);
        } else {
            $products = Products::all();
            // $products = Products::paginate(8);
            $data = compact('products', 'search', 'results');
            return view('User.products')->with($data);
        }
    }
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function profile()
    {
        return view('User.profile');
    }
    public function setting()
    {
        $user = User::find(session()->get('user_id'));
        $email = $user->email;
        $fullname = $user->fullname;
        $data = compact('fullname', 'email');
        return view('User.setting')->with($data);
    }
    public function signupUser(Request $res)
    {
        $res->validate([
            'fullname' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $user = new User;
        $user->fullname = $res->fullname;
        $user->email = $res->email;
        $user->password = Hash::make($res->password);
        $user->role = "user";
        $result = $user->save();
        if ($result) {
            return redirect('/login')->with('success', "Signup Successful");
        } else {
            return redirect('/signup')->with('fail', "Signup Fail");
        }
    }
    public function loginUser(Request $res)
    {
        $res->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', '=', $res->email)->first();
        if ($user) {
            if (Hash::check($res->password, $user->password)) {
                if ($res->role = "admin") {
                    $res->session()->put('user_id', $user->id);
                    return redirect('/admin');
                } else {
                    $res->session()->put('user_id', $user->id);
                    return redirect('/');
                }
            } else {
                return redirect('/login')->with('fail', "Password is incorrect");
            }
        } else {
            return redirect('/login')->with('fail', "This email is not registered");
        }
    }


    public function sortApi()
    {
        $products = DB::select('select * from products');
        $data = json_encode($products);
        return print_r($data);
    }

    public function sort(Request $res)
    {
        echo  $res->search;
        $output = "";
        $products = Products::where('genre', 'Like', "%" . $res->sort . "%")->get();
        // print_r($products);
        foreach ($products as $item) {
            $output .=
                '<a href="products/' . $item->product_id . '" class="card">
                    <img src="' . $item->image . '" alt="' . $item->title . '">
                    <div class="info">
                        <h4>' . $item->title . '</h4>
                        <p class="sec">' . $item->genre . '</p>
                        <p>Rs ' . $item->price . '</p>
                    </div>
                </a>';
        };
        return response($output);
    }

    // Testing
    public function test()
    {
        return view('test');
    }
}
