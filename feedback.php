<!DOCTYPE html>
<html lang="pt-pt">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGV</title>
    <link rel="stylesheet" href="styles.css">
</head>



<body>
    <header>
        <div class="container">
            <h1 id="logo">SIGV</h1>
            <div id="menu-toggle">&#9776;</div> <!-- Botão para abrir o menu -->
            <nav id="menu">
                <ul>
                <li><a href="index.html">Inicio</a></li> <!-- Link para a página inicial -->
                    <li><a href="sobre.html">Sobre nós</a></li> <!-- Link para a página "Sobre nós" -->
                    <li><a href="informacao.html">Informações</a></li> <!-- Link para a página de informações -->
                    <li><a href="contactar.html">Contactar nos</a></li> <!-- Link para a página de contato -->
                    <li><a href="galeria.html">Galeria</a></li> <!-- Link para a página de galeria -->
                    <li><a href="feedback.php">FeedBack de clientes</a></li> <!-- Link para a página de feedback -->
                    <li><a href="parcerias.html">Parcerias</a></li> <!-- Link para a página de parcerias -->
                    <li><a href="login.php" >Administração</a></li>
                </ul>
            </nav>
        </div>
    </header>




<section id="about">
    <div class="container">
        <h2>O que dizem os nossos clientes</h2>
    <div class="content-with-image">
    <div class="feedback">

    <?php
$servername = "localhost"; // ou o IP do seu servidor MySQL
$username = "root"; // Nome de usuário padrão
$password = ""; // A senha do usuário root (deixe vazio se não tiver senha)
$dbname = "feedback";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obter os dados de feedback
$sql = "SELECT ID, nome, empresa, ano_cliente, opiniao FROM feedbacks";
$result = $conn->query($sql);

// Verifica se há resultados e exibe-os
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "    
        <p>" .$row['opiniao'] . "</p>
        <footer>
        <cite>". $row['nome']."<br>" . $row['empresa'].", Cliente desde ". $row['ano_cliente']."</cite>
        </footer>
        ";
    }
} else {
    echo "0 results";
}

// Fecha a conexão
$conn->close();

?>


            <p>“Este programa é uma ferramenta indispensável na nossa atividade pela sua amplitude e atualização constante, tem uma equipa sempre disponível para nos ajudar em qualquer assunto ou problema que surja o que nos dá garantia e tranquilidade ao nosso trabalho. Bem ajam pelo vosso profissionalismo e continuem neste rumo.”</p>
    <footer>
                    <cite>Manuel Alves<br>Funerária O Nazareno, Lda (Amadora), Cliente desde 2004</cite>
    </footer>

<br><br>  
<br><br>

            <p>“Para o agricultor a enxada é a ferramenta mais importante, para o Agente Funerário o Gal é a sua ferramenta mais importante, e neste momento é imprescindível.”</p>
    <footer>
         <cite>Victor Andrade<br> Agência Funerária de Famalicão, Lda (Famalicão), Cliente desde 2007</cite>
    </footer>

<br><br>
<br><br>

            p>“Assistência: Nota 10
                    Simpatia: Nota 10
                    Nas versões: Nota 10
                    Conclusão: Que o GAL continue sempre líder por muitos e bons anos, são os meus votos sinceros.”</p>
    <footer>
        <cite>Carlos Braz<br>Agência Funerária Júlio & Almeida (Lisboa), Cliente desde 1999</cite>
    </footer>

<br><br>  
<br><br>

        <p>“Este programa é uma ferramenta indispensável na nossa atividade pela sua amplitude e atualização constante, tem uma equipa sempre disponível para nos ajudar em qualquer assunto ou problema que surja o que nos dá garantia e tranquilidade ao nosso trabalho. Bem ajam pelo vosso profissionalismo e continuem neste rumo.”</p>
    <footer>
        <cite>Manuel Alves<br>Funerária O Nazareno, Lda (Amadora), Cliente desde 2004</cite>
    </footer>

 <br><br> 
<br><br>

        <p>“Antes de mais os meus mais sinceros parabéns pela celebração do 20º aniversário do GAL, depois dizer que sinto uma dualidade de emoções, uma de alegria  porque no fundo me sinto um pouco o “pai” da criança porque a sua conceção começou numa iniciativa minha e num desafio lançado ao João Pereira, na altura um vizinho (jovem) empresário da minha empresa em Lisboa. 

                    Visando então o colmatar de uma necessidade por mim sentida, pois trabalhando na atividade funerária e não existindo nessa altura absolutamente nenhuma ferramenta deste género no mercado, achei que seria a hora de dar um passo em frente, o que ele de pronto aceitou. 
                    
                    Obrigado João por teres aceite o desafio, pelas muitas noites sem dormir e, principalmente, por teres acreditado num projeto que verdadeiramente  é difícil e que muitos já iniciaram e que rapidamente desistiram. 
                    
                    Obrigado também por a determinada altura te teres dedicado não só ao projeto, mas também, por te envolveres nesta atividade e, de algum modo, teres trazido modernidade e acrescentando mais valias à mesma, continuando a dar o teu melhor e a dinamizá-la, conforme se prova pela tua presença assídua em feiras e eventos da nossa atividade. 
                    
                    Uma tristeza, pois  ainda há quem critique de modo fácil e sem dar valor a quem tenta e todos os dias trabalha para tornar a nossa vida mais fácil (é precisamente esse o objetivo do GAL) e em nada contribui para que esta atividade cresça e se desenvolva… 
                    
                    E uma tristeza pois de repente percebi…. 
                    
                    …já passaram 20 anos… 
                    
                    Obrigado João pelo trabalho desenvolvido, parabéns ao GAL, e voltamos a falar daqui a 20 anos (ao tempo que eu já te aturo…), ok, até lá não me voltes a recordar mais nenhum aniversário.”</p>
    <footer>
         <cite>Carlos Almeida<br>Agência Funerária Pax-Júlia (Beja), Cliente desde 1997</cite>
    </footer>

 <br><br>  
 <br><br>

        <p>“Adérito Silva, Responsável Técnico pela Funerária Barreirense, saúda a empresa SIGV pelos seus 20 anos de existência com anexação de ideias, qualidade e excelência.
                    Saúda também os seus gerentes e colaboradores pelo empenho e dedicação a que se submetem. Reconheço a SIGV como uma empresa moderna, flexível e pioneira nos sistemas informáticos, que trabalha arduamente para servir os seus clientes. Trabalhar sem esta aplicação é seriamente um obstáculo difícil de enfrentar. Parabéns à SIGV, parabéns a equipa que com ela colabora, só assim e com esta forma de agir perante seus clientes se tornará possível levar a nau a bom porto. Parabéns. “GOSTO” “</p>
    <footer>
         <cite>Adérito Silva<br>Funerária Barreirense, Lda (Barreiro), Cliente desde 1999</cite>
    </footer>

  <br><br>  
<br><br>

        <p>“Apesar de pioneiro na utilização do GAL, continuo a ser surpreendido com as suas novas funcionalidades.”</p>
    <footer>
        <cite>António Pereira<br>Funerária das Condominhas (Porto), Cliente desde 1999</cite>
    </footer>


<br><br>   
<br><br>

         <p>“Estando a nossa empresa a utilizar o GAL desde o ano de 2013, manifestamos com agrado e satisfação todas as potencialidades do mesmo, as quais estão sempre em constante evolução e aperfeiçoamento no apoio ao sector funerário. Manifestamos ainda a nossa satisfação com o apoio técnico e disponibilidade por parte da SIGV, sempre que o mesmo foi solicitado da nossa parte. Continuem assim, procurando sempre a perfeição, com competência”</p>
     <footer>
        <cite>Rafael Periquito<br>Agência Funerária Periquito de Rafael Periquito Lda (Cartaxo), Cliente desde 2013</cite>
     </footer>



<br><br>   
<br><br>



        <p>“[…] A minha empresa trabalha com o programa GAL da SIGV praticamente desde sua fundação e, sobre qualidade e agilidade, somente temos a elogiar e agradecer. 

                    As actualizações, no principio do programa, eram feitas em disquetes (e alguns problemas surgiam, telefonemas, chatices, tudo se resolveu), mais tarde em CD com livro de instruções, agora é como todos nós sabemos (basta um click). 
                    
                    São sempre muito prestativos e isso os diferencia. Hoje, mesmo sendo amplamente reconhecidos por seus clientes, não desistem de aperfeiçoar a qualidade de seus serviços. 
                    
                    Que venham os próximos 20 anos. […]”</p>
    <footer>
        <cite>Hugo Vicente<br>Agência Funerária Alcobacense, Lda (Alcobaça), Cliente desde 2001</cite>
    </footer>


<br><br>   
<br><br>

            <p>“Cliente com programa GAL desde Janeiro do ano 2000, não podia deixar de dizer que, sem esta ferramenta de trabalho no setor funerário, acho que dificilmente me iria habituar à gestão de documentos como no passado. Sem dúvida, o melhor programa para o setor. Parabéns aos seus criadores, nomeadamente ao Sr. João Pereira, que está sempre a apoiar-nos em qualquer dúvida. O Nosso bem-haja e votos de continuação com sucesso.”</p>
    <footer>
         <cite>Luís Pereira<br>Agência A Funerária de Coimbra, Lda (Coimbra), Cliente desde 2000</cite>
    </footer>


                
<br><br>   
<br><br>

        <p>“Excelente Programa.
                    Excelente Apoio.
                    Vale por um Funcionário de Escritório (sem ter que pagar Segurança Social e Subsídio de Alimentação).
                    Parabéns.”</p>
    <footer>
        <cite>António Cirne<br>Agência Funerária de Ovar, Lda. (Ovar), Cliente desde 2015</cite>
    </footer>


<br><br>
<br><br>

        <p>“Parabéns para a vossa empresa e todos os vossos colaboradores pelo vosso desempenho e a rapidez com que resolvem todos os problemas que, pela nossa parte, vos temos apresentado “n” vezes e que rapidamente são solucionados duma forma célere e eficaz.
                    Bem Hajam pelo vosso profissionalismo.”</p>
                
    <footer>
        <cite>Fernando Rosa<br>Agência Funerária Moscavide (Moscavide), Cliente desde 2012</cite>
    </footer>

<br><br>
<br><br>


        <p>“Muito fácil e intuitivo de utilizar, facilita-nos muito o nosso trabalho no dia-a-dia, poupando-nos tempo e dinheiro.”</p>
    <footer>
        <cite>Victor Santos<br>Agência Funerária Machado & Victor (Alverca), Cliente desde 2001</cite>
    </footer>

<br><br>
<br><br>


        <p>“Cumpre com os requisitos impostos pela legislação (SAF-T PT)
                    (…) um programa informático para não informáticos.”</p>
    <footer>
        <cite>Nuno Monteiro<br>A Funerária Família Monteiro, Lda (Lisboa), Cliente desde 2001</cite>
    </footer>

<br><br>
<br><br>

        <p>“Parabéns pela certificação. Todos ganhámos com mais este enorme passo.”</p>
    <footer>
        <cite>Paulo Rodrigues<br>Funerária Triunfo (Lisboa), Cliente desde 2007</cite>
    </footer>

<br><br>
<br><br>

        <p>“Desde já, muito obrigado. O GAL está simplesmente maravilhoso (até nos ensina a ser agentes funerários). Continuem assim!”</p>
    <footer>
         <cite>Carlos Caneira<br>Monteiro Caneira - Agências Funerárias, Unipessoal Lda (Foros de Salvaterra), Cliente desde 2012</cite>
    </footer>

</div>
</section>

    <form id="feedbackForm" method="POST" action="process_feedback.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
        
        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" placeholder="Empresa (opcional)">
        
        <label for="ano_cliente">Ano de início como cliente:</label>
        <input type="number" id="ano_cliente" name="ano_cliente" placeholder="Ano de início como cliente" min="1899" max="9999">
        
        <label for="opiniao">Sua Opinião:</label>
        <textarea id="opiniao" name="opiniao" placeholder="Deixe sua opinião" required></textarea>
        
        <input type="submit" value="Enviar" id="enviarFeedback">
    </form>



<footer>
    <div class="footer-section-left">
        <p>Este não é o site oficial da SIGV</p>
    </div>
    <div class="footer-section-center">
        <img src="https://sigv.pt/wp-content/uploads/2020/09/logo_20191204_070818.png" alt="Logo SIGV"> <!-- Imagem do logo -->
    </div>
    <div class="footer-section-right">
        <p>Para acesso ao site oficial clique aqui: <a href="https://sigv.pt">SIGV</a></p>
        <p>Outros acessos: <a href="https://sigv.pt/contatos/">Contato</a> | <a href="https://sigv.pt/gal/">Sobre Nós</a> | <a href="https://sigv.pt/politica-de-privacidade/">Política de Privacidade</a></p>
        <p>&copy; 2024 Tecnologias. Todos os direitos reservados.</p> <!-- Texto padrão do rodapé -->
    </div>
</footer>

<script src="script.js"></script> <!-- Vamos usar JavaScript para controlar a animação do menu -->

</body>
</html>