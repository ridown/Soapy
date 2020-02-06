<?php

namespace Sourcetoad\Soapy\Tests\Unit;

use Sourcetoad\Soapy\SoapyClient;
use Sourcetoad\Soapy\SoapyCurtain;
use Sourcetoad\Soapy\SoapyFacade;
use Sourcetoad\Soapy\Tests\BaseTestCase;
use stdClass;

class HasHooksTest extends BaseTestCase
{
    public function testHookingIntoDoRequest()
    {
        /** @var SoapyClient $client */
        $client = SoapyFacade::create(function (SoapyCurtain $curtain) {
            return $curtain
                ->setWsdl($this->baseWsdl);
        });

        $client->addDoRequestHook(function(string $request, string $location, string $action, int $version, int $one_way) {
            // Assert

            dump($request);
            dump($location);
            dump($action);
            dump($version);
            dump($one_way);

            $this->assertTrue($request);
            $this->assertTrue($location);
            $this->assertTrue($action);
            $this->assertTrue($version);
            $this->assertEquals(0, $one_way);
        });

        // Act
        $customClass = '';
        $client->call('sayHello', $customClass);
    }
}
