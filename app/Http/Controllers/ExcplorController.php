<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class ExcplorController extends Controller
{
    public function create()
    {
        $news = PostModel::where('category', 'news')
        
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // 🔹 أول 5 تقنية تفاعلًا
        $tech = PostModel::where('category', 'tech')
            ->orderBy('likes', 'desc')
            ->limit(5)
            ->get();

        // 🔹 5 مقالات عشوائية
        $random = PostModel::inRandomOrder()->limit(5)->get();

        return view('explore', compact('news', 'tech', 'random'));
    }
}