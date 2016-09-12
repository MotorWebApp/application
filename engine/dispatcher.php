<?php

/*
* dispatcher.php
* Needed for routing
*/

dispatch('/', 'mainPage');
dispatch('/city/:c', 'city');
dispatch('/auth', 'auth');
dispatch('/lk', 'lk');

?>