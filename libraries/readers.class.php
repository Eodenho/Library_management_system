<?php

class readers{

    private $lytys_lentele ="";
    private $skaitytojai_lentele = "";
    private $miestai_lentele = "";
    private $sutartys_lentele = "";


    public function __construct(){
        
        $this->lytys_lentele = "lytis";
        $this->skaitytojai_lentele = "skaitytojas";
        $this->miestai_lentele = "miestas";
        $this->sutartys_lentele = "sutartis";


    }

    public function getReaderList($limit = null, $offset = null){

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

        $query = " select {$this->skaitytojai_lentele}.nr,
        {$this->skaitytojai_lentele}.vardas,
        {$this->skaitytojai_lentele}.pavarde,
        {$this->skaitytojai_lentele}.gimimo_data,
        {$this->skaitytojai_lentele}.elektroninis_pastas,
        {$this->lytys_lentele}.name,
        {$this->miestai_lentele}.pavadinimas
        from {$this->skaitytojai_lentele} 
        INNER JOIN
        {$this->lytys_lentele} ON
        {$this->skaitytojai_lentele}.lytis = {$this->lytys_lentele}.id_LYTIS
        INNER JOIN
        {$this->miestai_lentele} ON
        {$this->skaitytojai_lentele}.fk_MIESTASnr = {$this->miestai_lentele}.nr
        ORDER BY {$this->skaitytojai_lentele}.nr
        limit {$limit} offset {$offset}
        ";

        $data = mysql::select($query);

        return $data;
    }

    public function getReaderListCount(){
        $query = "
        select count({$this->skaitytojai_lentele}.nr) as kiekis
        from {$this->skaitytojai_lentele}
        ";

        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function updateReader($data){

		$data = mysql::escapeFieldsArrayForSQL($data);

        $query = " update {$this->skaitytojai_lentele} set
        vardas = '{$data['vardas']}',
        pavarde = '{$data['pavarde']}',
        gimimo_data = '{$data['gimimo_data']}',
        elektroninis_pastas = '{$data['elektroninis_pastas']}',
        lytis = '{$data['lytis']}',
        fk_MIESTASnr = '{$data['fk_MIESTASnr']}'
        where nr = '{$data['nr']}'
        ";
        
        mysql::query($query);
    }

    public function getReader($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->skaitytojai_lentele}
        where {$this->skaitytojai_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
    public function getCity($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->skaitytojai_lentele} where fk_MIESTASnr = {$id}");
    }

    public function insertReader($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->skaitytojai_lentele} (
            vardas,
            pavarde,
            gimimo_data,
            elektroninis_pastas,
            lytis,
            fk_MIESTASnr
        )
        values(
            '{$data['vardas']}',
            '{$data['pavarde']}',
            '{$data['gimimo_data']}',
            '{$data['elektroninis_pastas']}',
            '{$data['lytis']}',
            '{$data['fk_MIESTASnr']}'
        )";

        mysql::query($query);
    }

    public function getGenders(){

        $query = " SELECT *
                    FROM `{$this->lytys_lentele}`";

        $data = mysql::select($query);

        return $data;
    }

    public function GetCities()
    {
        $query = " SELECT *
                    FROM `{$this->miestai_lentele}`";

        $data = mysql::select($query);

        return $data;
    }

    public function deleteReader($id){

        $id = mysql::escapeFieldForSQL($id);

        $query = "delete from {$this->sutartys_lentele} 
        where fk_SKAITYTOJASnr = {$id}";

        mysql::query($query);


        $query = "delete from {$this->skaitytojai_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
}

?>