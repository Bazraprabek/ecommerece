<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Products;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        return view('Admin.admin');
    }

    // Account
    public function account()
    {
        $user = User::all();
        $data = compact('user');
        return view('Admin.account')->with($data);
    }
    public function accountTrash()
    {
        $user = User::onlyTrashed()->get();
        $data = compact('user');
        return view('Admin.account-trash')->with($data);
    }
    public function add()
    {
        return view('Admin.add-admin');
    }
    public function addAdmin(Request $res)
    {
        $res->validate([
            'fullname' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $admin = new User;
        $admin->fullname = $res->fullname;
        $admin->email = $res->email;
        $admin->password = Hash::make($res->password);
        $admin->role = "admin";
        $result = $admin->save();
        if ($result) {
            return redirect('/admin-account')->with('success', "Signup Successful");
        } else {
            return redirect('/admin-account')->with('fail', "Signup Fail");
        }
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect('admin-account');
    }
    public function forcedeleteUser($id)
    {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->forceDelete();
        }
        return redirect('admin-account');
    }
    public function restoreUser($id)
    {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->restore();
        }
        return redirect('admin-account');
    }

    // Products
    public function products()
    {
        $products = Products::all();
        $data = compact('products');
        return view('Admin.products')->with($data);
    }
    public function productsTrash()
    {
        $products = Products::onlyTrashed()->get();
        $data = compact('products');
        return view('Admin.products-trash')->with($data);
    }
    public function forcedeleteProduct($id)
    {
        $product = Products::withTrashed()->find($id);
        if (!is_null($product)) {
            $product->forceDelete();
        }
        return redirect('admin-products');
    }
    public function restoreProduct($id)
    {
        $product = Products::withTrashed()->find($id);
        if (!is_null($product)) {
            $product->restore();
        }
        return redirect('admin-products');
    }
    public function upload(Request $res)
    {
        return view('Admin.upload-admin');
    }
    public function uploadProduct(Request $res)
    {
        $res->validate([
            'title' => 'required|unique:products|min:3',
            'genre' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'rating' => 'required',
        ]);

        $product = new Products;
        $product->title = $res->title;
        $product->genre = $res->genre;
        $product->desc = $res->desc;
        $product->price = $res->price;
        $product->rating = $res->rating;

        // File Upload
        $filename = time() . "." . $res->file('image')->getClientOriginalExtension();
        $res->file('image')->storeAs('public/uploads', $filename);
        $product->image = $filename;

        $result = $product->save();
        if ($result) {
            return redirect('/admin-products')->with('success', "Upload Successful");
        } else {
            return redirect('/admin-upload')->with('fail', "Upload Fail");
        }
        return view('Admin.upload-admin');
    }
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        if (!is_null($product)) {
            $product->delete();
        }
        return redirect('admin-products');
    }

    public function shop()
    {
        return view('Admin.admin-shop');
    }

    public function contact()
    {
        $contact = Contact::all();
        $data = compact('contact');
        return view('Admin.admin-contact')->with($data);
    }
    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if (!is_null($contact)) {
            $contact->delete();
        }
        return redirect('admin-contact');
    }

    public function setting()
    {
        $setting = Setting::all();
        $data = compact('setting');
        return view('Admin.admin-setting')->with($data);
    }
    public function settingUpdate($id, Request $res)
    {
        $setting = Setting::find($id);
        $setting->company_name = $res->company_name;
        $current_img = $setting->background;
        if (is_null($res->background)) {
            $setting->background = $current_img;
        } else {
            $setting->background = "background" . "." . $res->file('background')->getClientOriginalExtension();
        }
        $setting->save();
        return redirect('admin-setting');
    }
}
