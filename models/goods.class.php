<?

class Goods {

	public static function getGoods() {
		$goods = db::getInstance()->Select("SELECT * FROM goods");
		if (!$goods)
			return false;
		return $goods;
	}

	public static function getItem($id) {
		$good = db::getInstance()->selectOne("SELECT*FROM goods WHERE id = :id", ['id' => $id]);
		if (!$good)
			return false;
		return $good;
	}
}

