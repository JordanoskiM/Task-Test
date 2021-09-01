<?php

namespace App\Modules\WebsiteModule;

interface IWebsiteManagement
{
    public function getWebsiteById($id);

    public function getAllWebsites();

    public function getWebsitesByUser();

    public function delete($websiteId);

    public function update($websiteData, $websiteId);

    public function store($websiteData);
}
