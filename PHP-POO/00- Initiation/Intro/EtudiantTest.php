<?php

use PHPUnit\Framework\TestCase;
//composer require PHPUnit/PHPUnit --dev //Lib de gestion des tests
//composer require spatie/phpunit-watcher --dev //Outil utilisant PHPUnit mettant en place un watcher surveillant les erreurs renvoyées par des fichiers de tests donnés.

require_once "Etudiant.php"; // require_once = require si ça n'a pas déjà été appelé;

class EtudiantTest extends TestCase
{
    public function testAgeValid() // pour que phpunit reconnaisse un test, soit le nom de la fonction commence par "test" soit la fonction est devancée par /** @test */
    {
        $etudiant = new Etudiant(34, 'la', 'la');

        $etudiant->setAge(50);

        $this->assertEquals(50, $etudiant->getAge(), "donc c'est bon?");
    }

    public function testAgeInvalid()
    {
        $etudiant = new Etudiant(34, 'la', 'la');

        $this->expectException("Exception");

        $etudiant->setAge(240);
    }


    //Test-driven Coding - un client demande à avoir le prénom en majuscule, 
    //                   - on crée le test testFirstNameIsUppercase, 
    //                   - testFirstNameIsUppercase renvoie une erreur, 
    //                   - puis on modifie le code (ici la méthode setFirstName) de manière à ce que ce test (ainsi que tous les précédents) ne renvoie plus d'erreurs.

    public function testFirstNameIsUppercase()
    {

        $etudiant = new Etudiant(34, 'Roxane', 'la');

        $etudiant->setFirstName('roxane');

        $this->assertEquals("ROXANE", $etudiant->getFirstName(), "c'est pas bon");
    }
}
