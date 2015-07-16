<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class UploadVideoCommand extends Job implements SelfHandling
{
    public $uploadedFile;

    public function __construct($uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }

    public function handle()
    {
        $destination = public_path('video_uploads');

        $fileName = uniqid() . '.' . $this->uploadedFile->guessExtension();

        $this->uploadedFile->move($destination, $fileName);

        return '/video_uploads/' . $fileName;
    }
}
