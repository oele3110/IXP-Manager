<?php

/*
 * Copyright (C) 2009-2011 Internet Neutral Exchange Association Limited.
 * All Rights Reserved.
 *
 * This file is part of IXP Manager.
 *
 * IXP Manager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, version v2.0 of the License.
 *
 * IXP Manager is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License v2.0
 * along with IXP Manager.  If not, see:
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */


/**
 * Controller: Peering Manager
 *
 * @author     Barry O'Donovan <barry@opensolutions.ie>
 * @category   IXP
 * @package    IXP_Controller
 * @copyright  Copyright (c) 2009 - 2012, Internet Neutral Exchange Association Ltd
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU GPL V2.0
 */
class RpkiValidationController extends IXP_Controller_AuthRequiredAction
{

    public function init()
    {   

        if( isset( $this->_options['frontend']['disabled'][ $this->getRequest()->getControllerName() ] )
            && $this->_options['frontend']['disabled'][ $this->getRequest()->getControllerName() ] )
        {
            $this->addMessage( _( 'This controller has been disabled.' ), OSS_Message::ERROR );
            $this->redirectAndEnsureDie( '' );
        }
        
    }

    public function indexAction()
    {
        $selection = $this->getParam( 'selection', null );
        if ($selection == null) {
            $selection = 'allPr';
        }
        $this->view->selection     = $selection;

        $selectionIO = $this->getParam( 'selectionIO', null );
        if ($selectionIO == null) {
            $selectionIO = 'all';
        }
        $this->view->selectionIO     = $selectionIO;

        $cust = $this->getCustomer();
        $myAsn = $cust->getAutsys();

        $mycustid = $cust->getId();
        $this->view->mycustid = $mycustid;


        $this->view->tab            = $this->getParam( 'tab', false);
        $this->view->cust           = $cust;
        $summaryRpki = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->aggregateRpkiSummaries( $cust->getId() );

        $this->view->rpkiTypes = array_keys( \Entities\RpkiValidation::$RPKI_TYPES_FNS );

        // get aggRpki
        $aggRpki                    = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->aggregateRpki( $cust->getId() );

        // get customer names
        $customerNames = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->getAllCustomer();



        // set customer names in aggRpki array
        for($i=0;$i<sizeof($aggRpki['unknown']);$i++) {
            $custid = intval($aggRpki['unknown'][$i]['custid']) - 1;
            $aggRpki['unknown'][$i]['customer'] = $customerNames[$custid]['custName'];
        }

        for($i=0;$i<sizeof($aggRpki['invalid']);$i++) {
            $custid = intval($aggRpki['invalid'][$i]['custid']) - 1;
            $aggRpki['invalid'][$i]['customer'] = $customerNames[$custid]['custName'];
        }

        for($i=0;$i<sizeof($aggRpki['valid']);$i++) {
            $custid = intval($aggRpki['valid'][$i]['custid']) - 1;
            $aggRpki['valid'][$i]['customer'] = $customerNames[$custid]['custName'];
        }


        // get routes where my prefix was announced by other customer
        $otherRpkiU = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->getOtherPrefixes( $myAsn, 'U', $cust->getId() );
        $otherRpkiIV = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->getOtherPrefixes( $myAsn, 'IV', $cust->getId() );
        $otherRpkiV = $this->getD2EM()->getRepository( '\\Entities\\RpkiValidation' )->getOtherPrefixes( $myAsn, 'V', $cust->getId() );
        
        // set customer names
        for($i=0;$i<sizeof($otherRpkiU);$i++) {
            $custid = intval($otherRpkiU[$i]['custid']) - 1;
            $otherRpkiU[$i]['customer'] = $customerNames[$custid]['custName'];
        }

        for($i=0;$i<sizeof($otherRpkiIV);$i++) {
            $custid = intval($otherRpkiIV[$i]['custid']) - 1;
            $otherRpkiIV[$i]['customer'] = $customerNames[$custid]['custName'];
        }

        for($i=0;$i<sizeof($otherRpkiV);$i++) {
            $custid = intval($otherRpkiV[$i]['custid']) - 1;
            $otherRpkiV[$i]['customer'] = $customerNames[$custid]['custName'];
        }
        
        if($selection=='NAllPr') {
            // set other summary
            $summaryRpki['unknown'] = sizeof($otherRpkiU);
            $summaryRpki['invalid'] = sizeof($otherRpkiIV);
            $summaryRpki['valid'] = sizeof($otherRpkiV);

            // set other arrays
            $aggRpki['unknown'] = $otherRpkiU;
            $aggRpki['invalid'] = $otherRpkiIV;
            $aggRpki['valid'] = $otherRpkiV;
        }


        $this->view->summaryRpki = $summaryRpki;
        $this->view->aggRpki = $aggRpki;


    }



}
