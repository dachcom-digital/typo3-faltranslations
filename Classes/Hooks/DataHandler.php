<?php

namespace Dachcom\Faltranslations\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\DataHandling;

class DataHandler {

    /**
     * Generate a different preview link     *
     *
     * @param string                   $status       status
     * @param string                   $table        table name
     * @param integer                  $recordUid    id of the record
     * @param array                    $fields       fieldArray
     * @param DataHandling\DataHandler $parentObject parent Object
     *
     * @return void
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $recordUid, array $fields, DataHandling\DataHandler $parentObject) {
        if (in_array($status, array(
                'new',
                'update'
            )) && !in_array($table, array(
                'tt_content',
                'pages',
                'sys_file_reference'
            ))
        ) {

            $record = BackendUtility::getRecord($table, $recordUid);

            if ((int)$record['sys_language_uid'] > 0) {

                $rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
                    'fieldname',
                    'sys_file_reference',
                    "tablenames='$table' AND uid_foreign=" . $record['l10n_parent'] . BackendUtility::deleteClause('sys_file_reference'),
                    'fieldname',
                    'fieldname'
                );

                $fieldnames = array();
                foreach ($rows as $row) {
                    $fieldnames[] = $row['fieldname'];
                }

                foreach ($fieldnames as $fieldname) {

                    $references = BackendUtility::getRecordsByField(
                        'sys_file_reference',
                        'tablenames', $table,
                        'AND uid_foreign=' . $recordUid . " AND fieldname='$fieldname'", '', 'sorting ASC'
                    );

                    $l10nParents = BackendUtility::getRecordsByField(
                        'sys_file_reference',
                        'uid_foreign', $record['l10n_parent'],
                        " AND fieldname='$fieldname'", '', 'sorting ASC'
                    );


                    if ($references) {
                        for ($i = 0; count($references) > $i ; $i++) {

                            $GLOBALS['TYPO3_DB']->exec_UPDATEquery('sys_file_reference', 'uid=' . $references[$i]['uid'], array(
                                'sys_language_uid' => $record['sys_language_uid'],
                                'l10n_parent'      => (isset($l10nParents[$i]) && isset($l10nParents[$i]['uid']) ? $l10nParents[$i]['uid'] : 0)
                            ));
                        }
                    }
                }
            }
        }
    }
}
