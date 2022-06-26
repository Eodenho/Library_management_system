<?php

class contracts{

    private $sutartys_lentele ="";
    private $skaitytojai_lentele = "";
    private $darbuotojai_lentele = "";
    private $knygos_lentele = "";
    private $autoriai_lentele = "";
    private $zanrai_lentele = "";
    private $kalbos_lentele = "";
    private $leidyklos_lentele = "";


    public function __construct(){
        
        $this->sutartys_lentele = "sutartis";
        $this->skaitytojai_lentele = "skaitytojas";
        $this->darbuotojai_lentele = "darbuotojas";
        $this->knygos_lentele = "knyga";
        $this->autoriai_lentele = "autorius";
        $this->zanrai = "zanras";
        $this->kalbos_lentele = "kalba";
        $this->leidyklos_lentele = "leidykla";

    }

    public function getContractsList($limit = null, $offset = null) {

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

        $query = " select {$this->sutartys_lentele}.nr,
        {$this->sutartys_lentele}.isdavimo_data,
        {$this->sutartys_lentele}.grazinimo_data,
        {$this->skaitytojai_lentele}.vardas as skaitvardas,
        {$this->skaitytojai_lentele}.pavarde as skaitpavarde,
        {$this->darbuotojai_lentele}.vardas as darbvardas,
        {$this->darbuotojai_lentele}.pavarde as darbpavarde,
        {$this->knygos_lentele}.pavadinimas
        from {$this->sutartys_lentele} 
        INNER JOIN
        {$this->skaitytojai_lentele} ON
        {$this->sutartys_lentele}.fk_SKAITYTOJASnr = {$this->skaitytojai_lentele}.nr
        INNER JOIN
        {$this->darbuotojai_lentele} ON
        {$this->sutartys_lentele}.fk_DARBUOTOJASnr = {$this->darbuotojai_lentele}.nr
        INNER JOIN
		{$this->knygos_lentele} ON
		{$this->sutartys_lentele}.fk_KNYGAnr = {$this->knygos_lentele}.nr
        ORDER BY {$this->sutartys_lentele}.nr
        limit {$limit} offset {$offset}
        ";

        $data = mysql::select($query);

        return $data;
    }

    public function getContractListCount(){
        $query = "
        select count({$this->sutartys_lentele}.nr) as kiekis
        from {$this->sutartys_lentele}
        ";

        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }
    public function getReaders(){

        $query = " SELECT *
                    FROM `{$this->skaitytojai_lentele}`";

        $data = mysql::select($query);

        return $data;
    }
    public function getEmployees(){

        $query = " SELECT *
                    FROM `{$this->darbuotojai_lentele}`";

        $data = mysql::select($query);

        return $data;
    }
    public function getBooks(){

        return mysql::select("select {$this->knygos_lentele}.nr as book_nr,
        {$this->knygos_lentele}.pavadinimas as knygos_pav
         from {$this->knygos_lentele}");
    }
    public function updateContract($data) {
		$data = mysql::escapeFieldsArrayForSQL($data);

		$query = "  UPDATE `{$this->sutartys_lentele}`
					SET    `isdavimo_data`='{$data['isdavimo_data']}',
						   `grazinimo_data`='{$data['grazinimo_data']}',
						   `fk_SKAITYTOJASnr`='{$data['fk_SKAITYTOJASnr']}',
						   `fk_DARBUOTOJASnr`='{$data['fk_DARBUOTOJASnr']}',
						   `fk_KNYGAnr`='{$data['fk_KNYGAnr']}'
					WHERE `nr`='{$data['contract_nr']}'";
		mysql::query($query);
	}

    public function getContract($id){
        
        $id = mysql::escapeFieldForSQL($id);

        $query = "select *
        from {$this->sutartys_lentele}
        where {$this->sutartys_lentele}.nr = {$id}";

        $data = mysql::select($query);
		
		return $data[0];
    }
    public function getEmployee($id){
        $id = mysql::escapeFieldForSQL($id);

        return mysql::select("select * from {$this->sutartys_lentele} where fk_DARBUOTOJASnr = {$id}");
    }

	public function insertContract($data) {
		$data = mysql::escapeFieldsArrayForSQL($data);

		$query = "  INSERT INTO `{$this->sutartys_lentele}` 
								(
									`isdavimo_data`,
									`grazinimo_data`,
									`fk_SKAITYTOJASnr`,
									`fk_DARBUOTOJASnr`,
									`fk_KNYGAnr`
								) 
								VALUES
								(
									'{$data['isdavimo_data']}',
                                    '{$data['grazinimo_data']}',
									'{$data['fk_SKAITYTOJASnr']}',
									'{$data['fk_DARBUOTOJASnr']}',
									'{$data['fk_KNYGAnr']}'
								)";
		mysql::query($query);
	}

    public function deleteContract($id){

        $id = mysql::escapeFieldForSQL($id);


        $query = "delete from {$this->sutartys_lentele} 
        where nr = {$id}";

        mysql::query($query);
    }
    public function getContractsByEmployee($dateFrom, $dateTo, $id,$book) {
		$dateFrom = mysql::escapeFieldForSQL($dateFrom);
		$dateTo = mysql::escapeFieldForSQL($dateTo);
		
		$where = "";

        if (!empty($dateFrom) && !empty($dateTo) && !empty($id) && !empty($book)) {
            $where .= "WHERE`{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}' AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}' AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}' AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
        } else {
            $where .= "WHERE 1";
            if (!empty($dateTo)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}'";
            }
            if (!empty($dateFrom)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}'";
            }
            if (!empty($id)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}'";
            }
            if (!empty($book)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
            }
        }
		
		$query = "select {$this->sutartys_lentele}.nr,
        {$this->sutartys_lentele}.isdavimo_data,
        IFNULL(DATE_FORMAT({$this->sutartys_lentele}.grazinimo_data,'%M-%D-%Y'),'Negrąžinta') as grazinimo_data,
        CONCAT({$this->skaitytojai_lentele}.vardas, SPACE(1), {$this->skaitytojai_lentele}.pavarde) as skaitytojas,
        CONCAT({$this->autoriai_lentele}.vardas, SPACE(1), {$this->autoriai_lentele}.pavarde,':', SPACE(1), {$this->knygos_lentele}.pavadinimas) as knyga,
        DATEDIFF(IFNULL({$this->sutartys_lentele}.grazinimo_data,CURRENT_DATE()),{$this->sutartys_lentele}.isdavimo_data) as datedif,
        temp.kiekis,
        laikinas.suma
        from {$this->sutartys_lentele} 
        INNER JOIN
        {$this->skaitytojai_lentele} ON
        {$this->sutartys_lentele}.fk_SKAITYTOJASnr = {$this->skaitytojai_lentele}.nr
        INNER JOIN
		{$this->knygos_lentele} ON
		{$this->sutartys_lentele}.fk_KNYGAnr = {$this->knygos_lentele}.nr
        LEFT JOIN
        {$this->autoriai_lentele} ON
        {$this->knygos_lentele}.fk_AUTORIUSnr = {$this->autoriai_lentele}.nr
        left join ( select sum(DATEDIFF(IFNULL({$this->sutartys_lentele}.grazinimo_data,CURRENT_DATE()),{$this->sutartys_lentele}.isdavimo_data)) as suma, {$this->skaitytojai_lentele}.nr as id
        from {$this->sutartys_lentele} left join {$this->skaitytojai_lentele} 
        on fk_SKAITYTOJASnr = {$this->skaitytojai_lentele}.nr
        {$where}
        GROUP BY 
        {$this->skaitytojai_lentele}.nr) laikinas on laikinas.id = {$this->skaitytojai_lentele}.nr
        left join ( select count(*) as kiekis, {$this->skaitytojai_lentele}.nr as id
        from {$this->sutartys_lentele} left join {$this->skaitytojai_lentele} 
        on fk_SKAITYTOJASnr = {$this->skaitytojai_lentele}.nr
        {$where}
        GROUP BY 
        {$this->skaitytojai_lentele}.nr) temp on temp.id = {$this->skaitytojai_lentele}.nr
        {$where}
        ORDER BY {$this->skaitytojai_lentele}.vardas
        ";
    
		$data = mysql::select($query);

		//
		return $data;
	}
    public function getCountOfContractsByEmployees($dateFrom, $dateTo, $id,$book){
        $dateFrom = mysql::escapeFieldForSQL($dateFrom);
		$dateTo = mysql::escapeFieldForSQL($dateTo);
		
		$where = "";

        if (!empty($dateFrom) && !empty($dateTo) && !empty($id) && !empty($book)) {
            $where .= "WHERE`{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}' AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}' AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}' AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
        } else {
            $where .= "WHERE 1";
            if (!empty($dateTo)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}'";
            }
            if (!empty($dateFrom)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}'";
            }
            if (!empty($id)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}'";
            }
            if (!empty($book)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
            }
        }
        $query = "select count(*) as kiekis
        from {$this->sutartys_lentele} 
        {$where}
        ";

        $data = mysql::select($query);
		//
		return $data;

    }
    public function getMaxCountOfDays($dateFrom, $dateTo, $id,$book){
        $dateFrom = mysql::escapeFieldForSQL($dateFrom);
		$dateTo = mysql::escapeFieldForSQL($dateTo);
		
		$where = "";

        if (!empty($dateFrom) && !empty($dateTo) && !empty($id) && !empty($book)) {
            $where .= "WHERE`{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}' AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}' AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}' AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
        } else {
            $where .= "WHERE 1";
            if (!empty($dateTo)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`>='{$dateFrom}'";
            }
            if (!empty($dateFrom)) {
                $where .= " AND `{$this->sutartys_lentele}`.`isdavimo_data`<='{$dateTo}'";
            }
            if (!empty($id)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_DARBUOTOJASnr`='{$id}'";
            }
            if (!empty($book)) {
                $where .= " AND `{$this->sutartys_lentele}`.`fk_KNYGAnr`='{$book}'";
            }
        }
        $query = "select max(DATEDIFF(IFNULL({$this->sutartys_lentele}.grazinimo_data,CURRENT_DATE()),{$this->sutartys_lentele}.isdavimo_data)) as kiekis
        from {$this->sutartys_lentele} 
        {$where}
        ";

        $data = mysql::select($query);
		//
		return $data;

    }
    public function getEmployeeList()
    {
        return mysql::select("select * from {$this->darbuotojai_lentele}");
    }
}

?>