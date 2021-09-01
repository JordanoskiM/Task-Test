<?php

namespace App\Modules\WebsiteModule;

use App\Models\Website;
use Illuminate\Support\Facades\Auth;

class WebsiteManagement implements IWebsiteManagement
{
    private $websiteModel;

    public function __construct(Website $website)
    {
        $this->websiteModel = $website;
    }

    public function getWebsiteById($id)
    {
        return Website::find($id);
    }

    public function getAllWebsites()
    {
        return Website::all();
    }

    public function getWebsitesByUser()
    {
        return Website::where('user_id', Auth::id())->get();
    }

    public function delete($websiteId)
    {
        return $this->getWebsiteById($websiteId)->forceDelete();
    }

    public function store($websiteData)
    {
        return $this->websiteModel->create($websiteData);
    }

    public function update($websiteData, $websiteId)
    {
        return $this->getWebsiteById($websiteId)->update($websiteData);
    }
}
