<?php

namespace App\Http\Controllers\Web;

use Session;
use App\Cart;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home(){
        $products = Product::paginate(10);
        $features = Product::all()->random(4);
        $latests = Product::all()->random(4);
        return view('web.home.index',compact('products','features','latests'));
    }

    public function detail($slug){
        $detail = Product::where('slug',$slug)->first();

        $detail->update([
            'view_count'=>$detail->view_count+1
        ]);

        $relate = Product::where('category_id',$detail->category_id)->take(2)->inRandomOrder()->get();

        $comments = Comment::where('product_id',$detail->id)->paginate(4);

        return view('web.detail.index',compact('detail','relate','comments'));
    }

    public function comment(Request $request,$id){
        Comment::create([
            'content'=>$request->content,
            'user_id'=>Auth::id(),
            'product_id'=>$id,
        ]);

        return redirect()->back();
    }

    public function loginform(){
        return view('web.account.loginform');
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return \redirect()->route('home');
        }
        return \redirect()->route('web.loginform')->with('error','login failed');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:12',
            'confirm'=>'same:password',
            
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'is_admin'=>0, 
        ]);

        return redirect()->route('home')->with('success','create success');
    }

    public function cart(){
        return view('web.cart.index');
    }

    public function AddCart(Request $req,$id){
        $product = Product::where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product,$id);

            $req->session()->put('Cart',$newCart);
           
        }
        return view('web.cart.index');
      
    }

    public function DeleteItemCart(Request $req,$id){
       
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);

            if(Count($newCart->products) >= 0){
                $req->session()->put('Cart',$newCart);
            }else{
                $req->session()->forget('Cart');
            }

            return view('web.cart.index');

    }

    public function checkout(){
        return view('web.cart.checkout');
    }

   public function SaveItemCart(Request $request,$id,$quanty){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id,$quanty);
        $request->session()->put('Cart',$newCart);
        return view('web.cart.index');
    }
}
