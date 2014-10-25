<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 02.05.2014
 * Time: 22:44
 */
class UserMeta extends Eloquent {

	protected $table = 'userMeta';
	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	public function user() {
		return $this->belongsTo( 'User','id' );
	}

	/**
	 * @param $id meta bilgisi alınacak  kullanıcı id
	 * @param $key istenilen meta key
	 *
	 * @return bool|mixed
	 */
	public	function getMeta($id,$key){
		$meta=$this->where('metaKey','=',$key)->where('userId','=',$id)->pluck('metaValue');
		return is_null( $meta ) ? false : $meta;
	}

	/**
	 * @param $id meta bilgisi  eklenecek  kullanıcının id numarası
	 * @param $key
	 * @param $value
	 */
	public function setMeta($id,$key,$value){
		if($this->getMeta($id,$key)){
			$this->where('userId','=',$id)->where('metaKey','=',$key)->update(array('metaValue'=>$value));
		}else{
			$this->create(array('userId'=>$id,'metaKey'=>$key,'metaValue'=>$value));
		}
	}

}