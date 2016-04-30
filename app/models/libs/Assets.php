<?php

class Assets{
	
	/**
	 * returns the url for the asset url passed through the parameters for public assets
	 * @param url of the assets relative to the public directory $url
	 * @return url of the asset in accordance with the configurations in the config file string
	 */
	public static function getPublic($url = ""){
		return Config::get("rewriteBase/public").$url;
	}
	
	/**
	 * returns the url for the asset url passed through the parameters for app assets
	 * @param url of the assets relative to the app directory $url
	 * @return url of the asset in accordance with the configurations in the config file string
	 */
	public static function getApp($url = ""){
		return Config::get("rewriteBase/app").$url;
	}
}