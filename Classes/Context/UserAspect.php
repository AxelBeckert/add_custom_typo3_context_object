<?php

namespace Ccm\CcmEventHandling\Context;

use TYPO3\CMS\Core\Context\Exception\AspectPropertyNotFoundException;

class UserAspect extends \TYPO3\CMS\Core\Context\UserAspect
{
    /**
     * @return \stdClass
     */
    private function createPseudoUser(): \stdClass
    {
        $user = new \stdClass();
        $user->user = [];
        $user->useremail_column = 'email';

        return $user;
    }

    /**
     * Fetch common information about the user
     *
     * @param string $name
     * @return int|bool|string|array
     * @throws AspectPropertyNotFoundException
     */
    public function get(string $name)
    {
        switch ($name) {
            case 'id':
                return (int)($this->user->user[$this->user->userid_column ?? 'uid'] ?? 0);
            case 'username':
                return (string)($this->user->user[$this->user->username_column ?? 'username'] ?? '');
            case 'isLoggedIn':
                return $this->isLoggedIn();
            case 'isAdmin':
                return $this->isAdmin();
            case 'groupIds':
                return $this->getGroupIds();
            case 'groupNames':
                return $this->getGroupNames();
            case 'email':
                return (string)($this->user->user[$this->user->useremail_column ?? 'email'] ?? '');
        }
        throw new AspectPropertyNotFoundException('Property "' . $name . '" not found in Aspect "' . __CLASS__ . '".', 1529996567);
    }
}
