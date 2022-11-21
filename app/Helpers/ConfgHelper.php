<?php

use App\Models\Config;

function config_preface()
{
    return Config::getConfig(Config::PREFACE);
}
