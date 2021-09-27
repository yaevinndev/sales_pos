<?php


class Utility_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}
    public function updatelots(){
		$hoy=date("Y-m-d");
         //var_dump($hoy);
		$q1 = $this->db->query("SELECT * from lotesxvencimiento where estado = 0 and fecha_vence<='$hoy'");

		if($q1->num_rows()>0){
			$result=$q1->result_array();
		foreach ($result as $key => $value) {
			$num_l = $value["num_lote"];
			$id_p  = $value["id_producto"];
			$cant_vencida = $value["cantidad"];
			//var_dump($num_l);
			$q2 = $this->db->query("SELECT * from db_items where id = $id_p");
			$q2=$q2->row();
			$stock = $q2->stock;
			//var_dump($stock);
			$new_stock= $stock-$cant_vencida;
			//var_dump($new_stock);
			$q3 = $this->db->query("UPDATE db_items set stock=$new_stock where id = $id_p");

			$q4 = $this->db->query("UPDATE lotesxvencimiento set estado=2 where num_lote = '$num_l'");
		}
		}else{
			//echo "no rows";
		}




	}

}
