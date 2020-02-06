<?php
declare(strict_types = 1);

namespace Sourcetoad\Soapy;

use Sourcetoad\Soapy\Concerns\BootsTraits;
use Sourcetoad\Soapy\Concerns\HasHooks;

abstract class SoapyBaseClient extends \SoapClient
{
    use HasHooks;

    public function call($function, $arguments)
    {
        return $this->$function($arguments);
    }

    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        foreach ($this->doRequestHooks as $hook) {
            $hook($request, $location, $action, $version, $one_way);
        }

        parent::__doRequest($request, $location, $action, $version, $one_way); // TODO: Change the autogenerated stub
    }
}
