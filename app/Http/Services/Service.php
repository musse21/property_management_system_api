<?php

namespace App\Http\Services;

class Service
{
    /**
     * @var UploadService
     */
    public UploadService $uploadService;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->uploadService = new UploadService;
    }
}
