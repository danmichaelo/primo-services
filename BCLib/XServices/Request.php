<?php

namespace BCLib\XServices;

require_once('HTTP/Request2.php');

abstract class Request
{

    private $_url = 'http://agama.bc.edu:1701/PrimoWebServices/xservice/';
    private $_arguments = array();
    private $_translator;
    private $_xml;

    public function __construct(Translator $translator)
    {
        $this->_translator = $translator;
    }

    protected function _setUrl($url)
    {
        $this->_url = $url;
    }

    public function send(\HTTP_Request2 $request)
    {
        $this->_url .= '?' . implode('&', $this->_arguments);

        $request->setUrl($this->_url);
        $this->_xml = $request->send()->getBody();
        $xml = simplexml_load_string($this->_xml);
        return $this->_translator->translate($xml);
    }

    protected function _addArgument($parameter, $value)
    {
        $this->_arguments[] = "$parameter=$value";
    }

    public function setInstitution($institution)
    {
        $this->_addArgument('institution', $institution);
    }

    public function getXML()
    {
        return $this->_xml;
    }
    
    public function __toString()
    {
        return $this->_url;
    }

}