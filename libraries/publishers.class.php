<?php

class publishers{

    private $leidyklos_lentele ="";
    private $salys_lentele = "";
    private $miestai_lentele = "";
    private $knygos_lentele = "";
    private $id="";


    public function __construct(){
        
        $this->leidyklos_lentele = "leidykla";
        $this->miestai_lentele = "miestas";
        $this->salys_lentele = "salis";
        $this->knygos_lentele = "knyga";

    }

    public function getPublisherList($limit = null, $offset = null){

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

        $query = " select {$this->leidyklos_lentele}.nr,
        {$this->leidyklos_lentele}.pavadinimas,
        {$this->salys_lentele}.name as salis,
        {$this->miestai_lentele}.pavadinimas as miestas
        from {$this->leidyklos_lentele} 
        INNER JOIN
        {$this->salys_lentele} ON
        {$this->leidyklos_lentele}.salis = {$this->salys_lentele}.id_SALIS
        INNER JOIN
        {$this->miestai_lentele} ON
        {$this->leidyklos_lentele}.fk_MIESTASnr = {$this->miestai_lentele}.nr
        ORDER BY {$this->leidyklos_lentele}.nr
        limit {$limit} offset {$offset}
        ";

        $data = mysql::select($query);

        return $data;
    }

    public function getPublisherListCount(){
        $query = "
        select count({$this->leidyklos_lentele}.nr) as kiekis
        from {$this->leidyklos_lentele}
        ";

        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function updatePublisher($data){

		$data = mysql::escapeFieldsArrayForSQL($data);

        $query = " update {$this->leidyklos_lentele} set
        pavadinimas = '{$data['pavadinimas']}',
        salis = '{$data['salis']}',
        fk_MIESTASnr = '{$data['fk_MIESTASnr']}'
        where nr = '{$data['nr']}'
        ";
        
        mysql::query($query);
    }

    public function getPublisher($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->leidyklos_lentele}
        where {$this->leidyklos_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
    public function getBook($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->knygos_lentele}
        where {$this->knygos_lentele}.fk_LEIDYKLAnr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }

    public function getCity($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->leidyklos_lentele} where fk_MIESTASnr = {$id}");
    }
    public function getCountry($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->leidyklos_lentele} where salis = {$id}");
    }

    public function insertPublisher($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->leidyklos_lentele} (
            pavadinimas,
            salis,
            fk_MIESTASnr
        )
        values(
            '{$data['pavadinimas']}',
            '{$data['salis']}',
            '{$data['fk_MIESTASnr']}'
        )";

        mysql::query($query);
        $this->id = mysql::getLastInsertedId();
    }

    public function insertBook($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->knygos_lentele} (
            pavadinimas,
            isleidimo_data,
            fk_KALBAnr,
            fk_ZANRASnr,
            fk_AUTORIUSnr,
            fk_LEIDYKLAnr
        )
        values(
            '{$data['knygos_pavadinimas']}',
            '{$data['isleidimo_data']}',
            '{$data['fk_KALBAnr']}',
            '{$data['fk_ZANRASnr']}',
            '{$data['fk_AUTORIUSnr']}',
            '{$data['fk_LEIDYKLAnr']}'
        )";

        mysql::query($query);
    }

    public function getCountries(){

        $query = " SELECT *
                    FROM `{$this->salys_lentele}`";

        $data = mysql::select($query);

        return $data;
    }

    public function getCities(){

        $query = " SELECT *
                    FROM `{$this->miestai_lentele}`";

        $data = mysql::select($query);

        return $data;
    }

    public function deletePublisher($id){

        $id = mysql::escapeFieldForSQL($id);
        
        $query = "delete from {$this->knygos_lentele} 
        where fk_LEIDYKLAnr = {$id}";

        mysql::query($query);

        $query = "delete from {$this->leidyklos_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
    public function deleteBook($id){

        $id = mysql::escapeFieldForSQL($id);
        
        $query = "delete from {$this->knygos_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
}

?>