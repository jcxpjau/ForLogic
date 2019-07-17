<?php

class Functions extends Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function process( $post )
    {
        if ( is_array( $post ) )
        {
            try {
                $action = $post[ 'action' ];
                if ( method_exists( $this , $action ) ) {
                    $this->$action($post);
                } else {
                    throw new Exception("Ocorreu um erro no processamento!");
                }
            } catch ( Exception $e) {
                $this->result[ 'error' ] = $e->getMessage();
            }
        }
        return $this->result;
    }
}