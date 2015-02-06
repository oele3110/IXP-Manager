<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * RSPrefix
 */
class RpkiValidation
{
    /**
     * Map prefix acceptance types to summary functions
     * @var array Map prefix acceptance types to summary functions
     */
    public static $SUMMARY_TYPES_FNS = [
        'unknown'  => 'getSummaryRpkiUnknown',
        'invalid' => 'getSummaryRpkiInvalid',
        'valid' => 'getSummaryRpkiValid'
    ];
    
    /**
     * Map prefix acceptance types to lookup functions
     * @var array Map prefix acceptance types to lookup functions
     */
    public static $RPKI_TYPES_FNS = [
        'unknown'  => 'getRpkiUnknown',
        'invalid' => 'getRpkiInvalid',
        'valid' => 'getRpkiValid'
    ];
    
    
    /**
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $rs_prefix_id;

    /**
     * @var string
     */
    protected $validity;

    /**
     * @var string
     */
    protected $info;

    /**
     * @var \Entities\RpkiRoa
     */
    protected $RpkiRoa;

    /**
     * @var \Entities\RSPrefix
     */
    protected $RSPrefix;

    /**
     * @var \Entities\Customer
     */
    protected $Customer;

    /**
     * @var string
     */
    protected $allCustomer;



    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return RpkiValidation
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }



    /**
     * Set Val
     *
     * @param integer $val
     * @return RpkiValidation
     */
    public function setVal($validity)
    {
        $this->validity = $validity;
    
        return $this;
    }

    /**
     * Get Val
     *
     * @return integer
     */
    public function getVal()
    {
        return $this->validity;
    }

    /**
     * Set Info
     *
     * @param integer $info
     * @return RpkiValidation
     */
    public function setInfo($info)
    {
        $this->info = $info;
    
        return $this;
    }

    /**
     * Get Info
     *
     * @return integer
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Get rs_prefix_id
     *
     * @return integer
     */
    public function getRSPrefixId()
    {
        return $this->rs_prefix_id;
    }


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
     * Set RpkiRoa
     *
     * @param \Entities\RpkiRoa $rpki_roa
     * @return RpkiValidation
     */
    public function setRpkiRoa(\Entities\RpkiRoa $rpki_roa = null)
    {
        $this->RpkiRoa = $rpki_roa;
    
        return $this;
    }

    /**
     * Get RpkiRoa
     *
     * @return \Entities\RpkiRoa
     */
    public function getRpkiRoa()
    {
        return $this->RpkiRoa;
    }

    /**
     * Set RSPrefix
     *
     * @param \Entities\RSPrefix $rs_prefix
     * @return RpkiValidation
     */
    public function setRSPrefix(\Entities\RSPrefix $rs_prefix = null)
    {
        $this->RSPrefix = $rs_prefix;
    
        return $this;
    }

    /**
     * Get RSPrefix
     *
     * @return \Entities\RSPrefix
     */
    public function getRSPrefix()
    {
        return $this->RSPrefix;
    }


    /**
     * Set Customer
     *
     * @param \Entities\Customer $customer
     * @return RSPrefix
     */
    public function setCustomer(\Entities\Customer $customer = null)
    {
        $this->Customer = $customer;
    
        return $this;
    }

    /**
     * Get Customer
     *
     * @return \Entities\Customer
     */
    public function getCustomer()
    {
        return $this->Customer;
    }


    /**
     * Set validity
     *
     * @param string $validity
     * @return RpkiValidation
     */
    public function setValidity($validity)
    {
        $this->validity = $validity;
    
        return $this;
    }

    /**
     * Get validity
     *
     * @return string 
     */
    public function getValidity()
    {
        return $this->validity;
    }

}