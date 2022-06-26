<?php

class languages{

    private $kalbos_lentele = "";

    public function __construct(){
        $this->kalbos_lentele = "kalba";
    }


    public function getLanguageList($limit = null, $offset = null){

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

        $query = " select {$this->kalbos_lentele}.nr,
        {$this->kalbos_lentele}.pavadinimas,
        {$this->kalbos_lentele}.sutrumpinimas
        from {$this->kalbos_lentele} ";

        $data = mysql::select($query);

        return $data;
    }

    public function getLanguageListCount(){
        $query = "
        select count({$this->kalbos_lentele}.nr) as kiekis
        from {$this->kalbos_lentele}
        ";

        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function updateLanguage($data){

		$data = mysql::escapeFieldsArrayForSQL($data);

        $query = " update {$this->kalbos_lentele} set
        pavadinimas = '{$data['pavadinimas']}',
        sutrumpinimas = '{$data['sutrumpinimas']}'
        where nr = '{$data['nr']}'
        ";
        mysql::query($query);
    }

    public function getLanguage($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->kalbos_lentele}
        where {$this->kalbos_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }

    public function insertLanguage($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->kalbos_lentele} (
            pavadinimas,
            sutrumpinimas
        )
        values(
            '{$data['pavadinimas']}',
            '{$data['sutrumpinimas']}'
        )";

        mysql::query($query);
    }

    public function deleteLanguage($id){

        $id = mysql::escapeFieldForSQL($id);

        include 'libraries/books.class.php';
        $book = new books();

        $query = "delete from {$this->kalbos_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
}

?>