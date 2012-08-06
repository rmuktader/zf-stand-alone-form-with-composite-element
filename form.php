<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * @file form.php
 */
 
// Load Zend Framework
set_include_path(
        implode(PATH_SEPARATOR, array(
                get_include_path(),
                __DIR__ .'/'
        ))
);
        
// Create the auto loader so zend can load the rest automatically
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();

// load custom namspace
// in ZF MVC it would be autoloaderNamespaces[] = RM
$autoloader->registerNamespace( 'RM' ); 

$form = new Zend_Form;

// Set form name, id, method and action
$form->setName( 'contact' )
    ->setAttrib( 'id', 'form-contact' )
    ->setMethod( 'post' )
    ->setAction( 'http://'.
        $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] 
    );

// Create text box for name
$name = new Zend_Form_Element_Text( 'name' );
$name->setRequired( TRUE )
    ->setAttrib( 'id', 'fullname' )
    ->addErrorMessage( 'Please provide your name' );

$ssn = new RM_Form_Element_Ssn( 'ssn' );    
$ssn->setRequired( TRUE )
    ->setAttrib( 'id', 'ssn' )
    ->addErrorMessage( 'Please provide a valid SSN' );
    
// Create text box for email        
$email = new Zend_Form_Element_Text( 'email' );
$email->setRequired( TRUE )
    ->setAttrib( 'id', 'email' )
    ->addErrorMessage( 'Please provide a valid e-mail address' );

// Create text area for message    
$message = new Zend_Form_Element_Textarea( 'message' );
$message->setRequired( TRUE )
    ->setAttrib( 'id', 'message' )
    ->addErrorMessage( 'Please specify a message' );

// Create a submit button    
$submit = new Zend_Form_Element_Submit( 'submit' );
$submit->setLabel( 'Send Your Message!' )
    ->setAttrib( 'id', 'submit' );

// Set the ViewScript decorator for the form and tell it which 
// template file to use
$form->setDecorators( array( 
    array( 'ViewScript', array( 'viewScript' => 'form-contact.tpl.php' ) ) ) );

// Add the form elements AFTER the viewscript decorator has been set
$form->addElements( array( $name, $ssn, $email, $message, $submit ) );

// Get rid of all element decorators except for ViewHelper to render
// the individual elements and Errors decorator to render the errors.
$form->setElementDecorators( array( 'ViewHelper', 'Errors' ) );
    
// Create an instance of Zend_View and set the directory 
// for the template files
$view = new Zend_View();
$view->setScriptPath( __DIR__ );
$view->addHelperPath( __DIR__ . '/RM/View/Helper', 'RM_View_Helper' );

// Tell all the elements in the form which view to use when rendering
foreach ($form as $item){
    $item->setView($view);
}

// process or display the form
if( isset( $_POST['submit'] ) && ( $form->isValid( $_POST ) ) ) {
    echo 'Thank you';
} else {
    echo $form->render( $view );
}