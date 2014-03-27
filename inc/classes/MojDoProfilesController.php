<?php
/*
 * Copyright (c) mojito
 * 
 */


class MojDoProfilesController
{
    var $oPF;
    var $aItems;
    var $oEmailTemplate;

    function MojDoProfilesController()
    {
        
    }

    function createProfile( $aData, $bSendMails = false, $iMainMemberID = 0 )
    {
        $aRetArray = array();
        
        if( !$aData or !is_array($aData) or empty($aData) )
            return false;

        unset( $aData['Couple'] );
        unset( $aData['Captcha'] );
        unset( $aData['TermsOfUse'] );
        unset( $aData['ProfilePhoto'] );
        
        if(!isset($aData['ID']) || !isset($aData['Password'])){
            return false;
        }
        
        $sSalt = genRndSalt();
        $sPassCheck = encryptUserPwd($aData['Password'], $sSalt);
        
        $sQuery = "INSERT INTO Profiles (NickName, Email, Password, Salt) values ('".$aData['ID']."', '".$aData['ID']."', '".$sPassCheck."' , '".$sSalt."')";

        $rRes = db_res( $sQuery );

        if( $rRes ) {
            
            //moj_member_ip_store($iNewID);
            $aRetArray['Password'] = $sPassCheck;

            return $aRetArray;
        } else
            return false;
    }
    
    function checkUserExist($email){
        $sQuery = "SELECT ID FROM Profiles WHERE Email = '{$email}'";
        
        db_res( $sQuery );
        
        $rRes = db_affected_rows();
        
        return $rRes;
    }


    function collectSetString( $aData )
    {
        $sRequestSet = '';

        foreach( $aData as $sField => $mValue ) {
            if( is_string($mValue) )
                $sValue = "'" . $GLOBALS['MySQL']->escape($mValue) . "'";
            elseif( is_bool($mValue) )
                $sValue = (int)$mValue;
            elseif( is_array($mValue) ) {
                $sValue = '';
                foreach( $mValue as $sStr )
                    $sValue .= $GLOBALS['MySQL']->escape(str_replace( ',', '', $sStr )) . ',';

                $sValue = "'" . substr($sValue,0,-1) . "'";
            } elseif( is_int($mValue) ) {
                $sValue = $mValue;
            } else
                continue;

            $sRequestSet .= "`$sField` = $sValue,\n";
        }

        $sRequestSet = substr( $sRequestSet,0, -2 );// remove ,\n

        return $sRequestSet;
    }

    function createProfileCache( $iMemID )
    {
        createUserDataFile( $iMemID );
    }

    function updateProfile( $iMemberID, $aData )
    {
        if( !$aData or !is_array($aData) or empty($aData) )
            return false;

        $this -> _checkUpdateMatchFields($aData);

        $sSet = $this -> collectSetString( $aData );
        $sQuery = "UPDATE `Profiles` SET {$sSet} WHERE `ID` = " . (int)$iMemberID;
        //echo $sQuery ;
        db_res($sQuery);
        $this -> createProfileCache( $iMemberID );
        return (bool)db_affected_rows();
    }

    /**
    * Check if we need to update profile matching
    */
    function _checkUpdateMatchFields(&$aData)
    {
        // list of all matchable fields
        $aAllMatchFields = array();

        // temporary flag of member
        $aData['UpdateMatch'] = false;

        // get array of matching fields
        $oMatchFields = new BxDolProfileFields(101);
        $aMatchFields = $oMatchFields -> aArea[0]['Items'];

        // get array of all fields
        $oAllFields = new BxDolProfileFields(100);
        $aAllFields = $oAllFields -> aArea[0]['Items'];

        // find all matchable fields
        foreach ($aMatchFields as $iFieldID => $aField) {
            // put it to the list
            $aAllMatchFields[$iFieldID] = $aField['Name'];

            // get matched field too
            $iNewFieldID = $aField['MatchField'];
            $aNewField   = $aAllFields[$iNewFieldID];

            // and put it to the list too
            $aAllMatchFields[$iNewFieldID] = $aNewField['Name'];
        }

        // also need to re-match if Status is changed
        $aAllMatchFields[7] = 'Status';

        //echoDbg($aAllMatchFields);

        // check if one of updated fields is matchable
        foreach ($aData as $sName => $sValue) {
            //echo $sName . "\n";
            if (in_array($sName, $aAllMatchFields)) {
                $aData['UpdateMatch'] = true;
                break; // if at least one of the fields is matchable then true
            }
        }

        //echoDbg($aData);
    }

    function deleteProfile( $iMemberID )
    {
    }

    function getProfileInfo( $iMemberID )
    {
        return db_assoc_arr( "SELECT * FROM `Profiles` WHERE `ID` = " . (int)$iMemberID );
    }

}
