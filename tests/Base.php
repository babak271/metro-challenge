<?php

namespace Test;

use PHPUnit\Framework\TestCase;

abstract class Base extends TestCase
{
    const ROOT_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    const DATA_PATH = self::ROOT_PATH . 'data' . DIRECTORY_SEPARATOR;

    protected function getFakeJsonData()
    {
        return file_get_contents(self::DATA_PATH . 'data.json');
    }
}