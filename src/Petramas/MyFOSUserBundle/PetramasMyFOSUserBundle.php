<?php

namespace Petramas\MyFOSUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PetramasMyFOSUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
