<?php
require_once "../classes/Building.php";
require_once "../classes/IIntelligence.php";

class Apartment extends Building implements IIntelligence {
	/**
	 * プロパティ
	 */
	private $fee;

	/**
	 * @override
	 */
	function isAirConditioned():string {
		return "冷暖房完備しています。";
	}

	/**
	 * @override
	 */
	function isConnectedWiFi():string {
		return "常時WiFi接続できます。";
	}

	/**
	 * @override
	 * 諸元文字列を取得する。
	 * @return string 諸元文字列：書式「アパート名》の高さは《高さ》mです。ひと月の家賃は《賃料》円です。」
	 */
	function createSpec():string {
		$spec = parent::createSpec();
		$spec .= "ひと月の家賃は{$this->fee}円です。";
		return $spec;
	}
}