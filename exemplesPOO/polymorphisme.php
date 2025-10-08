<?php

// Classe parent Animal
class Animal
{
    public function makeSound()
    {
        echo "Un son d'animal.\n";
    }
}

// Classe Dog qui hérite d'Animal
class Dog extends Animal
{
    public function makeSound()
    {
        echo "Le chien aboie: Woof!\n";
    }
}

// Classe Cat qui hérite d'Animal
class Cat extends Animal
{
    public function makeSound()
    {
        echo "Le chat miaule: Meow!\n";
    }
}

// Fonction qui utilise le polymorphisme
function playWithAnimal(Animal $animal)
{
    // Appel à la méthode makeSound() qui sera interprétée
    // en fonction de la classe de l'objet fourni
    $animal->makeSound();
}

// Création d'instances de Dog et Cat
$dog = new Dog();
$cat = new Cat();

// Exemple de polymorphisme : la même méthode est appelée,
// mais le comportement est différent
playWithAnimal($dog); // Affiche : Le chien aboie: Woof!
playWithAnimal($cat); // Affiche : Le chat miaule: Meow!

?>