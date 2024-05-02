<?php
function nombreEnLettres($nombre) {
    $unites = array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf');
    $dizaines = array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix');
    $centaines = array('', 'cent', 'deux-cents', 'trois-cents', 'quatre-cents', 'cinq-cents', 'six-cents', 'sept-cents', 'huit-cents', 'neuf-cents');

    $resultat = '';

    // Décomposer le nombre en milliers, centaines et dizaines/unités
    $milliers = floor($nombre / 1000);
    $reste = $nombre % 1000;
    $centaines_part = floor($reste / 100);
    $dizaines_part = floor(($reste % 100) / 10);
    $unites_part = $reste % 10;

    // Gérer les milliers
    if ($milliers > 0) {
        $resultat .= nombreEnLettres($milliers) . ' mille ';
    }

    // Gérer les centaines
    if ($centaines_part > 0) {
        $resultat .= $centaines[$centaines_part] . ' ';
    }

    // Gérer les dizaines et les unités
    if ($dizaines_part > 1) {
        $resultat .= $dizaines[$dizaines_part] . ' ';
        if ($unites_part > 0) {
            $resultat .= $unites[$unites_part] . ' ';
        }
    } elseif ($dizaines_part == 1) {
        if ($unites_part == 0) {
            $resultat .= 'dix ';
        } elseif ($unites_part == 1) {
            $resultat .= 'onze ';
        } elseif ($unites_part == 2) {
            $resultat .= 'douze ';
        } elseif ($unites_part == 3) {
            $resultat .= 'treize ';
        } elseif ($unites_part == 4) {
            $resultat .= 'quatorze ';
        } elseif ($unites_part == 5) {
            $resultat .= 'quinze ';
        } elseif ($unites_part == 6) {
            $resultat .= 'seize ';
        } else {
            $resultat .= $dizaines[1] . ' ' . $unites[$unites_part] . ' ';
        }
    } elseif ($unites_part > 0) {
        $resultat .= $unites[$unites_part] . ' ';
    }

    return $resultat;
}

// Exemple d'utilisation :
$nombre = 750000;
echo nombreEnLettres($nombre); // Sortie: quinze mille
