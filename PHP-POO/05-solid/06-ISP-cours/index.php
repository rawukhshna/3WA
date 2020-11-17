<?php

use Reporting\Format\JsonFormatter;
use Reporting\Format\HtmlFormatter;

/**
 * 
 * PREALABLE AU COURS :
 * --------------------
 * Bien comprendre la notion d'interface et être au courant du fait qu'on puisse implémenter plusieurs
 * interfaces pour une même classe :-)
 * 
 * COURS :
 * -------
 * Cet exercice traite du I de SOLID (Interfaces Segregation Principle - Principe de Ségrégation (wtf?!)
 *  d'Interfaces) : c'est en gros le SRP, mais appliqué aux interfaces !
 * 
 * L'idée de ce principe est d'être conscient, lorsque l'on définit une interface (dont le but est de définir
 * quelles seront les méthodes que doivent posséder les classes qui s'en réclament), qu'on ne doit pas demander
 * à une classe de savoir faire à la fois le café, le thé, la lessive et des calculs mathématique.
 * 
 * C'est un complément logique du SRP (Principe de Responsabilité Unique) : si vous créez une interface qui demande
 * à une classe qui veut l'implémenter de faire à la fois le café et la lessive, comment voulez vous en vouloir
 * au développeur qui va créer une classe à partir de cette interface d'avoir créé une classe qui a plusieurs
 * rôles / responsabilités ?
 * 
 * CA SERA VOTRE FAUTE ! Et on aboutira à un code dégueu qui ne respecte pas le SRP, parce que dans un premier 
 * temps, c'est votre interface qui ne respecte pas l'ISP !
 * 
 * Vous devez donc veiller à ce que votre interface ne contiennent que des méthodes qui sont liées par un même
 * rôle à jouer.
 * 
 * Par exemple, on pourrait imaginer une interface CoffeeMakerInterface qui ait 3 ou 4 méthodes liées 
 * au fait de faire du café (moudreGrains(), chaufferEau(), faireCouler() ...) mais rien qui soit en rapport
 * avec le fait de faire la vaisselle ! Vous mettriez plutôt ça dans une autre interface WashingInterface !
 * 
 * L'avantage c'est que si un jour on invente une machine à café qui fait aussi la vaisselle, la classe pourra
 * tout à fait implémenter les deux interfaces :-)
 * 
 * ENONCE DE L'EXERCICE :
 * ----------------------
 * Notre cher collègue qui n'en rate pas une s'est mis en tête que ce serait bien que les formatters puissent 
 * désormais aussi aller dans l'autre sens ! Partir d'une chaine de caractère pour recréer un Report.
 * 
 * Il a donc ajouté une méthode dans l'interface FormatterInterface qui s'appelle `deserialize(string $input): Report` qui reçoit une chaine de caractère et qui renvoie une instance de la classe Report.
 * 
 * Le problème c'est que tous les formatters implémentent cette interface, et il a donc du implémenter cette
 * nouvelle méthode dans tous les formatters. Si cela a du sens pour le JsonFormatter qui peut tout à fait
 * transformer un Report en JSON et du JSON en un Report, ça n'a AUCUN SENS pour le HtmlFormatter ou pour
 * le CsvFormatter !
 * 
 * Il a donc créé des méthodes complètement inutiles dans le HtmlFormatter et dans le CsvFormatter juste pour
 * que PHP ne lui gueule pas dessus vu que la méthode deserialize() est désormais OBLIGATOIRE ...
 * 
 * Questions à discuter avec votre prof :
 * --------------------------------------
 * Question 1 : Cela a-t-il du sens d'avoir une fonction qui n'existe que pour émettre une exception ?
 * Question 2 : Peut-on envisager que les classes XXXFormatter aient toutes la méthode format() mais que 
 * seules certaines d'entre elles ne possèdent la méthode deserialize() ?
 * 
 * Votre mission c'est de faire en sorte que seule la classe JsonFormatter doivent implémenter la méthode `deserialize()` et pas les autres, tout en gardant en tête que les toutes les classes XXXFormatter doivent
 * continuer à implémenter l'interface FormatterInterface !
 */

/**
 * Mise en place de l'autoloading (Chargement automatique des classes)
 * Et oui, plus besoin de require_once de partout ! :-)
 */
spl_autoload_register(function ($className) {
    // Attention, avec ce principe, vos dossiers et noms de fichiers doivent
    // correspondre exactement aux Namespaces et aux noms de classes 
    $className = str_replace("\\", "/", $className);
    require_once($className . ".php");
});

// On imagine simplement le json suivant
$json = '{"date":"2016-04-21","title":"Titre de mon rapport"}';
$html = '<h2>Titre de mon rapport</h2><em>2016-04-21</em>';

// On créé le JsonFormatter
$jsonFormatter = new JsonFormatter();

// On créé le rapport avec la méthode deserialize()
$report = $jsonFormatter->deserialize($json);

// Le var_dump() devrait marcher
var_dump($report);

// On fait pareil avec le Html
$htmlFormatter = new HtmlFormatter();
// Evidemment ici ça plante, c'est logique :
$report = $htmlFormatter->deserialize($html); // Lance une exception ..
var_dump($report);
