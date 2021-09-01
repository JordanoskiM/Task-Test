<?php

namespace App\Modules\PostModule;

use App\Models\Post;
use App\Models\Website;

class PostManagement implements IPostManagement
{
    private $postModel;

    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function getPostsByWebsite($id)
    {
        return Post::where('website_id', $id)->get();
    }

    public function getPostDetails($postId)
    {
        return Post::find($postId);
    }

    public function getPostById($id)
    {
        return Post::find($id);
    }

    public function delete($postId)
    {
        return $this->getPostById($postId)->forceDelete();
    }

    public function store($postData)
    {
        return $this->postModel->create($postData);
    }

    public function update($postData, $postId)
    {
        return $this->getPostById($postId)->update($postData);
    }
}
