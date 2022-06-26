<?php 

class authors {

    private $autoriai_lentele = '';
    private $knygos_lentele = '';
	private $lytys_lentele = '';
	private $salys_lentele = '';

    public function __construct() {
        $this->autoriai_lentele = 'autorius';
		$this->knygos_lentele = 'knyga';
		$this->lytys_lentele = 'lytis';
		$this->salys_lentele = 'salis';
    }

    public function getAuthor($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->autoriai_lentele}
        where {$this->autoriai_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
	public function getBook($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->knygos_lentele} where fk_AUTORIUSnr = {$id}");
    }
    public function getAuthorList($limit = null, $offset = null){

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

        $query = " select {$this->autoriai_lentele}.nr,
        {$this->autoriai_lentele}.vardas,
        {$this->autoriai_lentele}.pavarde,
        {$this->autoriai_lentele}.gimimo_data,
        {$this->lytys_lentele}.name as lytis,
        {$this->salys_lentele}.name as salis
        from {$this->autoriai_lentele} 
        INNER JOIN
        {$this->lytys_lentele} ON
        {$this->autoriai_lentele}.lytis = {$this->lytys_lentele}.id_LYTIS
        INNER JOIN
        {$this->salys_lentele} ON
        {$this->autoriai_lentele}.salis = {$this->salys_lentele}.id_SALIS
        ORDER BY {$this->autoriai_lentele}.nr
        limit {$limit} offset {$offset}
        ";

        $data = mysql::select($query);

        return $data;
    }
    public function getAuthorsListCount() {
		$query = "  SELECT COUNT(`nr`) as `kiekis`
					FROM {$this->autoriai_lentele}";
		$data = mysql::select($query);
		
		// 
		return $data[0]['kiekis'];
	}
    public function insertAuthor($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->autoriai_lentele} (
            vardas,
            pavarde,
            gimimo_data,
            lytis,
            salis
        )
        values(
            '{$data['vardas']}',
            '{$data['pavarde']}',
            '{$data['gimimo_data']}',
            '{$data['lytis']}',
            '{$data['salis']}'
        )";

        mysql::query($query);
    }
	public function getGenders(){

        $query = " SELECT *
                    FROM `{$this->lytys_lentele}`";

        $data = mysql::select($query);

        return $data;
    }
	public function getCountries(){

        $query = " SELECT *
                    FROM `{$this->salys_lentele}`";

        $data = mysql::select($query);

        return $data;
    }
    public function deleteAuthor($id) {
		$id = mysql::escapeFieldForSQL($id);

		$query = "  DELETE FROM `{$this->autoriai_lentele}`
					WHERE `nr`='{$id}'";
		mysql::query($query);
	}

    public function updateAuthor($data) {
		$data = mysql::escapeFieldsArrayForSQL($data);

		$query = "  UPDATE `{$this->autoriai_lentele}`
					SET    `vardas`='{$data['vardas']}',
						   `pavarde`='{$data['pavarde']}',
                           `gimimo_data`='{$data['gimimo_data']}',
                           `lytis`='{$data['lytis']}',
                           `salis`='{$data['salis']}'
					WHERE `nr`='{$data['nr']}'";
		mysql::query($query);
	}
    public function getBooksCountOfAuthor($id) {
		$id = mysql::escapeFieldForSQL($id);

		$query = "  SELECT COUNT(`{$this->knygos_lentele}`.`nr`) AS `kiekis`
					FROM `{$this->autoriai_lentele}`
						INNER JOIN `{$this->knygos_lentele}`
							ON `{$this->autoriai_lentele}`.`nr`=`{$this->knygos_lentele}`.`fk_AUTORIUSnr`
					WHERE `{$this->darbuotojai_lentele}`.`nr`='{$id}'";
		$data = mysql::select($query);
	
		//
		return $data[0]['kiekis'];
	}
}













?>