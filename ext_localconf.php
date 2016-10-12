<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_page.php']['getRecordOverlay'][] =
    \Dachcom\Faltranslations\Hooks\RecordOverlay::class;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\ColumnMap::class] = array(
    'className' => \Dachcom\Faltranslations\Persistence\Generic\Mapper\ColumnMap::class
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapFactory::class] = array(
    'className' => \Dachcom\Faltranslations\Persistence\Generic\Mapper\DataMapFactory::class
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class] = array(
    'className' => \Dachcom\Faltranslations\Persistence\Generic\Mapper\DataMapper::class
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Domain\Model\FileReference::class] = array(
    'className' => \Dachcom\Faltranslations\Domain\Model\FileReference::class
);
