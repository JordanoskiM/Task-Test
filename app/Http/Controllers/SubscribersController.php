<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;
use App\Modules\WebsiteModule\ISubscribeManagement;

class SubscribersController extends Controller
{
    private $subscribe;

    public function __construct(ISubscribeManagement $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    public function subscribe(SubscribeRequest $request)
    {
        $subscribeData = $request->all();

        $subscriber = $this->subscribe->getSubscriber($subscribeData['email'], $subscribeData['website_id']);

        $subscribed = false;

        if($subscriber == null)
        {
            $subscribed =$this->subscribe->store($subscribeData);
        }
        if (!$subscribed) {
            return redirect()->back()->with('error', 'You are already subscribed to this website!');
        }
        return redirect()->back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribe($email, $id)
    {
        if (!$this->subscribe->delete($email, $id)) {
            return redirect()->back()->with('error', 'Something went wrong with unsubscribing, please try again!');
        }
        return redirect()->back()->with('success', 'Unsubscriberd successfully!');
    }
}
