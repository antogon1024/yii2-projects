<?php
namespace app\library\cabinet;
 
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        echo '<pre>'; print_r($user);exit;
		if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            } elseif ($user->can($role)) {
                return true;
            } elseif ($identity = $user->getIdentity()) {
                if ($identity->can($role)) {
                    return true;
                }
            }
        }
 
        return false;
    }
}