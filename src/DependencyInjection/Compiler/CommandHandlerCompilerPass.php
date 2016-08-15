<?php

namespace KP\Bundle\CommandBusBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CommandHandlerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('kp.command_bus')) {
            return;
        }

        $definition = $container->getDefinition('kp.command_bus');
        $taggedServices = $container->findTaggedServiceIds('command_handler');

        $commandHandlers = array();

        foreach ($taggedServices as $id => $attributes) {
            $commandHandlers[] = new Reference($id);
        }

        $definition->addMethodCall(
            'registerCommandHandlers',
            array($commandHandlers)
        );
    }
}
