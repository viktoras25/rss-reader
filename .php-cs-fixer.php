<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests');

return (new PhpCsFixer\Config())
    ->setRules(
        [
            '@PSR2'                                 => true,
            '@PSR12'                                => true,
            '@Symfony'                              => true,

            // Change Symfony parameters
            'phpdoc_to_comment'                     => false,
            'binary_operator_spaces'                => ['default' => 'align'],
            'concat_space'                          => ['spacing' => 'one'],
            'no_trailing_comma_in_singleline_array' => true,
            'trailing_comma_in_multiline'           => false,
            'yoda_style'                            => false,

            // Additional rules
            'align_multiline_comment'               => true,
            'linebreak_after_opening_tag'           => true,
            'no_useless_else'                       => true,
            'no_useless_return'                     => true,
            'ternary_to_null_coalescing'            => true,
        ]
    )
    ->setFinder($finder);
