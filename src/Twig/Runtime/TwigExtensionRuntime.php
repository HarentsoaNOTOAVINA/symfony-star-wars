<?php

namespace App\Twig\Runtime;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\RuntimeExtensionInterface;

class TwigExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ParameterBagInterface $parameterBag
    ) {}

    public function getAsset(string $path):string
    {
        return $this->parameterBag->get('immo_url') . $path;
    }
}
