<?php
/**
 * @file form-contact.tpl.php
 */
?>
<!doctype html>  
<html lang="en">  
<head>  
<meta charset="utf-8">  
<title>Stand Alone Zend Form</title>  
<meta name="description" content="Stand Alone Zend Form">  
<meta name="author" content="Rayhan Muktader">  
<!--[if lt IE 9]>  
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
<![endif]-->  
</head>  
<body>  
      
    <form id="contact" action="<?= $this->element->getAction(); ?>" 
        method="<?= $this->element->getMethod(); ?>">

        <table>
            <tr>
                <td>Your Name</td>
                <td><?= $this->element->name; ?></td>
            </tr>

            <tr>
                <td>Your E-mail Address</td>
                <td><?= $this->element->email; ?></td>
            </tr>

            <tr>
                <td>Your SSN</td>
                <td><?= $this->element->ssn; ?></td>
            </tr>
            
            <tr>
                <td>Your Message</td>
                <td><?= $this->element->message; ?></td>
            </tr>

            <tr>
                <td><?= $this->element->submit ?></td>
            </tr>
        </table>
    </form>
    
</body>  
</html>  