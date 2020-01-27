<?php

namespace abstract_factory;

abstract class TypeOfDish{
    public $cuisine;
    public function __construct($cuisine){
        $this->cuisine = $cuisine;
    }
    public abstract function cook();
}

class ComplexnObed extends TypeOfDish{
    public function cook(){
        $this->cuisine->createComplexnObed();
    }
}

class OneDish extends TypeOfDish{
    public function cook(){
        $this->cuisine->createOneDish();
    }
}

class ComplexnObedWithDesert extends TypeOfDish{
    public function cook(){
        $this->cuisine->createComplexnObedWithDesert();
    }
}


/////////////////////////////////////
class Cafe
{
    /**
     * @param string $country
     */
    public function createComplexnObed($country)
    {
        /** @var Cuisine $obj */
        try {
            $obj = null;
            if ($country == 'america') {
                $obj = new AmericanCuisine();
            } else if ($country == 'ukr') {
                $obj = new UkrCuisine();
            } else {
                throw new \Exception("\nthere is no such a cuisine");
            }
            return $obj->createCuisine();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}

abstract class Cuisine
{
    abstract public function createCuisine();
    abstract public function createComplexnObed();
    abstract public function createOneDish(string $dish);
    abstract public function createComplexnObedWithDesert();

    /**
     * @param string $dish
     * @throws \Exception
     */
    public function createDish($dish)
    {
        $obj = null;
        if ($dish == 'burger') {
            $obj = new Burger();
        } else if ($dish == 'borsch') {
            $obj = new Borsch();
        } else if ($dish == 'cola') {
            $obj = new Cola();
        } 
        else if ($dish == 'salad') {
            $obj = new Salad();
        }
        else {
            throw new \Exception("\nthere is no such a dish");
        }
        return $obj->cook();
    }
    
    
    public function createSet()
    {
            
    }
}

class AmericanCuisine extends Cuisine
{
    public function __construct()
    {
        echo "\n**************\n American cuisine:";
    }


    public function createCuisine()
    {
        try {
            $this->createDish('burger');
            $this->createDish('cola');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
 
     public function createComplexnObed()
    {
        try {
            $this->createDish('burger');
            $this->createDish('salad');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createOneDish($dish){
        try {
            if(in_array($dish,  ['burger', 'salad', 'cola'])){
                $this->createDish($dish);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function createComplexnObedWithDesert(){
        try {
            $this->createDish('burger');
            $this->createDish('salad');
            $this->createDish('cola');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
}

class UkrCuisine extends Cuisine
{
    public function __construct()
    {
        echo "\n**************\n Ukr cuisine:";
    }

    public function createCuisine()
    {
        try {
            $this->createDish('borsch');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
  
         public function createComplexnObed()
    {
        try {
            $this->createDish('borsch');
            $this->createDish('salad');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createOneDish($dish){
        try {
            if( in_array($dish, ['borsch', 'salad', 'cola'])){
                $this->createDish($dish);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function createComplexnObedWithDesert(){
        try {
            $this->createDish('borsch');
            $this->createDish('salad');
            $this->createDish('cola');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}


interface Dish
{
    public function cook();
}

class Borsch implements Dish
{
    public function cook()
    {
        echo "\nborsch cooking";
    }
}

class Burger implements Dish
{
    public function cook()
    {
        echo "\nburger cooking";
    }
}

class Cola implements Dish
{
    public function cook()
    {
        echo "\ncola cooking";
    }
}

class Salad implements Dish
{
    public function cook()
    {
        echo "\nsalad cooking";
    }
}


/*$cafe = new Cafe();
$cafe->createComplexnObed('america');
$cafe->createComplexnObed('ukr');*/

$cuisine = new AmericanCuisine();
(new ComplexnObedWithDesert($cuisine))->cook();
echo "\n*****";
(new ComplexnObed($cuisine))->cook();