<?php
 namespace Album\Form;

 use Zend\Form\Form;

 class AlbumForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('album');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Title',
             ),
         ));
         $this->add(array(
             'name' => 'artist',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Artist',
             ),
         ));
		 $this->add(array(
             'name' => 'type',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Type',
             ),
         ));
		  $this->add(array(
             'name' => 'sex',
             'type' => 'Select',
			 'attributes' => array(
			 'id'=>'sex',
             'class'=>'large',
			 ),
             'options' => array(
			 'value_options' => array(
                    '1' =>'Male',
                    '2'=>'Female'),
				 'label' => 'Sex',
             ),
         ));
		   $this->add(array(
             'name' => 'user',
             'type' => 'Text',
             'options' => array(
                 'label' => 'User',
             ),
         ));
		   $this->add(array(
             'name' => 'password',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Pasword',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
		 
     }
 }
 
 ?>