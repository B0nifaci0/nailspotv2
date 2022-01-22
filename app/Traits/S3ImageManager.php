<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait S3ImageManager
{

    protected function saveImages($base_64, $path, $name)
    {
        $base_64 = Str::replaceLast('data:image/png;base64,', '', $base_64);
        $base_64 = Str::replaceLast('data:image/jpg;base64,', '', $base_64);
        $base_64 = Str::replaceLast('data:image/jpeg;base64,', '', $base_64);
        $base_64 = Str::replaceLast(' ', '+', $base_64);

        $image = base64_decode($base_64);

        $path = env('S3_ENVIRONMENT') . '/' . $path . '/' . $name;
        Storage::disk('s3')->put($path, $image);
        return  $path;
    }

    protected function getS3URL($path, $id)
    {
        $adapter = Storage::disk('s3')->getDriver()->getAdapter();

        $path = env('S3_ENVIRONMENT') . $path . '/' . $id;

        $command = $adapter->getClient()->getCommand('GetObject', [
            'Bucket' => $adapter->getBucket(),
            'Key' => $adapter->getPathPrefix() . $path
        ]);

        $result = $adapter->getClient()->createPresignedRequest($command, '+20 minute');

        return (string) $result->getUri();
    }
}