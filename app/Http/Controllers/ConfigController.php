<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('admin.config');
    }

    public function update(Request $request)
    {
        $data = [
            Config::PREFACE => $request->preface,
        ];

        foreach ($data as $key => $value) {
            Config::updateConfig($key, $value);
        }
        return back()->with('success', 'Configuration updated successfully!');
    }
}
