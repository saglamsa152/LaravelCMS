<?php namespace App;
use Illuminate\Support\Str;
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 13.12.2014
 * Time: 15:28
 * Proje içinde kullanılacak makroların tanımlanacağı dosya
 */

/**
 * Str::slug() fonksiyonunda kullanılan ascii fonksiyonu ile iconv() fonksiyonu kullanılıyor.
 * iconv() fonksiyonuna "ı" karakteri geldiğinde "iconv(): Detected an illegal character in input string" hatasını  üretiyor.
 * bu hatanın önüne geçmek için aynı işi yapan bu makro kullanılacak
 */
Str::macro('slug_utf8', function($title, $separator = '-')
{
	//$title = static::ascii($title); //comment it out to suport farsi
	$title = str_replace(['ı','ğ','ü','ş','ö','ç','İ','Ğ','Ü','Ş','Ö','Ç'],['i','g','u','s','o','c','I','G','U','S','O','C'],$title);
	// Convert all dashes/underscores into separator
	$flip = $separator == '-' ? '_' : '-';

	$title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

	// Remove all characters that are not the separator, letters, numbers, or whitespace.
	$title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

	// Replace all separator characters and whitespace by a single separator
	$title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

	return trim($title, $separator);

});
