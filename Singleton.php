<?php
/**
 * This is just a singleton without any further features.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Singleton {
	/** @var Singleton  */
	private static $instance = null;

	/**
	 * @var string
	 */
	private static $data = '';

	/**
	 * @var string
	 */
	private $id = '';

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->id = md5(uniqid(microtime(false) . mt_rand(), true));
	}

	/**
	 * Gets (and if necessary, creates) the only instance.
	 *
	 * @return Singleton
	 */
	public function getInstance() {
		if (self::$instance === null) {
			self::$instance = new Singleton();
		}

		return self::$instance;
	}

	/**
	 * @return string the object ID (an MD5 hash)
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string a random data generated only once for this class
	 */
	public static function getStaticData() {
		if (self::$data == '') {
			self::$data = uniqid(microtime(false) . mt_rand(), true);
		}

		return self::$data;
	}
}