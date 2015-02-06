<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * RSPrefix
 */
class RpkiRoa
{
    
    /**
     * @var integer
     */
    protected $rs_prefix_id;

    /**
     * @var integer
     */
    protected $asn;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var integer
     */
    protected $max;

    /**
     * @var integer
     */
    protected $min;



    /**
     * Get rs_prefix_id
     *
     * @return integer
     */
    public function getRsPrefixId()
    {
        return $this->rs_prefix_id;
    }

    /**
     * Set rs_prefix_id
     *
     * @param integer $rs_prefix_id
     * @return RpkiRoa
     */
    public function setRsPrefixId($rs_prefix_id)
    {
        $this->rs_prefix_id = $rs_prefix_id;
    
        return $this;
    }

    /**
     * Get asn
     *
     * @return integer
     */
    public function getAsn()
    {
        return $this->asn;
    }

    /**
     * Set asn
     *
     * @param integer $asn
     * @return RpkiRoa
     */
    public function setAsn($asn)
    {
        $this->asn = $asn;
    
        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }  

    /**
     * Set prefix
     *
     * @param string $prefix
     * @return RpkiRoa
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    
        return $this;
    }

    /**
     * Get max
     *
     * @return integer
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set max
     *
     * @param integer $max
     * @return RpkiRoa
     */
    public function setMax($max)
    {
        $this->max = $max;
    
        return $this;
    }

    /**
     * Get min
     *
     * @return integer
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set min
     *
     * @param integer $min
     * @return RpkiRoa
     */
    public function setMin($min)
    {
        $this->min = $min;
    
        return $this;
    }

    /**
     * @var \Entities\RpkiValidation
     */
    private $RpkiValidation;


    /**
     * Set RpkiValidation
     *
     * @param \Entities\RpkiValidation $rpkiValidation
     * @return RpkiRoa
     */
    public function setRpkiValidation(\Entities\RpkiValidation $rpkiValidation = null)
    {
        $this->RpkiValidation = $rpkiValidation;
    
        return $this;
    }

    /**
     * Get RpkiValidation
     *
     * @return \Entities\RpkiValidation 
     */
    public function getRpkiValidation()
    {
        return $this->RpkiValidation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->RpkiValidation = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add RpkiValidation
     *
     * @param \Entities\RpkiValidation $rpkiValidation
     * @return RpkiRoa
     */
    public function addRpkiValidation(\Entities\RpkiValidation $rpkiValidation)
    {
        $this->RpkiValidation[] = $rpkiValidation;
    
        return $this;
    }

    /**
     * Remove RpkiValidation
     *
     * @param \Entities\RpkiValidation $rpkiValidation
     */
    public function removeRpkiValidation(\Entities\RpkiValidation $rpkiValidation)
    {
        $this->RpkiValidation->removeElement($rpkiValidation);
    }
}