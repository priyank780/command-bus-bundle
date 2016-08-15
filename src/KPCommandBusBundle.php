<?php

namespace KP\Bundle\CommandBusBundle;

use KP\Bundle\CommandBusBundle\DependencyInjection\Compiler\CommandHandlerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class KPCommandBusBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CommandHandlerCompilerPass());
    }
}
