<?php

return array(
  "driver" => "smtp",
  "host" => "smtp.sendgrid.net",
  "port" => 25,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Toronto Audio Video Rentals"
  ),
  "username" => "apikey",
  "password" => "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",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);
