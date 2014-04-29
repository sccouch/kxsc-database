<?php
use \Dandelionmood\LastFm\LastFm;

/**
	* A simple test to see if the minimum is working
*/
class LastFmTest extends TestCase
{
	public function testInitialisation()
	{
		$r = $this->_lfm()->album_getShouts(array(
			'artist' => 'cher',
			'album' => 'believe'
		));
		$this->assertObjectHasAttribute( 'shouts', $r );
	}
	
	public function _lfm()
	{
		return new LastFm(
            'b2e00b29c0ddf4974b61129da8550062',
            '6f61ac55407bcc160872b84c3ad9d48c'
		);
	}
}