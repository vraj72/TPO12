<?php

function _auth_ldap($username,$password)
{
$ldapconn = ldap_connect("10.0.3.253") or die("Could not connect to LDAP server.");
if ($ldapconn) 
{
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if(@LDAP_START_TLS) 
	ldap_start_tls($ldapconn);
$r=@ldap_search($ldapconn,"dc=dbit,dc=in","uid=".$username);
if($r)
	{
	$result =@ldap_get_entries( $ldapconn, $r);
	$type=$result[0]['dn'];
	if ($result[0]) 
			{
			 if (@ldap_bind($ldapconn, $result[0]['dn'],$password))
					{
						$a_dn=explode(",",$type);
						$a_ou=explode("=",$a_dn[1]);
						return $a_ou[1];
					}
			else
				return 1;
			}
	}
}
ldap_close($ldapconn);
return 2;
}

	?>


