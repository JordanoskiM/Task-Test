<?php

namespace App\Modules\WebsiteModule;

interface ISubscribeManagement
{
    public function delete($email, $id);
    public function store($subscribeData);
    public function getSubscriber($email, $id);
}
