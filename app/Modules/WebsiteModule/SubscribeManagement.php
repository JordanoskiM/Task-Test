<?php

namespace App\Modules\WebsiteModule;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;

class SubscribeManagement implements ISubscribeManagement
{
    private $subscribeModel;

    public function __construct(Subscriber $subscribe)
    {
        $this->subscribeModel = $subscribe;
    }

    public function getSubscriber($email, $id)
    {
        return Subscriber::where('email', $email)->where('website_id', $id)->first();
    }

    public function store($subscribeData)
    {
        return $this->subscribeModel->create($subscribeData);
    }

    public function delete($email, $id)
    {
        return $this->getSubscriber($email, $id)->forceDelete();
    }
}
