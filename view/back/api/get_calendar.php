<?php
/*
webagenda-viewer (calendar viewer - ical & dav)
 
Copyright (C) 2017 Noël Martinon

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

require_once('../inc/config.inc');
require_once('../inc/common.inc');

try {
    $ds = ldap_connect($serverldap);

    if (!$ds) {
        throw new Exception('LDAP connection failed.');
    }

    $r = ldap_bind($ds, $rootdn, $rootpw);
    if (!$r) {
        throw new Exception('LDAP bind failed.');
    }

    $sr = ldap_search($ds, $dn, $filtre, $restriction);
    if (!$sr) {
        throw new Exception('LDAP search failed.');
    }

    $info = ldap_get_entries($ds, $sr);
    if (!$info) {
        throw new Exception('Failed to get LDAP entries.');
    }

    $entry = array();
    for ($i = 0; $i < $info["count"]; $i++) {
        $nom[$i] = $info[$i]["sn"][0] . " " . $info[$i]["givenname"][0];
        if (isset($info[$i]["mail"])) {
            $mail[$nom[$i]] = $info[$i]["mail"][0];
        } else {
            $mail[$nom[$i]] = '';
        }
    }

    usort($nom, 'wd_unaccent_compare_ci');

    for ($i = 0; $i < $info["count"]; $i++) {
        if ($mail[$nom[$i]] != '') {
            $entry[$nom[$i]] = $mail[$nom[$i]];
        }
    }

    header('Content-type: application/json');
    echo json_encode($entry);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array('error' => $e->getMessage()));
}
?>
