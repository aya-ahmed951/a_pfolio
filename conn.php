<?php
                if(!isset($_SESSION)){
                        session_start(); 
                    }    
                            
           date_default_timezone_set('Africa/Cairo');
                
              
                  $DBhost = "localhost";
                  $DBuser = "aiclouds";
                  $DBname = "aiclouds_restaurant";
                  $DBpass = "M(OG367jqg5Mr*";

                  
                  $con = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
                    
                     if ($con->connect_errno) {
                         die("ERROR : -> ".$con->connect_error);
                     }
                
                $con->query("SET NAMES 'utf8'"); 
                $con->query('SET CHARACTER SET utf8');
                $con->query("set character_set_server='utf8'");
                $con->query("set names 'utf8'");
                ?>