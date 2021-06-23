<?php
 // Importar o modulo
    require("phplot-6.2.0/phplot.php");
    // Instanciar o grafico com tamanho pre-definido
    // Deixar em branco faz com que o grafico encaixe na janela
    $grafico = new PHPlot(1000,600);
    // Definindo o formato final da imagem
    $grafico->SetFileFormat("png");
    // Definindo o titulo do grafico
    $grafico->SetTitle("Casos de doenças X Bairros");
    // Tipo do grafico
    // Por ser: lines, bars, boxes, bubbles, candelesticks, candelesticks2, linepoints, ohlc, pie, points, squared, stackedarea, stackedbars, thinbarline
    $grafico->SetPlotType("bars");
    // Titulo dos dados no eixo Y
    $grafico->SetYTitle("Casos");
    // Titulo dos dados no eixo X
    $grafico->SetXTitle("Bairro");
    // dados do grafico
 
    require_once('conexao.php');
    //faz a conexao com o BD usando PDO, precisa estar habilitado nas opcoes PHP
    //armazena os dados da intrucao SQL
    $resultado = ("SELECT endereco_paciente.bair_ende_paci,
								      COUNT(paciente.pk_paci)
							   FROM endereco_paciente
							   JOIN paciente
							   ON paciente.fk_ende_paci = endereco_paciente.pk_ende_paci
							   WHERE paciente.fk_doen = 2
							   AND endereco_paciente.cida_ende_paci = 'CabrÃ¡lia Paulista'
							   GROUP BY endereco_paciente.bair_ende_paci,
							            endereco_paciente.cida_ende_paci");
    //cria um array vazio
    $dados = array();
    //percorre o loop preenchendo o array
    foreach($resultado as $res){
        //cria um array auxiliar para que a cada linha ele comece um novo, pois eh varios array dentro de um array
        $aux = array();
        $idPost = $res['bair_ende_paci'];
        //armazena o ID do post e concatena abaixo para melhorar o visual
        array_push($aux, "bairro-$idPost" , $res['COUNT(paciente.pk_paci)']);
        //add o array novo dentro do array unico criado antes do loop
        array_push($dados, $aux);
    }
    //seta os dados
    $grafico->SetDataValues($dados);
    //Exibimos o gráfico
    $grafico->DrawGraph();
?>