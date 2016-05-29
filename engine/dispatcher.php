<?php

/*
* dispatcher.php
* Needed for routing
*/

dispatch('/', 'mainPage');
dispatch('/city/:c', 'city');


?>