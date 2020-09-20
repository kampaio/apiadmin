<?php

declare(strict_types=1);

namespace ApiAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiAdminManager
{
    private Request $request;

    private Client $client;

    public function __construct(Request $request, Client $client)
    {
        $this->request = $request;
        $this->client = $client;
    }

    public function make(string $path)
    {
        $pathFile = __DIR__ . '/../../configs/menu.json';

        if (!File::exists($pathFile)) {
            throw new \Exception("Invalid File");
        }

        $file = File::get($pathFile); // string

        $menu = json_decode($file, true);

        dd($menu, $this->request, $path);
    }
}
