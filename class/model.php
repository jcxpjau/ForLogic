<?php

class Model extends Connect
{
    public $result = array(
        'response'  =>  false,
        'error'     =>  false
    );

    public function __construct() {
        parent::__construct();
    }

    public function insert_client( $data )
    {
        if ( is_array( $data ) ) {
            $query = "INSERT INTO clients ( name_client, contact_client, date_client ) VALUES( :name_clients, :contact_clients, :date_clients )";
            try {
                $sth = $this->db->prepare($query);
                $sth->bindParam(':name_clients', $data['_name']);
                $sth->bindParam(':contact_clients', $data['_contact']);
                $date = date( 'Y-m-d' , strtotime( $data[ '_date' ] ) );
                $sth->bindParam(':date_clients', $date );
                $this->result[ 'response' ] = $sth->execute();
            } catch (PDOException $e) {
                $this->result[ 'error' ] = $e->getMessage();
            }
            return $this->result;
        }
    }
    public function get_clients()
    {
        $query = "SELECT id_client, name_client FROM clients ";
        try {
            $sth = $this->db->prepare($query);
            $sth->execute();
            $this->result[ 'response' ] = $sth->fetchAll(PDO::FETCH_OBJ );
        } catch (PDOException $e) {
            $this->result[ 'error' ] = $e->getMessage();
        }
        return $this->result;
    }
    public function insert_survey( $data )
    {
        if ( is_array( $data ) ) {
            try {
                $date = $data['_year'] . '-' . $data['_month'] . '-' . '01';
                $clients = serialize($data['_clients']);
                $check = "SELECT date_survey FROM surveys WHERE date_survey = :date_surveys ";
                $sth = $this->db->prepare($check);
                $sth->bindParam(':date_surveys', $date);
                $res = $sth->execute();
                $res = $sth->fetchAll(PDO::FETCH_OBJ);
                if (is_array( $res ) && empty( $res )) {
                    $query = 'INSERT INTO surveys ( date_survey, clients_survey ) VALUES( :date_surveys, :clients_surveys  )';
                    $sth = $this->db->prepare( $query );
                    $sth->bindParam(':date_surveys', $date );
                    $sth->bindParam(':clients_surveys', $clients );
                    $this->result[ 'response' ] = $sth->execute();
                } else {
                    $this->result[ 'error' ]= "Já foi realizada uma pesquisa no mês selecionado!";
                }
            } catch (PDOException $e) {
                $this->result[ 'error' ] = $e->getMessage();
            }
            return $this->result;
        }
    }
    public function insert_question($data)
    {
        if ( is_array( $data ) ) {
            $query = 'UPDATE clients SET category_client = :category, reason_client = :reason, last_survey = :last_survey WHERE id_client = :id ';
            try {
                $sth = $this->db->prepare($query);
                $date = date( 'Y-m-d' );
                $category = $this->get_category( (int) $data[ '_score' ] );
                $sth->bindParam(':category', $category  );
                $sth->bindParam(':reason', $data[ '_reason' ] );
                $sth->bindParam(':id', $data[ '_id' ] );
                $sth->bindParam(':last_survey', $date );
                $this->result[ 'response' ] = $sth->execute();
            } catch (PDOException $e) {
                $this->result[ 'error' ] = $e->getMessage();
            }
            return $this->result;
        }
    }
    public function get_category( $score )
    {
        switch ( $score )
        {
            case ( $score > 8  ):
                $category = 'Promotores';
                break;
            case ( $score > 6 && $score < 9  ):
                $category = 'Neutros';
                break;
            case ( $score < 7 ):
                $category = 'Detratores';
                break;
        }
        return $category;
    }
    public function get_survey($data)
    {
        if ( is_array( $data ) ) {
            $query = 'SELECT clients_survey FROM surveys WHERE date_survey = :date_survey';
            try {
                $sth = $this->db->prepare($query);
                $date = $data[ '_year' ] . '-' . $data[ '_month' ] . '-01';
                $sth->bindParam(':date_survey', $date );
                $sth->execute();
                $ids = unserialize( $sth->fetchColumn() );
                if ( $ids ) {
                    $this->result[ 'response' ] = array(
                        'total'         => count( $ids ),
                        'promotores'    => $this->get_count($ids, $date, 'Promotores'),
                        'neutros'       => $this->get_count($ids, $date, 'Neutros'),
                        'detratores'    => $this->get_count($ids, $date, 'Detratores')
                    );
                    $this->result[ 'response']['nps'] = $this->get_nps();
                }
            } catch (PDOException $e) {
                $this->result[ 'error' ] = $e->getMessage();
            }
            return $this->result;
        }
    }
    public function get_count( $ids , $date , $category )
    {
        $query = 'SELECT count( id_client ) FROM clients WHERE id_client IN ( :ids ) AND category_client = :category';
        try {
            $ids = implode(",", $ids);
            $sth = $this->db->prepare($query);
            $sth->bindParam(':ids', $ids );
            $sth->bindParam(':category', $category );
            $sth->execute();
            return $sth->fetchColumn();
        } catch ( PDOException $e ) {
            $this->result[ 'error' ] =  $e->getMessage();
        }
    }
    public function get_nps()
    {
        return ( ($this->result[ 'response'][ 'promotores' ] - $this->result[ 'response'][ 'detratores' ] )  / $this->result[ 'response'][ 'total'] ) * 100;
    }


}