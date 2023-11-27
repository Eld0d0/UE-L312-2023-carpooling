<?php
$dossier_pages = __DIR__;

$contenu_dossier = scandir($dossier_pages);

$pages = array_filter($contenu_dossier, function($fichier) {
    return !is_dir($fichier) && pathinfo($fichier, PATHINFO_EXTENSION) == 'php'; 
});

if (!empty($pages)) {
    echo '<ul>';
    foreach ($pages as $page) {
        $nom_fichier = pathinfo($page, PATHINFO_FILENAME);
        $titre = str_replace('_', ' ', $nom_fichier);
        echo '<li><a href="' . $page . '">' . ucfirst($titre) . '</a></li>'; 
    }
    echo '</ul>';
} else {
    echo 'Aucune page trouvée.';
}
?>
<style>
    
</style>
