<?php


class SecurityModel
{
    public function checkLogin()
    {
        if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] === true)) {
            return;
        }

        header('location: /admin/login');
        exit();
    }

    public function getLoggedInUser()
    {
        session_start();
        if (
            isset($_SESSION['loggedin'], $_SESSION['id'])
            && (true === $_SESSION['loggedin'])
            && (int)$_SESSION['id']
        ) {
            $userModel = new UserModel();
            return $userModel->getUserById((int)$_SESSION['id']);
        }

        return null;
    }

    public function setLoggedIn(User $user)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
    }
}