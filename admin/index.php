<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 11.8.2019 at 15:3
 */

if(islogged() == false) {
    header("Location: ".getsetting($pdo, "domain"));
}

