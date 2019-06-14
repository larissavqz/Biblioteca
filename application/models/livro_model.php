<?php

class Livro_model extends CI_Model {
    
    public function busca_livro($texto, $filtro) {

        $this->load->database('biblioteca');

        if($filtro=='titulo')
        {
            $sql="SELECT livro.id, livro.titulo, livro.autor, livro.editora,  livro.genero, livro.dtpublicacao, livro.secao, livro.qttotal-qtalugado AS qtdisponivel FROM livro WHERE titulo COLLATE UTF8_GENERAL_CI LIKE '%$texto%' ORDER BY titulo DESC";
        }
        if($filtro=='autor')
        {
            $sql="SELECT livro.id, livro.titulo, livro.autor, livro.editora,  livro.genero, livro.dtpublicacao, livro.secao, livro.qttotal-qtalugado AS qtdisponivel FROM livro WHERE autor COLLATE UTF8_GENERAL_CI LIKE '%$texto%' ORDER BY titulo DESC";
        }
        if($filtro=='genero')
        {
            $sql="SELECT livro.id, livro.titulo, livro.autor, livro.editora,  livro.genero, livro.dtpublicacao, livro.secao, livro.qttotal-qtalugado AS qtdisponivel FROM livro WHERE genero COLLATE UTF8_GENERAL_CI LIKE '%$texto%' ORDER BY titulo DESC";
        }        
        $obj=$this->db->query($sql);
        $result=$obj->result_array();
        return $result;
    }
}