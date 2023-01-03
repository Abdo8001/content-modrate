<?php
namespace MVC\Models;
use MVC\core\DBH;
use MVC\core\DB;
class Site_settingModel extends DB{
    public function SiteSetting($value){
        $sitevalue=$this->All("SELECT `site_value`FROM `site_setting`where`sitekey`='$value'");
    return $sitevalue[0]['site_value'];
    
    }}