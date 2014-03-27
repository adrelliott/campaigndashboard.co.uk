<?php

// Set up the listeners for events in here


// Set up Controller listeners
// Event::subscribe('Dashboard\Handler\HomepageEventHandler');
Event::listen('dashboard.homepage.*', 'Dashboard\Handler\HomepageEventHandler');
Event::listen('dashboard.crm.*', 'Dashboard\Handler\CrmEventHandler');
// Event::subscribe('Dashboard\Handler\CrmEventHandler');
