<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$input = $_POST['txt']; 
$command = "python C:\Users\Bhavik\PycharmProjects\venuazyBot\bot\main.py $input";
$response = shell_exec($command);
echo $response;