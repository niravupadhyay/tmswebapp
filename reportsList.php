<?php
	session_start();
        error_reporting(0);
        
        $tmsTransReports = array("Carrier Activity Report", "Rack Activity Report", "Rack Activity Summary", "Shipping Report (with components)",
            "Customer Activity Report", "Account Activity Report", "Meter Detail Report", "Product Detail Report", 
            "Tank Detail Report", "Bulk Shipping Report", "Bulk Transaction Report", 
            "Bulk Product Movement Report");
        
        $tmsBalancingReports = array("Tank Stock Balance Report", "Terminal Balance Report",
            "Tank Inventory Report", "Product Summary Report", "Additive Mass Balance Report", "Bulk Stock Report");
        
        $tmsListingReports = array("Carrier Listing Report", "Driver Listing Report", "Driver Expiration Listing Report");
	
	?>    
