<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->in('test');

return (new PhpCsFixer\Config())
    ->setRules(
        [
            '@PSR12' => true,
            'declare_strict_types' => true,
            'single_quote' => true,
            'yoda_style' => [
                'equal' => true,
                'identical' => true,
            ],
            'blank_line_before_statement' => [
                'statements' => [
                    'for',
                    'foreach',
                    'if',
                    'return',
                    'switch',
                ],
            ],
            'class_attributes_separation' => [
                'elements' => [
                    'method' => 'one',
                ],
            ],
            // 'parameters' is left out on purpose: trailing commas in parameter lists need PHP 8.0
            'trailing_comma_in_multiline' => [
                'elements' => [
                    'arrays',
                    'arguments',
                ],
            ],
            'no_empty_phpdoc' => true,
            'phpdoc_trim' => true,
            'phpdoc_no_empty_return' => true,
            'phpdoc_scalar' => true,
            'no_unused_imports' => true,
            'ordered_imports' => [
                'sort_algorithm' => 'alpha',
                'imports_order' => ['class', 'const', 'function'],
            ],
            'phpdoc_summary' => false,
            'phpdoc_to_comment' => false,
            'concat_space' => ['spacing' => 'one'],
            'array_syntax' => ['syntax' => 'short'],
        ]
    )
    ->setFinder($finder) ;
