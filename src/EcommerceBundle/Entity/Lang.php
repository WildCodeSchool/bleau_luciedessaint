<?php

namespace EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Lang
 */
class Lang
{
    /*upload d'image champ"virtuel"*/
    public $file;

    /**
     * @ORM\prePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->lngFlag = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\postPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->lngFlag);

        unset($this->file);
    }

    /**
     * @ORM\postRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    protected function getUploadDir()
    {
        return 'bundles/drapeaux';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->lngFlag ? null : $this->getUploadDir().'/'.$this->lngFlag;
    }

    public function getAbsolutePath()
    {
        return null === $this->lngFlag ? null : $this->getUploadRootDir().'/'.$this->lngFlag;
    }
    /*fin champ virtuel*/
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $lngCode;

    /**
     * @var string
     */
    private $lngLib;

    /**
     * @var string
     */
    private $lngFlag;

    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lngCode
     *
     * @param string $lngCode
     * @return Lang
     */
    public function setLngCode($lngCode)
    {
        $this->lngCode = $lngCode;

        return $this;
    }

    /**
     * Get lngCode
     *
     * @return string 
     */
    public function getLngCode()
    {
        return $this->lngCode;
    }

    /**
     * Set lngLib
     *
     * @param string $lngLib
     * @return Lang
     */
    public function setLngLib($lngLib)
    {
        $this->lngLib = $lngLib;

        return $this;
    }

    /**
     * Get lngLib
     *
     * @return string 
     */
    public function getLngLib()
    {
        return $this->lngLib;
    }

    /**
     * Set lngFlag
     *
     * @param string $lngFlag
     * @return Lang
     */
    public function setLngFlag($lngFlag)
    {
        $this->lngFlag = $lngFlag;

        return $this;
    }

    /**
     * Get lngFlag
     *
     * @return string 
     */
    public function getLngFlag()
    {
        return $this->lngFlag;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }


    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }



}
