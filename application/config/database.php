<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 ********************************************************************************
 * 
 * @package	Servis
 * @author	Şafak Mehmet İLHAN
 * @copyright	Copyright (c) 2020 - 2021, Şafak Mehmet İLHAN (https://www.google.com/search?q=%22%C5%9Fafak+mehmet+ilhan%22)
 * @license	https://www.gnu.org/licenses/licenses.html#GPL	GNU General Public License V3
 * @link	https://github.com/safakmehmett
 * @since	Version 1.0.0
 * @filesource
 * 
**********************************************************************************/

$active_group = 'default';

$query_builder = TRUE;

$db['default'] = array(

    'dsn' => '',

    'hostname' => '%HOSTNAME%',

    'username' => '%USERNAME%',

    'password' => '%PASSWORD%',

    'database' => '%DATABASE%',

    'dbdriver' => 'mysqli',

    'dbprefix' => '%DBPREFIX%',

    'pconnect' => FALSE,

    'db_debug' => FALSE,

    'cache_on' => FALSE,

    'cachedir' => '',

    'char_set' => 'utf8',

    'dbcollat' => 'utf8_turkish_ci',

    'swap_pre' => '',

    'encrypt' => FALSE,

    'compress' => FALSE,

    'stricton' => FALSE,

    'failover' => array(),

    'save_queries' => TRUE

);

