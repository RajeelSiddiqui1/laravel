<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;

class SellerController extends Controller
{
    function list(){
        return Seller::with('productData')->get();
    }

    function manyToOne(){
      return Product::with('seller')->get();
    }
}
