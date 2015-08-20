<?
class rindjael{
	protected $td;
	protected $iv;
	protected $ks;
	protected $key;
	function __construct(){
		$this->td=mcrypt_module_open('rijndael-256', '', 'ofb', '');
		$this->iv=mcrypt_create_iv(mcrypt_enc_get_iv_size($this->td), MCRYPT_DEV_RANDOM);
		$this->ks=mcrypt_enc_get_key_size($this->td);
		//$this->key = substr(md5('very secret key'), 0, $this->ks);
		$this->key = substr(sha1('very secret key'), 0, $this->ks);
	}
	function encrypt(){
		$info="This is very important data";
		mcrypt_generic_init($this->td, $this->key, $this->iv);
		$encrypted = mcrypt_generic($this->td, $info);
		mcrypt_generic_deinit($this->td);
		//mcrypt_module_close($this->td);
		return $encrypted;
	}
	function decrypt($info){
		mcrypt_generic_init($this->td, $this->key, $this->iv);

		/* Decrypt encrypted string */
	   $decrypted = mdecrypt_generic($this->td, $info);

		/* Terminate decryption handle and close module */
		mcrypt_generic_deinit($this->td);
		mcrypt_module_close($this->td);

		/* Show string */
	   return trim($decrypted) . "\n";
	   //echo trim($decrypted) . "\n";
	}
}

$rindjael=new rindjael();
$data= $rindjael->encrypt();
echo $rindjael->decrypt($data);
?>