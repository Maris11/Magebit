<?php
include_once 'classes/Emails.php';

class EmailController extends Emails
{
    public $providers;
    public function index($sort="0",$search="",$providers=null) {
        $emails=$this->getEmails();
        $this->providers=$this->getProviders($emails);
        switch($sort) {
            case "0":
                usort($emails, function($a, $b) {
                    $t1 = strtotime($a['date']);
                    $t2 = strtotime($b['date']);
                    return $t1 - $t2;
                });
                break;
            case "1":
                usort($emails, function($a, $b) {
                    $t1 = strtotime($a['date']);
                    $t2 = strtotime($b['date']);
                    return $t2 - $t1;
                });
                break;
            case "2":
                array_multisort($emails,SORT_ASC);
                break;
            case "3":
                array_multisort($emails,SORT_DESC);
                break;
        }
        if($providers!=null) {
            foreach ($providers as $provider) {
                for($i=0;$i<count($emails);$i++) {
                    $domain=explode("@",$emails[$i]["email"])[1];
                    if(strpos($domain,$provider)!==false) {
                        array_splice($emails,$i,1);
                        $i--;
                    }
                }
            }
        }
        if($search!="") {
            for($i=0;$i<count($emails);$i++) {
                if(strpos($emails[$i]["email"],$search)===false) {
                    array_splice($emails,$i,1);
                    $i--;
                }
            }
        }
        return $emails;
    }
    public function indexByIds($ids) {
        $emails= array();
        foreach ($ids as $id) {
            array_push($emails,$this->getEmail($id));
        }
        return $emails;
    }
    public function saveEmail($email) {
        $this->setEmail($email);
    }
    public function delete($ids) {
        foreach ($ids as $id) {
            $this->deleteEmail($id);
        }
        header("Location: emails.php");
    }
    // gets the email providers out of the domain parts of email address
    private function getProviders($emails) {
        $providers=array();
        foreach ($emails as $email) {
            $domain=explode("@",$email["email"])[1];
            $domainParts=explode(".",$domain);
            $provider=$domainParts[count($domainParts)-2];
            if(!in_array($provider,$providers)) array_push($providers,$provider);
        }
        return $providers;
    }
}