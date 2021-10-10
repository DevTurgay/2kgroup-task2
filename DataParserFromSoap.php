<?php

class DataParserFromSoap extends Render
{
	private $wsdl;
	private $clientParams;
	private $soapDemo = false;
	public  $soapDemoStatus;
	private $dataByName;
	public function __construct(string $wsdl, array $clientParams = [])
	{
		parent::__construct();
		$this->wsdl			= $wsdl;
		$this->clientParams	= $clientParams;

		// instanciate SoapClient
		try{
			$this->soapDemo = new SoapClient($this->wsdl,$this->clientParams);
			$this->soapDemoStatus = ['status'=>'success','message'=>'Soap Client created'];
		}
		catch(SoapFault | Exception $e){
			$this->soapDemoStatus = ['status'=>'error','message'=>$e->getMessage()];
		}
	}

	public function getDataByName(string $funcName, array $callParams = [])
	{
		if (empty($funcName))
			throw new Exception('Function name of the wsdl must be provided');

		// Call Soap Method
		$this->dataByName = $this->soapDemo->__soapCall($funcName,$callParams);
		return $this;
	}

	public function parseDataToHTML() :void
	{
		$xmlParser = new XmlParser($this->dataByName->{'GetByNameResult'}->{'any'});
		$xmlData  = $xmlParser->parseXml2Arr();
	
		$this->render('result_view',$xmlData);
	}
}