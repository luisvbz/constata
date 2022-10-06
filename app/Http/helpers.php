<?php

function create_code($digits = 4, $complement = 0, $correlative = false, $number = 0, $separator = '-') {
  $pin = '';
  if ($correlative) {
    $pin = str_pad($number + 1, $digits, '0', STR_PAD_LEFT);
  } else {
    $i = 0;
    while ($i < $digits) {
      if (strlen($pin) < $digits) {
        $pin .= random_int(0, 9);
        $i++;
      }
    }

    if ((int) $complement) {
      $i = 0;
      $pin2 = $separator;
      while ($i < $complement) {
        if (strlen($pin2) < $complement + 1) {
          $pin2 .= random_int(0, 9);
          $i++;
        }
      }
      $pin .= $pin2;
    }
  }
  return $pin;
}

function date_to_datedb($date, $delimiter = '-')
{
  list($d, $m, $y) = explode($delimiter, $date);
  if (strlen($y) != 4) {
    throw new \Exception('Formato de fecha inválido.');
  }
  return "$y-$m-$d";
}