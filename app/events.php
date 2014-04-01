<?php

// Set up the listeners for events in here
Event::listen('dashboard.homepage.*', 'Dashboard\Handler\HomepageEventHandler');
Event::listen('dashboard.crm.*', 'Dashboard\Handler\CrmEventHandler');
Event::listen('dashboard.sales.*', 'Dashboard\Handler\SalesEventHandler');
