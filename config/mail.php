<?php

return array(
  "driver" => "smtp",
  "host" => "smtp.sendgrid.net",
  "port" => 25,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Toronto Audio Video Rentals"
  ),
  "username" => "username",
  "password" => "password",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);
