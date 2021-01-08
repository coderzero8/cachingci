<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class caching extends CI_Controller {

	public function index()
	{

		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		if ( ! $foo = $this->cache->get('foo'))
		{
	        // echo 'Saving to the cache!<br />';
        	// $foo = 'foobarbaz!';
        	// $foo = array('test'=>'foobarbaz!');

        	$this->load->library('Myobject');
        	$foo = new Myobject();
        	
	        // Save into the cache for 5 minutes
	        $this->cache->save('foo', $foo);
		}

		var_dump($foo);

	}

	public function check()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$foo = $this->cache->get('foo');
		var_dump($foo);
	}

	public function info()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		var_dump($this->cache->cache_info());

	}
	public function delete()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));	
		$this->cache->delete('foo');
	}

}
