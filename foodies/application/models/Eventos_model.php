<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class eventos_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get( $id ) {
		if( $id == null ){
			$sql = "
				SELECT * FROM eventos";
		}
		else if( $id > 0 ){
			$sql = "
				SELECT * FROM eventos WHERE IdEvento = ".$id."";
		} 
		else if( $id == 0 ) {
			$sql = "SELECT * FROM eventos";
		}
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function insert( $nombre, $descripcion, $fecha, $region,
							$comuna, $direccion, $menu, $menu_tipo,
							$menu_tiempo, $cant_chef, $chef, $maridaje,
							$fecha_cierre, $min, $max, $precio, $descuento, 
							$fecha_descuento, $publicacion, $comentario) 
	{
	
		$fecha2				= explode("/",$fecha);
		$_fecha				= $fecha2[2].'-'.$fecha2[1].'-'.$fecha2[0];
		$fecha_cierre2		= explode("/",$fecha_cierre);
		$_fecha_cierre		= $fecha_cierre2[2].'-'.$fecha_cierre2[1].'-'.$fecha_cierre2[0];
	
		if( $descuento != '' && $descuento != '0' ){
		
			if( $fecha_descuento != null && $fecha_descuento != '' ){
				$fecha_descuento	= explode("/",$fecha_descuento);
				$_fecha_descuento	= $fecha_descuento[2].'-'.$fecha_descuento[1].'-'.$fecha_descuento[0];
			}
			
			$data = array(
				'IdServicio' => '1',
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Fecha_Evento' => $_fecha,
				'Region' => $region,
				'Comuna' => $comuna,
				'Direccion' => $direccion,
				'Menu_Nombre' => $menu,
				'Menu_TipoComida' => $menu_tipo,
				'Menu_TiemposMenu' => $menu_tiempo,
				'Cantidad_deChefs' => $cant_chef,
				'Chef_Encargado' => $chef,
				'Maridaje' => $maridaje,
				'Fecha_CierreVentas' => $_fecha_cierre,
				'Cantidad_Minima' => $min,
				'Cantidad_Maxima' => $max,
				'Precio' => $precio, 
				'Descuento' => $descuento,
				'Fecha_Max_AplicaDescto' => $_fecha_descuento,
				'Indicacion_Publicacion' => $publicacion, 
				'Comentario' => $comentario,
				'Estado' => '31', 
				'Modificacion_Fecha' => date('Y-m-d', time())
			);
		}else{
			$data = array(
				'IdServicio' => '1',
				'Nombre' => $nombre, 
				'Descripcion' => $descripcion, 
				'Fecha_Evento' => $_fecha,
				'Region' => $region,
				'Comuna' => $comuna,
				'Direccion' => $direccion,
				'Menu_Nombre' => $menu,
				'Menu_TipoComida' => $menu_tipo,
				'Menu_TiemposMenu' => $menu_tiempo,
				'Cantidad_deChefs' => $cant_chef,
				'Chef_Encargado' => $chef,
				'Maridaje' => $maridaje,
				'Fecha_CierreVentas' => $_fecha_cierre,
				'Cantidad_Minima' => $min,
				'Cantidad_Maxima' => $max,
				'Precio' => $precio, 
				'Indicacion_Publicacion' => $publicacion,
				'Comentario' => $comentario,
				'Estado' => '31',
				'Modificacion_Fecha' => date('Y-m-d', time())
			);
		}
		return $this->db->insert('eventos', $data);
		
	}
	
	public function update( $id, $nombre, $descripcion, $fecha, $region,
							$comuna, $direccion, $menu, $menu_tipo,
							$menu_tiempo, $cant_chef, $chef, $maridaje,
							$fecha_cierre, $min, $max, $precio, $descuento, 
							$fecha_descuento, $publicacion, $comentario,
							$estado) 
	{
	
		$fecha				= explode("/",$fecha);
		$_fecha				= $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
		$fecha_cierre		= explode("/",$fecha_cierre);
		$_fecha_cierre		= $fecha_cierre[2].'-'.$fecha_cierre[1].'-'.$fecha_cierre[0];
		
		if( $descuento != '' && $descuento != '0' ){
		
			if( $fecha_descuento != null && $fecha_descuento != '' ){
				$fecha_descuento	= explode("/",$fecha_descuento);
				$_fecha_descuento	= $fecha_descuento[2].'-'.$fecha_descuento[1].'-'.$fecha_descuento[0];
			}
			
			$data = array( 
				'Nombre' => $nombre, 'Descripcion' => $descripcion, 'Fecha_Evento' => $_fecha, 'Region' => $region,
				'Comuna' => $comuna, 'Direccion' => $direccion, 'Menu_Nombre' => $menu, 'Menu_TipoComida' => $menu_tipo,
				'Menu_TiemposMenu' => $menu_tiempo, 'Cantidad_deChefs' => $cant_chef, 'Chef_Encargado' => $chef, 'Maridaje' => $maridaje,
				'Fecha_CierreVentas' => $_fecha_cierre, 'Cantidad_Minima' => $min, 'Cantidad_Maxima' => $max, 'Precio' => $precio, 
				'Descuento' => $descuento, 'Fecha_Max_AplicaDescto' => $_fecha_descuento, 'Indicacion_Publicacion' => $publicacion, 
				'Comentario' => $comentario, 'Estado' => $estado, 'Modificacion_Fecha' => date('Y-m-d', time())
			);
		}else{
			$data = array( 
				'Nombre' => $nombre, 'Descripcion' => $descripcion, 'Fecha_Evento' => $_fecha, 'Region' => $region,
				'Comuna' => $comuna, 'Direccion' => $direccion, 'Menu_Nombre' => $menu, 'Menu_TipoComida' => $menu_tipo,
				'Menu_TiemposMenu' => $menu_tiempo, 'Cantidad_deChefs' => $cant_chef, 'Chef_Encargado' => $chef, 'Maridaje' => $maridaje,
				'Fecha_CierreVentas' => $_fecha_cierre, 'Cantidad_Minima' => $min, 'Cantidad_Maxima' => $max, 'Precio' => $precio, 
				'Indicacion_Publicacion' => $publicacion, 'Comentario' => $comentario, 'Estado' => $estado, 
				'Modificacion_Fecha' => date('Y-m-d', time())
			);
		}
		$this->db->set( $data ); 
		$this->db->where( 'IdEvento' , $id ); 
		$this->db->update( 'eventos', $data );
	}
	
	public function delete( $id ) {
		$this->db->where( 'IdEvento' , $id );
		return $this->db->delete( 'eventos' );
	}
}