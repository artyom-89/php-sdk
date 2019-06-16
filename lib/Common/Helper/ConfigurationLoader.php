<?php

namespace Mbilling\Common\Helper;


class ConfigurationLoader
{
    /** @var array */
    private $configParams = [];

    public function load()
    {
        $configData = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "configuration.json");
        $this->configParams = json_decode($configData, true);
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->configParams;
    }
}