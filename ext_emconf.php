<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Faltranslations',
	'description' => 'Fix for Issue https://forge.typo3.org/issues/57272',
	'category' => 'misc',
    'author' => 'DACHCOM.DIGITAL AG',
    'author_email' => 'digital-development@dachcom.ch',
    'author_company' => 'DACHCOM.DIGITAL AG',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.10.0',
	'constraints' => array(
		'depends' => array(
            'typo3' => '7.6.0-7.6.99',
        ),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
