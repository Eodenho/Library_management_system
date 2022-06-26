<?php

class books {

	private $kalbos_lentele = '';
	private $zanrai_lentele = '';
	private $autoriai_lentele = '';
	private $leidyklos_lentele = '';
    private $knygos_lentele = '';
	private $sutartys_lentele = '';
	
	public function __construct() {
		$this->zanrai_lentele = 'zanras';
        $this->knygos_lentele = 'knyga';
		$this->kalbos_lentele = 'kalba';
		$this->autoriai_lentele = 'autorius';
		$this->leidyklos_lentele = 'leidykla';
		$this->sutartys_lentele = 'sutartis';

	}
	
	public function getBook($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->knygos_lentele}
        where {$this->knygos_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
	public function getPublisher($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->knygos_lentele} where fk_LEIDYKLAnr = {$id}");
    }
	
	public function updateBook($data) {
		$data = mysql::escapeFieldsArrayForSQL($data);

		$query = "  UPDATE `{$this->knygos_lentele}`
					SET    `pavadinimas`='{$data['knygos_pavadinimas']}',
						   `isleidimo_data`='{$data['isleidimo_data']}',
						   `fk_KALBAnr`='{$data['fk_KALBAnr']}',
						   `fk_ZANRASnr`='{$data['fk_ZANRASnr']}',
						   `fk_AUTORIUSnr`='{$data['fk_AUTORIUSnr']}',
						   `fk_LEIDYKLAnr`='{$data['fk_LEIDYKLAnr']}'
					WHERE `nr`='{$data['book_nr']}'";
		mysql::query($query);
	}

	public function insertBook($data) {
		$data = mysql::escapeFieldsArrayForSQL($data);

		$query = "  INSERT INTO `{$this->knygos_lentele}` 
								(
									`pavadinimas`,
									`isleidimo_data`,
									`fk_KALBAnr`,
									`fk_ZANRASnr`,
									`fk_AUTORIUSnr`,
									`fk_LEIDYKLAnr`
								) 
								VALUES
								(
									'{$data['knygos_pavadinimas']}',
                                    '{$data['isleidimo_data']}',
									'{$data['fk_KALBAnr']}',
									'{$data['fk_ZANRASnr']}',
									'{$data['fk_AUTORIUSnr']}',
									'{$data['fk_LEIDYKLAnr']}'
								)";
		mysql::query($query);
	}
	
	public function getBooksList($limit = null, $offset = null) {

			if($limit) {
				$limit = mysql::escapeFieldForSQL($limit);
			}
			if($offset) {
				$offset = mysql::escapeFieldForSQL($offset);
			}
			
			$limitOffsetString = "";
			if(isset($limit)) {
				$limitOffsetString .= " LIMIT {$limit}";
			}
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}
	
			$query = " select {$this->knygos_lentele}.nr,
			{$this->knygos_lentele}.pavadinimas,
			{$this->knygos_lentele}.isleidimo_data,
			{$this->zanrai_lentele}.pavadinimas as zanras,
			{$this->kalbos_lentele}.pavadinimas as kalba,
			{$this->autoriai_lentele}.vardas,
			{$this->autoriai_lentele}.pavarde,
			{$this->leidyklos_lentele}.pavadinimas as leidykla
			from {$this->knygos_lentele} 
			INNER JOIN
			{$this->kalbos_lentele} ON
			{$this->knygos_lentele}.fk_KALBAnr = {$this->kalbos_lentele}.nr
			INNER JOIN
			{$this->zanrai_lentele} ON
			{$this->knygos_lentele}.fk_ZANRASnr = {$this->zanrai_lentele}.nr
			INNER JOIN
			{$this->autoriai_lentele} ON
			{$this->knygos_lentele}.fk_AUTORIUSnr = {$this->autoriai_lentele}.nr
			INNER JOIN
			{$this->leidyklos_lentele} ON
			{$this->knygos_lentele}.fk_LEIDYKLAnr = {$this->leidyklos_lentele}.nr
			ORDER BY {$this->knygos_lentele}.nr
			limit {$limit} offset {$offset}
			";
	
			$data = mysql::select($query);
	
			return $data;
		}


	public function getBooksListCount() {

		$query = "
        select count({$this->knygos_lentele}.nr) as kiekis
        from {$this->knygos_lentele}
        ";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	public function deleteBook($id) {
		$id = mysql::escapeFieldForSQL($id);

		$query = "delete from {$this->sutartys_lentele} 
        where fk_KNYGAnr = {$id}";

        mysql::query($query);

		$query = "  DELETE FROM `{$this->knygos_lentele}`
					WHERE `nr`='{$id}'";
		mysql::query($query);
	}
	


	public function getLanguageList() {
		$query = "  SELECT *
					FROM `{$this->kalbos_lentele}`";
		$data = mysql::select($query);
		
		//
		return $data;
	}
	public function getPublisherList() {
		$query = "  SELECT *
					FROM `{$this->leidyklos_lentele}`";
		$data = mysql::select($query);
		
		//
		return $data;
	}
	public function getGenreList() {
		$query = "  SELECT *
					FROM `{$this->zanrai_lentele}`";
		$data = mysql::select($query);
		
		//
		return $data;
	}
	public function getAuthorList() {
		$query = "  SELECT *
					FROM `{$this->autoriai_lentele}`";
		$data = mysql::select($query);
		
		//
		return $data;
	}
	
	
}