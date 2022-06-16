<?php

namespace Viktoras\RssReader\Tests\Entities\Channel;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\Channel\Cloud;

it('can retrieve values', function () {
    $xml = new SimpleXMLElement(
        '<cloud domain="rpc.sys.com" port="80" path="/RPC2" registerProcedure="pingMe" protocol="soap"/>'
    );

    $cloud = new Cloud($xml);

    $this->assertSame('rpc.sys.com', $cloud->getDomain());
    $this->assertSame('80', $cloud->getPort());
    $this->assertSame('/RPC2', $cloud->getPath());
    $this->assertSame('pingMe', $cloud->getRegisterProcedure());
    $this->assertSame('soap', $cloud->getProtocol());
});
