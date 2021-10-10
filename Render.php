<?php

class Render
{

	public $headerData;
	public $footerData;

	function __construct() {
		$this->headerData = [
			'title'=>'Soap parser task'
		];
	}

	protected function render(string $file = '', array $data = null, bool $header = true, bool $footer = true): void {
		
		$filePath = $this->validateFile($file,'/views/');

		if($header)
			$this->render(STATIC_VIEW_BLOCKS['header'],$this->headerData,false,false);

		include $filePath; // Provided data will be accessible on $data

		if($footer)
			$this->render(STATIC_VIEW_BLOCKS['footer'],$this->footerData,false,false);

	}

	// If validation succeeds the method returns its includable path
	private function validateFile(string $file = '', string $path) {
		if(empty($file))
			throw new Exception('View file must be provided');

		$filePath = __DIR__.$path.$file.'.php';

		if(!file_exists($filePath))
			throw new Exception('View file not found');

		return $filePath;
	}

	protected function loadHelper(string $file = '', string $path = '/helpers/') {
		$filePath = $this->validateFile($file, $path);
		include $filePath;
	}

}