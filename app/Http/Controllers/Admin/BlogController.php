<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
{
    $blogs = Blog::withCount('binhLuans')->get(); // Đếm số lượng bình luận
    return view('admin.blog.index', compact('blogs'));
}
public function comments($id)
{
    $blog = Blog::findOrFail($id);
    return view('admin.blog.comments', compact('blog'));
}



}
