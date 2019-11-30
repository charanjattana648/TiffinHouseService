<?php

/**
 *  $companyName name of the company 
 *  $aboutCompany description of company
 */
class AboutUs
{
    private $companyName;
    private    $aboutCompany;

    public function __construct()
    { }

    public function setData($companyName, $aboutCompany)
    {
        $this->companyName = $companyName;
        $this->aboutCompany = $aboutCompany;
    }

    //
    public function getCompanyName(): string
    {
        return $this->companyName;
    }
    public function getAboutCompany(): string
    {
        return $this->aboutCompany;
    }
}
?>