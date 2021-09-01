<?php

namespace App\Modules\PostModule;

interface IPostManagement
{
    public function getPostsByWebsite($id);
    public function getPostDetails($postId);
    public function getPostById($id);
    public function delete($postId);
    public function store($postData);
    public function update($postData, $postId);
}
