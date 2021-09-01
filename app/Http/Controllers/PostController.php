<?php

namespace App\Http\Controllers;

use App\Modules\PostModule\IPostManagement;
use App\Modules\WebsiteModule\IWebsiteManagement;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $website;
    private $post;

    public function __construct(IWebsiteManagement $website, IPostManagement $post)
    {
        $this->website = $website;
        $this->post = $post;
    }

    public function showPosts($id)
    {
        $posts = $this->post->getPostsByWebsite($id);

        return view('posts', ['posts' => $posts]);
    }

    public function showPostDetails($websiteId, $postId)
    {
        $post = $this->post->getPostDetails($postId);

        return view('post-details', ['post' => $post]);
    }
}
