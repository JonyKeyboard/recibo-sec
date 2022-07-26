<?php

    require_once("auth.php");

        if($userDao) {
            $userDao->destroyToken();
        }