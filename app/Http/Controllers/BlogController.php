<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function index($id)
    {
        $cachedBlog = Redis::get('blog_' . $id);

        if ($cachedBlog) {
            return response()->json([
                'message' => 'Data retrieved from the cache',
                'data' => json_decode($cachedBlog)
            ], 200);
        } else {
            $blog = Blog::find($id);
            Redis::set('blog_' . $id, $blog);
            return response()->json([
                'message' => 'Data retrieved from the database',
                'data' => $blog
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {

        $update = Blog::findOrFail($id)->update($request->all());

        if ($update) {

            // Delete blog_$id from Redis
            Redis::del('blog_' . $id);

            $blog = Blog::find($id);
            // Set a new key with the blog id
            Redis::set('blog_' . $id, $blog);

            return response()->json([
                'status_code' => 201,
                'message' => 'Blog updated',
                'data' => $blog,
            ]);
        } else {
            return response()->json([
                'status_code' => 500,
                'message' => 'Blog not updated',
            ]);
        }

    }

    public function delete($id)
    {

        Blog::findOrFail($id)->delete();
        Redis::del('blog_' . $id);

        return response()->json([
            'status_code' => 201,
            'message' => 'Blog deleted'
        ]);
    }
}
