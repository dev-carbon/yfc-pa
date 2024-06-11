<?php

function start_session($name = 'YFC-PA_session') {
    if (session_status() == PHP_SESSION_NONE) {
        session_name($name);
        session_start();
    }
}
