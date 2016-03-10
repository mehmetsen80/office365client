<?php

/**
 * Created by PhpStorm.
 * User: msen
 * Date: 3/10/16
 * Time: 12:04 PM
 */
class JWT
{
    private $aud;
    private $iss;
    private $iat;
    private $nbf;
    private $exp;
    private $ver;
    private $tid;
    private $amr;
    private $oid;
    private $upn;
    private $puid;
    private $sub;
    private $given_name;
    private $family_name;
    private $name;
    private $unique_name;
    private $appid;
    private $appidacr;
    private $scp;
    private $acr;

    public function __construct($jwt_arr){
        $this->aud = $jwt_arr['aud'];
        $this->iss = $jwt_arr['iss'];
        $this->iat = $jwt_arr['iat'];
        $this->nbf = $jwt_arr['nbf'];
        $this->exp = $jwt_arr['exp'];
        $this->ver = $jwt_arr['ver'];
        $this->tid = $jwt_arr['tid'];
        $this->amr = $jwt_arr['amr'];
        $this->oid = $jwt_arr['oid'];
        $this->upn = $jwt_arr['upn'];
        $this->puid = $jwt_arr['puid'];
        $this->sub = $jwt_arr['sub'];
        $this->given_name = $jwt_arr['given_name'];
        $this->family_name = $jwt_arr['family_name'];
        $this->name = $jwt_arr['name'];
        $this->unique_name = $jwt_arr['unique_name'];
        $this->appid = $jwt_arr['appid'];
        $this->appidacr = $jwt_arr['appidacr'];
        $this->scp = $jwt_arr['scp'];
        $this->acr = $jwt_arr['acr'];
    }

    /**
     * @return mixed
     */
    public function getAud()
    {
        return $this->aud;
    }

    /**
     * @param mixed $aud
     */
    public function setAud($aud)
    {
        $this->aud = $aud;
    }

    /**
     * @return mixed
     */
    public function getIss()
    {
        return $this->iss;
    }

    /**
     * @param mixed $iss
     */
    public function setIss($iss)
    {
        $this->iss = $iss;
    }

    /**
     * @return mixed
     */
    public function getIat()
    {
        return $this->iat;
    }

    /**
     * @param mixed $iat
     */
    public function setIat($iat)
    {
        $this->iat = $iat;
    }

    /**
     * @return mixed
     */
    public function getNbf()
    {
        return $this->nbf;
    }

    /**
     * @param mixed $nbf
     */
    public function setNbf($nbf)
    {
        $this->nbf = $nbf;
    }

    /**
     * @return mixed
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param mixed $exp
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    }

    /**
     * @return mixed
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * @param mixed $ver
     */
    public function setVer($ver)
    {
        $this->ver = $ver;
    }

    /**
     * @return mixed
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param mixed $tid
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
    }

    /**
     * @return mixed
     */
    public function getAmr()
    {
        return $this->amr;
    }

    /**
     * @param mixed $amr
     */
    public function setAmr($amr)
    {
        $this->amr = $amr;
    }

    /**
     * @return mixed
     */
    public function getOid()
    {
        return $this->oid;
    }

    /**
     * @param mixed $oid
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }

    /**
     * @return mixed
     */
    public function getUpn()
    {
        return $this->upn;
    }

    /**
     * @param mixed $upn
     */
    public function setUpn($upn)
    {
        $this->upn = $upn;
    }

    /**
     * @return mixed
     */
    public function getPuid()
    {
        return $this->puid;
    }

    /**
     * @param mixed $puid
     */
    public function setPuid($puid)
    {
        $this->puid = $puid;
    }

    /**
     * @return mixed
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * @param mixed $sub
     */
    public function setSub($sub)
    {
        $this->sub = $sub;
    }

    /**
     * @return mixed
     */
    public function getGivenName()
    {
        return $this->given_name;
    }

    /**
     * @param mixed $given_name
     */
    public function setGivenName($given_name)
    {
        $this->given_name = $given_name;
    }

    /**
     * @return mixed
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * @param mixed $family_name
     */
    public function setFamilyName($family_name)
    {
        $this->family_name = $family_name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUniqueName()
    {
        return $this->unique_name;
    }

    /**
     * @param mixed $unique_name
     */
    public function setUniqueName($unique_name)
    {
        $this->unique_name = $unique_name;
    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
    }

    /**
     * @return mixed
     */
    public function getAppidacr()
    {
        return $this->appidacr;
    }

    /**
     * @param mixed $appidacr
     */
    public function setAppidacr($appidacr)
    {
        $this->appidacr = $appidacr;
    }

    /**
     * @return mixed
     */
    public function getScp()
    {
        return $this->scp;
    }

    /**
     * @param mixed $scp
     */
    public function setScp($scp)
    {
        $this->scp = $scp;
    }

    /**
     * @return mixed
     */
    public function getAcr()
    {
        return $this->acr;
    }

    /**
     * @param mixed $acr
     */
    public function setAcr($acr)
    {
        $this->acr = $acr;
    }


    public function toString(){

        return "JWT ==> <br/>
        aud: ".$this->aud."<br/>
        iss: ". $this->iss ."<br/>
        iat: ". $this->iat ."<br/>
        nbf: ". $this->nbf ."<br/>
        exp: ". $this->exp ."<br/>
        ver: ". $this->ver ."<br/>
        tid: ". $this->tid ."<br/>
        amr pwd: ". $this->amr->pwd ."<br/>
        oid: ". $this->oid ."<br/>
        upn: ". $this->upn ."<br/>
        puid: ". $this->puid ."<br/>
        sub: ". $this->sub ."<br/>
        given_name: ". $this->given_name ."<br/>
        family_name: ". $this->family_name ."<br/>
        name: ". $this->name ."<br/>
        unique_name: ". $this->unique_name ."<br/>
        appid: ". $this->appid ."<br/>
        appidacr: ". $this->appidacr ."<br/>
        scp: ". $this->scp ."<br/>
        acr: ". $this->acr;
    }

}