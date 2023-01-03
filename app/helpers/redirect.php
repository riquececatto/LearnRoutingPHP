<?php

function redirect($to)
{
    return header('Location: '.$to);
}