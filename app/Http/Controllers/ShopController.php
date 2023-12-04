<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
// use App\Models\Shop;
// use App\Http\Helpers;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        try {
            // // Get the current page from the request, default to 1
            // $page = $request->input('page', 1);
            // // Get the limit value from the request, default to 15
            // $limit = $request->input('limit', 15);
    
            // // Check if the authenticated user is an admin
            // $isAdmin = Helpers::isAdmin();
    
            // if (!$isAdmin) {
            //     // Retrieve non-deleted and verified shops
            //     $totalShops = Shop::where('deleted', false)->where('verified', true)->count();
            //     $shops = Shop::where('deleted', false)->where('verified', true)->paginate($limit, ['*'], 'page', $page);
            // } else {
            //     // Retrieve all shops (including deleted)
            //     $totalShops = Shop::count();
            //     $shops = Shop::paginate($limit, ['*'], 'page', $page);
            // }
    
            // if ($shops->isEmpty()) {
            //     return response()->json(['success' => false, 'message' => 'No shops found']);
            // }
    
            // return response()->json([
            //     'success' => true,
            //     'data' => $shops->makeHidden(['created_at', 'updated_at']),
            //     'totalShops' => $totalShops,
            // ]);


        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function calculateShopRating($shopId)
    {
        $products = Product::where('seller_id', $shopId)->get();
        $totalRating = 0;
        $totalComments = 0;

        foreach ($products as $product) {
            $comments = Comment::where('product_id', $product->product_id)->get();
            foreach ($comments as $comment) {
                $totalRating += $comment->rating;
                $totalComments++;
            }
        }

        if ($totalComments > 0) {
            $averageRating = $totalRating / $totalComments;
            return $averageRating;
        } else {
            return 0;
        }
    }
    public function showRankedShops()
    {
        $shops = User::where('role', 'shop')->get();

        foreach ($shops as $shop) {
            $shop->rating = $this->calculateShopRating($shop->user_id);
        }

        $rankedShops = $shops->sortByDesc('rating');

        return view('shops.index', ['rankedShops' => $rankedShops]);
    }

}