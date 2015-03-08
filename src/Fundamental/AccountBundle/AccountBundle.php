<?php
namespace Fundamental\AccountBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Bundle\AsseticBundle\Factory\Loader\ConfigurationLoader;
use Fundamental\AccountBundle\Extension\ConfigurationLoaderExtension;

class AccountBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
    
	public function getContainerExtension() {
		return new ConfigurationLoaderExtension();
	}

}