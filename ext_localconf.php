<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
});
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

call_user_func(static function() {

    //Overwrite Typo3 userAspect class to use our own for adding querying new user field
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\Context\UserAspect::class] = [
        'className' => Ccm\CcmEventHandling\Context\UserAspect::class,
    ];
    // Register extended domain class
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
        ->registerImplementation(
            TYPO3\CMS\Core\Context\UserAspect::class,
            Ccm\CcmEventHandling\Context\UserAspect::class
        );


});
