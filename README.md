# barkdehond
Bark is een hond

Class:
-----------------------------
- Class heeft een constructor function
- Properties
- Methodes
    * Gewone methodes
    * Static methodes   =>Methodes waarvoor geen object aangemaakt hoeft te worden. Deze zitten methodes worden bijgehouden in de class.
- Access modifiers / encapsulation
    * private: alleen het object zelf kan hier iets mee
    * public: andere objecten kunnen hier iets mee.
    * protected : omlaag te gebruiken in de inheritance tree.
- Instanties maken
    instantie: afdruk / output van een (class) blauwdruk;

       $this-> verwijst naar  het object, niet naar de class.

       static functies kunnen alleen gebruik maken van static properties of static functies.

       self:: verwijst naar de class. in de class kun je dus ook properties een waarde geven. Deze worden dan bijgehouden.
       Een static kan niets met een variabele van een object. andersom kan wel.

- Het is aan de class om opbjecten op te halen en te retouneren, niet aan het object.


       composition : has a
       inheritance: is a


- Parent constructors are not called implicitly if the child class defines a constructor.
    In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
    If the child does not define a constructor then it may be inherited from the parent class just
    like a normal class method (if it was not declared as private).
__set() is run when writing data to inaccessible properties.
__get() is utilized for reading data from inaccessible properties.

