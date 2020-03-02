<?
class Admin {

	public static function editGood ($id, $name, $desc_short, $desc_full, $price, $health, $taste, $aroma, $mouth, $picture) {
		$result =  db::getInstance()->Query(
				"UPDATE goods 
				SET name = '$name', `desc-short` = '$desc_short', `desc-full` = '$desc_full',
				  price = $price, health = '$health', taste = '$taste', aroma = '$aroma',
				   mouth = '$mouth', picture = '$picture' 
				WHERE id = $id"
			)->rowCount();
		if(!$result) 
			return false;
		return true;
	} 
// addGood ($name, $desc_short, $desc_full, $price, $health, $taste, $aroma, $mouth, $picture)
	public static function addGood ($args) {

		$values = [];
		foreach ($args as $arg) {
			if($arg == 'null') {
				$values[] = 'null';
			} else {
				$values[] = "'$arg'";
			}
		}
		$values_s = implode(',',$values);

		$result =  db::getInstance()->Query("INSERT INTO goods (name, `desc-short`, `desc-full`, price, health, taste, aroma, mouth, picture) VALUES ($values_s)")->rowCount();
		if(!$result)
			return false;
		return true;
	}

	public static function deleteGood($id) {
		$result =  db::getInstance()->Query("DELETE FROM goods WHERE id=:id",['id' => $id]);
		if(!$result) 
			return false;
		return true;
	}

} 
