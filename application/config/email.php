<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_user'] = 'Adityafahmi2005@gmail.com';
$config['smtp_pass'] = 'antl gdkg psnk qcjb';
$config['smtp_port'] = 587; // Sesuaikan dengan port SMTP Anda
$config['smtp_crypto'] = 'tls'; // Gunakan 'tls' atau 'ssl'
$config['mailtype'] = 'html';

// Beberapa opsi tambahan yang dapat Anda sesuaikan
$config['newline'] = "\r\n"; // Sesuaikan dengan sistem operasi Anda
$config['crlf'] = "\r\n";
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
