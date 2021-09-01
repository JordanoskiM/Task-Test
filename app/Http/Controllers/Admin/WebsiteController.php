<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteRequest;
use App\Modules\WebsiteModule\IWebsiteManagement;

class WebsiteController extends Controller
{
    private $website;

    public function __construct(IWebsiteManagement $website)
    {
        $this->website = $website;
    }

    public function index()
    {
        $websites = $this->website->getWebsitesByUser();

        return view('admin.website', ['websites' => $websites]);
    }

    public function destroy($websiteId)
    {
        if (!$this->website->delete($websiteId)) {
            return redirect()->back()->with('error', 'Something went wrong with deleting the website, please try again!');
        }
        return redirect()->back()->with('success', 'Website deleted successfully!');
    }

    public function create(WebsiteRequest $request)
    {
        $websiteData = $request->all();

        if (!$this->website->store($websiteData)) {
            return redirect()->back()->with('error', 'Something went wrong with creating website, please try again!');
        }
        return redirect()->back()->with('success', 'Website created successfully!');
    }

    public function edit(WebsiteRequest $request, $websiteId)
    {
        $websiteData = $request->all();
        if (!$this->website->update($websiteData, $websiteId)) {
            return redirect()->back()->with('error', 'Something went wrong with updating website, please try again!');
        }
        return redirect()->back()->with('success', 'Website updated successfully!');
    }

}
