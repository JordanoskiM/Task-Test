<?php

namespace App\Http\Controllers;

use App\Modules\WebsiteModule\IWebsiteManagement;

class IndexController extends Controller
{
    private $website;

    public function __construct(IWebsiteManagement $website)
    {
        $this->website = $website;
    }

    public function index()
    {
        $websites = $this->website->getAllWebsites();

        return view('index', ['websites' => $websites]);
    }

}
