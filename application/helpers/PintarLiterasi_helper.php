<?php

function is_masuk()
{
    $ci = &get_instance();
    if (!$ci->session->userdata("email")) {
        redirect("/");
    }
}


