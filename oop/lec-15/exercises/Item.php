<?php
class  Item {
	/**
	 * プロパティ
	 */
	private $id;
	private $name;
	private $price;

	/**
	 * コンストラクタ
	 */
	function __construct(string $name, int $price) {
		$this->name = $name;
		$this->price = $price;
	}

	/**
	 * アクセサメソッド群
	 */
	function setId(int $id):void {
		$this->id = $id;
	}
	function getId():int {
		return $this->id;
	}

	function setName(string $name):void {
		$this->name = $name;
	}

	function getName():string {
		return $this->name;
	}

	function setPrice(int $price):void {
		$this->price = $price;
	}

	function getPrice():int {
		return $this->price;
	}
}