<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
   'query' => [
      'apikey' => 'f6d67549',
      's' => 'doraemon'
   ]
]);

$result = json_decode($response->getBody()->getContents(), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Movie</title>
</head>

<body>
   <?php foreach ($result['Search'] as $mv) : ?>
      <ul>
         <li>Title: <?= $mv['Title']; ?></li>
         <li>Year : <?= $mv['Year']; ?></li>
         <li>
            <img src="<?= $mv['Poster']; ?>" width="80">
         </li>
      </ul>
   <?php endforeach; ?>
</body>

</html>