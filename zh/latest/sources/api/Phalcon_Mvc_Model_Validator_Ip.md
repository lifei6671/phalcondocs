Class **Phalcon\\Mvc\\Model\\Validator\\Ip**
============================================

*extends* abstract class :doc:`Phalcon\\Mvc\\Model\\Validator <Phalcon_Mvc_Model_Validator>`

*implements* :doc:`Phalcon\\Mvc\\Model\\ValidatorInterface <Phalcon_Mvc_Model_ValidatorInterface>`

.. role:: raw-html(raw)
   :format: html

:raw-html:`<a href="https://github.com/phalcon/cphalcon/blob/master/phalcon/mvc/model/validator/ip.zep" class="btn btn-default btn-sm">Source on GitHub</a>`

Phalcon\\Mvc\\Model\\Validator\\IP  Validates that a value is ipv4 address in valid range  

.. code-block:: php

    <?php

    use Phalcon\Mvc\Model\Validator\Ip;
    
    class Data extends Phalcon\Mvc\Model
    {
    
      public function validation()
      {
          // Any pubic IP
          $this->validate(new IP(array(
              'field'             => 'server_ip',
              'version'           => IP::VERSION_4 | IP::VERSION_6, // v6 and v4. The same if not specified
              'allowReserved'     => false,   // False if not specified. Ignored for v6
              'allowPrivate'      => false,   // False if not specified
              'message'           => 'IP address has to be correct'
          )));
    
          // Any public v4 address
          $this->validate(new IP(array(
              'field'             => 'ip_4',
              'version'           => IP::VERSION_4,
              'message'           => 'IP address has to be correct'
          )));
    
          // Any v6 address
          $this->validate(new IP(array(
              'field'             => 'ip6',
              'version'           => IP::VERSION_6,
              'allowPrivate'      => true,
              'message'           => 'IP address has to be correct'
          )));
    
          if ($this->validationHasFailed() == true) {
              return false;
          }
      }
    
    }



Constants
---------

*integer* **VERSION_4**

*integer* **VERSION_6**

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


