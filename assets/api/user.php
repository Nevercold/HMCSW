<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 11.8.2019 at 3:21
 */

function islogged(){
    if(isset($_SESSION['user'])){
        return true;
    } else {
        return false;
    }
}

