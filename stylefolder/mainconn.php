<?php

// Bepaal het pad naar het connectiebestand op basis van de locatie van het script
$scriptDirectory = dirname($_SERVER['SCRIPT_FILENAME']);
$baseDirectory = dirname(__DIR__);
$relativePath = str_replace($baseDirectory, '', $scriptDirectory);

// Zorg ervoor dat het pad altijd begint met een voorwaartse slash
$relativePath = '/' . ltrim($relativePath, '/');

// Verwijder eventuele dubbele slashes in het pad
$relativePath = str_replace('//', '/', $relativePath);

// Inclusie van het connectiebestand met behulp van het dynamische pad
require_once __DIR__ . $relativePath . '/connectie/conecting.php';
?>
