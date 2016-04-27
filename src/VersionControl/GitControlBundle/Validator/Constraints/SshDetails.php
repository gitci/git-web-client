<?php
// src/VersionControl/GitControlBundle/Validator/Constraints/NoProfanity.php
namespace VersionControl\GitControlBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SshDetails extends Constraint
{
    public $message = 'validate.constraint.SshDetails';
    
    public $messageFileDoesNotExist = 'validate.constraint.SshDetails.FileDoesNotExist';
    
    public function validatedBy()
    {
        return 'ssh_details_validator';
    }
    
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

}

?>