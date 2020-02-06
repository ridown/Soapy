<?php
declare(strict_types = 1);

namespace Sourcetoad\Soapy\Concerns;

trait HasHooks
{
    /** @var array */
    protected $doRequestHooks = [];

    public function addDoRequestHook(callable $hook): self
    {
        $this->doRequestHooks[] = $hook;

        return $this;
    }
}
