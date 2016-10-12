<?php
namespace Dachcom\Faltranslations\Hooks;


use TYPO3\CMS\Frontend\Page\PageRepository;
use TYPO3\CMS\Frontend\Page\PageRepositoryGetRecordOverlayHookInterface;

class RecordOverlay implements PageRepositoryGetRecordOverlayHookInterface {

    /**
     * Enables to preprocess a record overlay
     *
     * @param string $table
     * @param array $row
     * @param integer $sys_language_content
     * @param string $OLmode
     * @param \TYPO3\CMS\Frontend\Page\PageRepository $parent
     */
    public function getRecordOverlay_preProcess($table, &$row, &$sys_language_content, $OLmode, PageRepository $parent) {

        if ($table === 'sys_file_reference') {

            // if (TYPO3_MODE === 'FE') {
                $GLOBALS['TCA'][$table]['ctrl']['transOrigPointerField'] = '';
                $GLOBALS['TCA'][$table]['ctrl']['languageField'] = -1;
            // }

        }

    }

    /**
     * Enables to postprocess a record overlay
     *
     * @param string                                  $table
     * @param array                                   $row
     * @param int                                     $sys_language_content
     * @param string                                  $OLmode
     * @param \TYPO3\CMS\Frontend\Page\PageRepository $parent
     */
    public function getRecordOverlay_postProcess($table, &$row, &$sys_language_content, $OLmode, PageRepository $parent) {
        // TODO: Implement getRecordOverlay_postProcess() method.
    }}