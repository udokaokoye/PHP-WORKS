<?php

// !Redirect Function


function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}