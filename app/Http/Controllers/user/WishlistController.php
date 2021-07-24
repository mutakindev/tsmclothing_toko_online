<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{


    public function index()
    {
        
        $id_user = \Auth::user()->id;
        $wishlists = DB::table('wishlists')
                            ->join('users','users.id','=','wishlists.user_id')
                            ->join('products','products.id','=','wishlists.products_id')
                            ->select('products.name as nama_produk','products.image','users.name','wishlists.*','products.price')
                            ->where('wishlists.user_id','=',$id_user)
                            ->get();
        $data = [
            'wishlists' => $wishlists,
        ];
        return view('user.wishlist',$data);
    }

    public function simpan(Request $request)
    {
        Wishlist::create([
            'user_id' => $request->user_id,
            'products_id' => $request->products_id,
        ]);

        return redirect()->route('user.wishlist');
    }


    public function delete($id)
    {

        Wishlist::destroy($id);
        
        return redirect()->route('user.wishlist');
    }
}
