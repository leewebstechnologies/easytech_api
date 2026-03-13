<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    public function BlogCategory() {
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.blog.blog_category', compact('blogCategory'));
    }
    // End Method

    public function StoreBlogCategory(Request $request) {
        BlogCategory::create([
            'blog_category' => $request->blog_category,
            'slug' => strtolower(str_replace(' ', '-', $request->post_category)),
        ]);

        $notification = array(
        'message' => 'Blog Category Inserted Successfully!',
        'alert-type' => 'success'
    );


        return redirect()->back()->with($notification);
    }
    // End Method

    public function EditBlogCategory($id) {
        $editBlogCategory = BlogCategory::find($id);
        return response()->json($editBlogCategory);


    }
    // End Method

    public function UpdateBlogCategory(Request $request) {
        $cat_id = $request->cat_id;
        $category = BlogCategory::find($cat_id);

        $category->update([
           'blog_category' => $request->blog_category,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_slug)),
        ]);

        $notification = array(
        'message' => 'Blog Category Updated Successfully!',
        'alert-type' => 'success'
    );


    return redirect()->back()->with($notification);

    }
    // End Method

    public function DeleteBlogCategory($id) {
        BlogCategory::find($id)->delete();

        $notification = array(
        'message' => 'Blog Category Deleted Successfully!',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }
    // End Method

    // All Methods for Blog Posts
    public function AllBlogPosts() {
        $blogPost = BlogPost::latest()->get();
        return view('backend.blog.all_blog_posts', compact('blogPost'));
    }
    // End Method

    public function AddBlogPost() {
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.blog.add_blog_post', compact('blogCategory'));

    }
    // End Method

    public function StoreBlogPost(Request $request) {
    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        $img = $manager->read($image);
        $img->resize(688, 436)->save(public_path('upload/blog/'.$name_gen));
        $save_url = 'upload/blog/'.$name_gen;

        BlogPost::create([
            'blogcategory_id' => $request->blogcategory_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'long_description' => $request->long_description,
            'image' => $save_url,
        ]);
    }

        $notification = array(
        'message' => 'Blog Post Inserted Successfully!',
        'alert-type' => 'success'
    );


    return redirect()->route('all.blog.posts')->with($notification);
    }
    // End Method

    public function EditBlogPost($id) {
        $blogCategory = BlogCategory::latest()->get();
        $post = BlogPost::find($id);
        return view('backend.blog.edit_blog_post', compact('blogCategory', 'post'));



    }
    // End Method

    public function UpdateBlogPost(Request $request) {
        $blog_id = $request->id;
        $blogPost = BlogPost::find($blog_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(688, 436)->save(public_path('upload/blog/'.$name_gen));
            $save_url = 'upload/blog/'.$name_gen;

            if (file_exists(public_path($blogPost->image))) {
                @unlink(public_path($blogPost->image));
            }

                $blogPost->update([
                    'blogcategory_id' => $request->blogcategory_id,
                    'post_title' => $request->post_title,
                    'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                    'long_description' => $request->long_description,
                    'image' => $save_url,
            ]);


            $notification = array(
            'message' => 'Blog Post Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.posts')->with($notification);

        } else {
            $blogPost->update([
                        'blogcategory_id' => $request->blogcategory_id,
                        'post_title' => $request->post_title,
                        'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                        'long_description' => $request->long_description,
                ]);


                $notification = array(
                'message' => 'Blog Post Without Updated With Image Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.posts')->with($notification);

        }

    }
    // End Method

     public function DeleteBlogPost($id) {
        $item = BlogPost::find($id);
        $img = $item->image;
        unlink($img);

        BlogPost::find($id)->delete();

         $notification = array(
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Start Blog Category API
    public function ApiBlogCategory() {
        $blogCategory = BlogCategory::latest()->get();
        return $blogCategory;
    }
    // End Method

    public function ApiAllBlogs() {
        $blogPosts = BlogPost::with('blog')->latest()->get();

        $response = $blogPosts->map(function($post) {
            return [
                'id' => $post->id,
                'post_title' => $post->post_title,
                'post_slug' => $post->post_slug,
                'image' => $post->image,
                'long_description' => $post->long_description,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'category_name' => $post->blog ? $post->blog->blog_category : null,
            ];
        });

        return response()->json($response);
    }

    public function ApiAllBlogsSlug($slug) {
        $blogPost = BlogPost::with('blog')->where('post_slug', $slug)->first();

        if (!$blogPost) {
            return response()->json(['error' => 'Blog Post not found!'], 404);
        }

        $response = [
            'id' => $blogPost->id,
            'post_title' => $blogPost->post_title,
            'post_slug' => $blogPost->post_slug,
            'image' => $blogPost->image,
            'long_description' => $blogPost->long_description,
            'created_at' => $blogPost->created_at,
            'updated_at' => $blogPost->updated_at,
            'category_name' => $blogPost->blog ? $blogPost->blog->blog_category : null,
        ];

        return response()->json($response);
    }

    public function getBlogsByCategory($category_id) {
        $blogs = BlogPost::where('blogcategory_id', $category_id)->join('blog_categories', 'blog_posts.blogcategory_id', '=', 'blog_categories.id')
            ->select('blog_posts.*', 'blog_categories.blog_category as category_name')
            ->get();    
        return response()->json($blogs);
    }


}
