<?php


$questions = [
    "1. Quel mot-clé permet de créer une fonction en PHP ?\n1.function\n2.funk\n3.fct\n4.fuck",
    "2. Quel opérateur utilise-t-on pour vérifier l'égalité en PHP ?\n1.===\n2.==\n3.!=\n4.=",
    "3. Comment s'appelle la boucle qui s'exécute tant qu'une condition est vraie ?\n1.if\n2.fgets\n3.while\n4.bucle",
    "4. Quel est le symbole pour les commentaires sur une ligne en PHP ?\n1.//\n2.*/\n3.</com>\n4.commentary",
    "5. Quel mot-clé permet d'arrêter une boucle en PHP ?\n1.dissolve\n2.<br>\n3.break\n4.helicopter"
];


$reponses = [1, 2, 3, 1, 3];
$score = 0;
$score_maximum = 50;
$NB_QUESTIONS = count($questions);



function affichageScore($score)
{
    echo "###################################################\n\n###################################################
Score : $score
###################################################\n\n";
    return;
}

function demanderChiffre($message)
{
    do {
        echo $message;
        $reponse = trim(fgets(STDIN));


        if (ctype_digit($reponse)) {
            return $reponse;
        } else {
            echo "Les réponses ne peuvent etre que des chiffres !\n";
        }
    } while (true);
}

    echo "###################################################
######## Qui veux comprendre PHP ?! ##########\n\n";

if (file_exists("scoreQuizz.txt")) {
    echo "================ SCORE PRÉCÉDENT ==================\n";
    echo file_get_contents("scoreQuizz.txt");
    echo "===================================================\n\n";
}

for ($i = 0; $i < $NB_QUESTIONS; $i++) {
    

    affichageScore($score);

    echo $questions[$i] . "\n";
    $reponse_utilisateur = demanderChiffre("Entrer votre réponse : ");
    if ($reponse_utilisateur == $reponses[$i]) {
        echo "Bravo ! Bonne réponse !\nVotre score augmente de 10 points ! \n";
        $score += 10;

    } else {
        echo "Mauvaise réponse !\nVotre score n'augmente pas !\n";

    }

    echo "Votre score actuel est : $score points !\n\n";

}
affichageScore($score);
$pourcentage_reponse = ($score / ($NB_QUESTIONS * 10)) * 100;
if ($pourcentage_reponse > 50) {
    echo "BRAVO !!!! T'es pas si mauvais !!!!!!!!!\n";
} else {
    echo "GAME OVER ! Keep on trying dear !\n";
}
echo "Score Final : $score / $score_maximum\n";
echo "Votre pourcentage de bonne réponse est de : $pourcentage_reponse% !\n";

$fichier = fopen("scoreQuizz.txt","w+");
fwrite($fichier, "Score Précedent : $score / $score_maximum\n");
fwrite($fichier,"Pourcentage de bonne réponse : $pourcentage_reponse %\n");
fclose($fichier);