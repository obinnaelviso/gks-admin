<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $guarded = [];

    const PREFACE = 'preface';

    public static function getConfig($key)
    {
        $config = self::where('key', $key)->first();
        if (!$config) {
            $config = self::create([
                'key' => $key
            ]);
        }
        return $config;
    }

    public static function updateConfig($key, $value)
    {
        $config = self::getConfig($key);
        $config->value = $value;
        $config->save();
    }
}
