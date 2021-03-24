<?php
// to prevent direct access
defined('_JEXEC') or die('Access Deny');

// to track errors
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/**
 * Creating custom class with plg<Group><PluginName> by extending base class JPlugin 
 */
class plgUserLoginredirect extends JPlugin {

    /**
     * The event which is trigger after successful login 
     * of the user.
     * @param $user
     * @param $options
     */

    function onUserAfterLogin($user,  $options = array()){
        // getting menu id of page to redirect from admin setting 
        $menuId = $this->params-> get('menu_id');
        // getting application object
        $app = JFactory::getApplication();
        //getting menu details 
        $menu = $app->getMenu();
        //using $menuId  to grab item details
        $item = $menu->getItem($menuId);
        // creating $url to redirect
        $url = JRoute::_($item->link . '&itemId=' . $menuId, false);
        // using redirect method to selected page with message after user logged in 
        $app->redirect($url,  'Login Successfully and you are redirected to admin specific page');
        
    }

}