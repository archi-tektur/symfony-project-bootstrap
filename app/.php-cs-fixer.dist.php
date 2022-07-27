<?php

declare(strict_types=1);

$finder = new PhpCsFixer\Finder();
$finder
    ->in(__DIR__)
    ->exclude('var')
    ->exclude('vendor');

$config = new PhpCsFixer\Config();
$config
    ->setRules(['@PhpCsFixer' => true])
    ->setFinder($finder);

return $config;
