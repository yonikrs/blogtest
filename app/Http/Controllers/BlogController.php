<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function createBlog(Request $request): bool
    {
        return (new Blog($request->all()))->save();
    }

    function readBlog(Request $request) {
        return Blog::find($request->input('blog_id'));
    }
}
