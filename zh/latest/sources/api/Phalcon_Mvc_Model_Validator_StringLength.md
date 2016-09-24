Class **Phalcon\\Mvc\\Model\\Validator\\StringLength**
======================================================

*extends* abstract class :doc:`Phalcon\\Mvc\\Model\\Validator <Phalcon_Mvc_Model_Validator>`

*implements* :doc:`Phalcon\\Mvc\\Model\\ValidatorInterface <Phalcon_Mvc_Model_ValidatorInterface>`

.. role:: raw-html(raw)
   :format: html

:raw-html:`<a href="https://github.com/phalcon/cphalcon/blob/master/phalcon/mvc/model/validator/stringlength.zep" class="btn btn-default btn-sm">Source on GitHub</a>`

Simply validates specified string length constraints  

.. code-block:: php

    <?php

    use Phalcon\Mvc\Model\Validator\StringLength as StringLengthValidator;
    
    class Subscriptors extends \Phalcon\Mvc\Model
    {
    
    public function validation()
    {
    	$this->validate(new StringLengthValidator(array(
    		"field" => 'name_last',
    		'max' => 50,
    		'min' => 2,
    		'messageMaximum' => 'We don\'t like really long names',
    		'messageMinimum' => 'We want more than just their initials'
    	)));
    	if ($this->validationHasFailed() == true) {
    		return false;
    	}
    }
    
    }



Methods
-------

public  **validate** (:doc:`Phalcon\\Mvc\\EntityInterface <Phalcon_Mvc_EntityInterface>` $record)

Executes the validator



public  **__construct** (*array* $options) inherited from Phalcon\\Mvc\\Model\\Validator

Phalcon\\Mvc\\Model\\Validator constructor



protected  **appendMessage** (*string* $message, [*string|array* $field], [*string* $type]) inherited from Phalcon\\Mvc\\Model\\Validator

Appends a message to the validator



public  **getMessages** () inherited from Phalcon\\Mvc\\Model\\Validator

Returns messages generated by the validator



public *array*  **getOptions** () inherited from Phalcon\\Mvc\\Model\\Validator

Returns all the options from the validator



public  **getOption** (*mixed* $option, [*mixed* $defaultValue]) inherited from Phalcon\\Mvc\\Model\\Validator

Returns an option



public  **isSetOption** (*mixed* $option) inherited from Phalcon\\Mvc\\Model\\Validator

Check whether an option has been defined in the validator options


