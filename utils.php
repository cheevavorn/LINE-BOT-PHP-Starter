<?php
    function getRequestType($requestMessage) {
        if($requestMessage == "ระเบียบ" || $requestMessage == "role") {
            return "role";
        }

        if($requestMessage == "") {

        }
    }