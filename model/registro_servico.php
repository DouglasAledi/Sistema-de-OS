<?php
    class registro{
        public function __construct(
            private int $id,
            private string $titulo,
            private string $nomeCliente,
            private string $descricao,
            private DateTime $dataRegistro,
            private int $status){
        }
        public function pegarID():int{
            return $this->id;
        }
        public function pegarTitulo():string{
            return $this->titulo;
        }
        public function pegarNomeCliente():string{
            return $this->nomeCliente;
        }
        public function pegarDescricao():string{
            return $this->descricao;
        }
        public function pegarDataFormatada():string{
            return $this->dataRegistro->format("d/m/Y");
        }
        public function pegarStatusPorExtenso():string{
            return match($this->status){
                1 => "Pendente",
                2 => "Em andamento",
                3 => "Finalizado",
                4 => "Cancelado",
                default => "Desconhecido"
            };
        }
        public function paraArray():array{
            return [
                "id" => $this->id,
                "titulo" => $this->titulo,
                "nomeCliente" => $this->nomeCliente,
                "descricao" => $this->descricao,
                "dataRegistro" => $this->pegarDataFormatada(),
                "status" => $this->pegarStatusPorExtenso()
            ];
        }
    }
?>