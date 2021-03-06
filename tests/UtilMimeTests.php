<?php

namespace League\Flysystem\Util;

use PHPUnit\Framework\TestCase;

$passthru = true;

function class_exists($class_name, $autoload = true)
{
    global $passthru;

    if ($passthru) {
        return \class_exists($class_name, $autoload);
    }

    return false;
}

class UtilMimeTests extends TestCase
{
    public function testNoFinfoFallback()
    {
        global $passthru;
        $passthru = false;
        $this->assertNull(MimeType::detectByContent('string'));
        $passthru = true;
    }

    public function testNoExtension()
    {
        $this->assertEquals('text/plain', MimeType::detectByFileExtension('dir/file'));
    }
}
