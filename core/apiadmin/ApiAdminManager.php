<?php

declare(strict_types=1);

namespace ApiAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiAdminManager
{
    private Request $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function make(string $path)
    {
        $pathFile = __DIR__ . '/../../configs/routes.json';

        if (!File::exists($pathFile)) {
            throw new \Exception("Invalid File");
        }

        $file = File::get($pathFile); // string

        $menu = json_decode($file, true);

        dd($menu, $this->request, $path);
    }
}
