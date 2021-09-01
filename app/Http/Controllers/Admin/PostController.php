<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\WebsiteRequest;
use App\Mail\NewPostMail;
use App\Models\Post;
use App\Models\Subscriber;
use App\Modules\PostModule\IPostManagement;
use App\Modules\WebsiteModule\IWebsiteManagement;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    private $post;

    public function __construct(IPostManagement $post)
    {
        $this->post = $post;
    }

    public function index($id)
    {
        $posts = $this->post->getPostsByWebsite($id);

        return view('admin.posts', ['posts' => $posts, 'websiteId' => $id]);
    }

    public function destroy($postId)
    {
        if (!$this->post->delete($postId)) {
            return redirect()->back()->with('error', 'Something went wrong with deleting the post, please try again!');
        }
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

    public function create(PostRequest $request)
    {
        $postData = $request->all();

        $post = $this->post->store($postData);

        $subscribers = Subscriber::where('website_id', $postData['website_id'])->get();

        if (!$post) {
            return redirect()->back()->with('error', 'Something went wrong with creating the post, please try again!');
        }

        $postData['postId'] = $post->id;

        foreach ($subscribers as $subscriber)
        {
            $postData['email'] = $subscriber->email;

            Mail::to($subscriber['email'])->send(new NewPostMail($postData));
        }


        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function edit(PostRequest $request, $postId)
    {
        $postData = $request->all();
        if (!$this->post->update($postData, $postId)) {
            return redirect()->back()->with('error', 'Something went wrong with updating the post, please try again!');
        }
        return redirect()->back()->with('success', 'Post updated successfully!');
    }

}
