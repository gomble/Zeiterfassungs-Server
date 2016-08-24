<?php

  ini_set('display_errors',1);  
  error_reporting(E_ALL);
  
  class phpGPS_Settings {
    //Map Info
    public static $_defaultZoom = 3;
    public static $_defaultCenterLat = "41.988308";
    public static $_defaultCenterLong = "-99.483202";
    public static $_defaultMapType = "roadmap";
    public static $_windowW = 500;
    public static $_windowH = 500;
    public static $_embedAddition = 20;
    
    public static $_devKey = "DEV KEY";
    
    //GPS Defaults
    public static $_defaultDeviceID = 1;
    public static $_defaultTypeID = 1;
    
    public static $_title = "phpGPS";
    
    //Database Info
    public static $_host = "localhost";
    public static $_username = "root";
    public static $_password = "";
    public static $_dbname = "test";
    
    //Days to delay displaying markers
    public static $_markerDelay = 0;
    
    //Secret key for adding an entry using addGpsEntry.php
    public static $_secretKey = "1234";
  }
?>
