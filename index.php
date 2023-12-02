<link rel="stylesheet" href="css/style.css" type="text/css" />
<?php
    
$dossier_pages = __DIR__;

$contenu_dossier = scandir($dossier_pages);

$pages = array_filter($contenu_dossier, function($fichier) {
    return !is_dir($fichier) && pathinfo($fichier, PATHINFO_EXTENSION) == 'php'; 
});

foreach ($pages as $page) {
    $nom_fichier = pathinfo($page, PATHINFO_FILENAME);
    $titre = str_replace('_', ' ', $nom_fichier);
    $mot_debut = strtok($titre, " ");

    if ($mot_debut !== 'index'){
        $tableau[$mot_debut][] = [
            'titre' => $titre,
            'lien' => $page
        ];
    }
}

echo '<h1>Menu de navigation</h1>';
echo '<div id="menu">';
foreach ($tableau as $mot => $liens) {
    echo '<table>';
    echo '<thead><tr><th colspan="100%">' . ucfirst($mot) . '</th></tr></thead>';
    foreach ($liens as $lien) {
        echo '<tr><td><a href="' . $lien['lien'] . '">' . ucfirst($lien['titre']) . '</a></td></tr>';
    }
    echo '</table>';
}
echo '</div>';

