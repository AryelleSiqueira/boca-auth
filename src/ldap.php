<?php
require_once('globals.php');

function LDAPConnect() {
    $ldapConnection = ldap_connect(getenv('LDAP_SERVER'));

    if (!$ldapConnection) {
        LOGLevel("Error while connecting to LDAP server", 0);
		MSGError("Error while connecting to LDAP server");
        exit;
    }
    ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0);

    $bindResult = ldap_bind($ldapConnection, getenv('LDAP_USER'), getenv('LDAP_PASSWORD'));
    
    if (!$bindResult) {
        LOGLevel("Error while authenticating with LDAP server", 0);
        MSGError("Error while authenticating with LDAP server");
        exit;
    }
    return $ldapConnection;
}

function LDAPGetUserInfo($ldapConnection, $name) {
    $searchFilter = "(uid=$name)";
    $searchAttributes = ['uid', 'userPassword'];
    $searchResult = ldap_search($ldapConnection, getenv('LDAP_BASE_DN'), $searchFilter, $searchAttributes);

    if (!$searchResult) {
        LOGLevel("Error while searching LDAP server", 0);
        MSGError("Error while searching LDAP server");
        exit;
    }

    $entries = ldap_get_entries($ldapConnection, $searchResult);
    if ($entries['count'] === 0) {
        return null;
    }
    $userData['userPassword'] = $entries[0]['userpassword'][0];
    $userData['userId'] = $entries[0]['uid'][0];

    return $userData;
}

function LDAPDisconnect($ldapConnection) {
    ldap_unbind($ldapConnection);
}
?>
