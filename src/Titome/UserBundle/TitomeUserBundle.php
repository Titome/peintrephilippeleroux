<?php

namespace Titome\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TitomeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}