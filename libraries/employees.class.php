<?php

class employees{

    private $lytys_lentele ="";
    private $miestai_lentele = "";
    private $darbuotojai_lentele;
    private $sutartys_lentele;

    public function __construct(){
        
        $this->lytys_lentele = "lytis";
        $this->miestai_lentele = "miestas";
        $this->darbuotojai_lentele = "darbuotojas";
        $this->sutartys_lentele = "sutartis";

    }

    public function getEmployeeList($limit = null, $offset = null){

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

        $query = " select {$this->darbuotojai_lentele}.nr,
        {$this->darbuotojai_lentele}.vardas,
        {$this->darbuotojai_lentele}.pavarde,
        {$this->darbuotojai_lentele}.gimimo_data,
        {$this->darbuotojai_lentele}.elektroninis_pastas,
        {$this->lytys_lentele}.name,
        {$this->miestai_lentele}.pavadinimas
        from {$this->darbuotojai_lentele} 
        INNER JOIN
        {$this->lytys_lentele} ON
        {$this->darbuotojai_lentele}.lytis = {$this->lytys_lentele}.id_LYTIS
        INNER JOIN
        {$this->miestai_lentele} ON
        {$this->darbuotojai_lentele}.fk_MIESTASnr = {$this->miestai_lentele}.nr
        ORDER BY {$this->darbuotojai_lentele}.nr
        limit {$limit} offset {$offset}
        ";

        $data = mysql::select($query);

        return $data;
    }

    public function getEmployeeListCount(){
        $query = "
        select count({$this->darbuotojai_lentele}.nr) as kiekis
        from {$this->darbuotojai_lentele}
        ";

        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function updateEmployee($data){

		$data = mysql::escapeFieldsArrayForSQL($data);

        $query = " update {$this->darbuotojai_lentele} set
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

    public function getEmployee($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->darbuotojai_lentele}
        where {$this->darbuotojai_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
    public function getCity($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->darbuotojai_lentele} where fk_MIESTASnr = {$id}");
    }

    public function insertEmployee($data){

        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "insert into {$this->darbuotojai_lentele} (
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
    public function getContractsList($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->sutartys_lentele}
        where fk_DARBUOTOJASnr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
    public function deleteContract($id, $isdavimo_data, $grazinimo_Data) {
		$id = mysql::escapeFieldForSQL($id);
		$isdavimo_data = mysql::escapeFieldForSQL($isdavimo_data);
		$grazinimo_Data = mysql::escapeFieldForSQL($grazinimo_Data);
		
		$query = "  DELETE FROM `{$this->sutartys_lentele}`
					WHERE `nr`='{$id}' AND `isdavimo_data`='{$isdavimo_data}' AND `grazinimo_Data`='{$grazinimo_Data}'";
		mysql::query($query);
	}

    public function deleteEmployee($id){

        $id = mysql::escapeFieldForSQL($id);

        $query = "delete from {$this->sutartys_lentele} 
        where fk_DARBUOTOJASnr = {$id}";

        mysql::query($query);

        $query = "delete from {$this->darbuotojai_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
}

?>