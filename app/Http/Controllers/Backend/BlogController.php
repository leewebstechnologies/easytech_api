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
            'slug' => strtolower(str_replace(' ', '-', $request->blog_category)),
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
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_slug)),
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
                    'post_slug' => strtolower(str_replace(' ', '-', $request->post_slug)),
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
                        'post_slug' => strtolower(str_replace(' ', '-', $request->post_slug)),
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


}
