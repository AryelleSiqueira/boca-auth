<?php
require_once('globals.php');

class LDAPManager {
    private LDAP\Connection $ldapConnection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->ldapConnection = ldap_connect(getenv('LDAP_SERVER'));

        if (!$this->ldapConnection) {
            throw new Exception('Error while connecting to LDAP server');
        }
        ldap_set_option($this->ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->ldapConnection, LDAP_OPT_REFERRALS, 0);
        
        $bindResult = ldap_bind($this->ldapConnection, getenv('LDAP_USER'), getenv('LDAP_PASSWORD'));
        
        if (!$bindResult) {
            throw new Exception('Error while authenticating with LDAP server');
        }
    }

    public function authenticateUser($name, $pass) {
        $searchResult = ldap_search($this->ldapConnection, getenv('LDAP_BASE_DN'), "(uid=$name)");
        $entries = ldap_get_entries($this->ldapConnection, $searchResult);

        if ($entries['count'] === 0) return false;

        $userDn = $entries[0]['dn'];

        return ldap_bind($this->ldapConnection, $userDn, $pass);
    }

    public function disconnect() {
        if ($this->ldapConnection) ldap_unbind($this->ldapConnection);
    }
}
?>
