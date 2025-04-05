<!-------------------------------------------------------------------------------------------------------------------
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Home - LUMI</title>
    <style>
        /* Estilo para ocultar o texto por padrão */
        #conteudo-oculto {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="lumi">
                <h3>Lumi</h3>
            </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <h1>Bem Vindo ao LUMI:</h1>
        <h2>Light Up My Imagination</h2>
    </div>

    <div class="logoH">
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </div>

    Div oculta que será mostrada após o clique 
    <div id="conteudo-oculto">
        <p>Descubra um mundo de entretenimento feito sob medida para você. No Lumi, você tem a oportunidade de explorar uma vasta seleção de filmes e séries, compartilhar suas opiniões, e receber recomendações personalizadas baseadas nas suas preferências. Nossa plataforma reúne críticas de profissionais e da comunidade, ajudando você a decidir o que assistir em cada momento.</p>
        <p>Encontre informações detalhadas sobre o elenco, equipe e datas de lançamento das suas produções favoritas, crie listas personalizadas e conecte-se com outros cinéfilos. Seja para discutir os últimos lançamentos ou revisitar clássicos, o Lumi é a ferramenta essencial para quem ama o universo do cinema e da TV.</p>
        <p>Junte-se a nós e torne a sua experiência de assistir ainda mais envolvente!</p>
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>

<script>
    // JavaScript para exibir o conteúdo oculto ao clicar na imagem
    document.querySelector('.logo-imagem').addEventListener('click', function() {
        var conteudoOculto = document.getElementById('conteudo-oculto');
        if (conteudoOculto.style.display === 'none' || conteudoOculto.style.display === '') {
            conteudoOculto.style.display = 'block';
        } else {
            conteudoOculto.style.display = 'none';
        }
    });
</script>
</body>
</html>
---------------------------------------------------------------------------->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUMI - Início</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/carousel.js" defer></script> <!-- Novo JavaScript para o carrossel -->

</head>
<body> 
    <header class="header">
        <div class="logo-area">
            <img src="../img/logo.png" alt="Logo Lumi">
            <span class="logo-text">Lumi</span>
        </div>
      <nav class="menu">
        <ul>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="filmes.php">Filmes</a></li>
                <li><a href="series.php">Séries</a></li>
                <li><a href="minhasavaliacoes.php">Minhas Avaliações</a></li>
            <?php endif; ?>
        </ul>
      </nav>
          <div class="botoes-header">
              <?php if (!isset($_SESSION['usuario_id'])): ?>
                  <a href="login.php" class="btn-login">Entrar</a>
                  <a href="cadastro.php" class="btn-cadastro">Cadastre-se no Lumi</a>
              <?php else: ?>
                  <a href="logout.php" class="btn-login">Sair</a>
              <?php endif; ?>
          </div>

    </header>

    <section class="intro">
    <div class="conteudo-intro">
        <h1>Light Up My Imagination</h1>
        <p>Track films you’ve watched. Save those you want to see. Tell your friends what’s good.</p>
        <a href="login.php" class="btn-principal">Faça login para obter mais acesso!</a>
    </div>
    </section>

    <section class="destaque">
    <h2>Como o Lumi vai mudar sua <br>
    <span class="enfase">experiência audio visual:</span></h2>

    <div class="cards-simples">
        <div class="caixa-texto">
        Keep track of every film you've ever watched (or just start from the day you join)
        </div>
        <div class="caixa-texto">
        Write and share reviews, and follow friends and other members to read theirs
        </div>
        <div class="caixa-texto">
        Compile and share lists of films on any topic and keep a watchlist of films to see
        </div>
    </div>
    </section>

    <section class="carousel">
    <div class="carrousel1">
        <h2 class="pub1">Aclamados pelo público:</h2>
        <div class="container swiper" id="carousel1">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
                <div class="image-box">
                <?php
                echo "<a href='avaliarFilmes.php?id=2'><img src='../img/poster_02.jpg' alt=''></a>";
                ?>
                </div>
                <div class="profile-details">
                <div class="name-job">
                    <h3 class="name">
                    <?php
                        echo "<a href='avaliarFilmes.php?id=2'>Interstelar</a>";
                    ?>
                    </h3>
                </div>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-box">
                <?php
                    echo "<a href='avaliarSeries.php?id=3'><img src='../img/poster_23.jpg' alt=''></a>";
                ?>
                </div>
                <div class="profile-details">
                <div class="name-job">
                    <h3 class="name">
                    <?php
                        echo "<a href='avaliarSeries.php?id=3'>Breaking Bad</a>";
                    ?>
                    </h3>
                </div>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="image-box">
                <?php
                    echo "<a href='avaliarSeries.php?id=14'><img src='../img/poster_34.jpg' alt=''></a>";
                ?>
                </div>
                <div class="profile-details">
                <div class="name-job">
                    <h3 class="name">
                    <?php
                        echo "<a href='avaliarSeries.php?id=14'>Peaky Blinders</a>";
                    ?>
                    </h3>
                </div>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="image-box">
                <?php
                    echo "<a href='avaliarFilmes.php?id=6'><img src='../img/poster_06.jpg' alt=''></a>";
                ?>
                </div>
                <div class="profile-details">
                <div class="name-job">
                    <h3 class="name">
                    <?php
                        echo "<a href='avaliarFilmes.php?id=6'>Ultimato</a>";
                    ?>
                    </h3>
                </div>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="image-box">
                <?php
                    echo "<a href='avaliarSeries.php?id=8'><img src='../img/poster_28.jpg' alt=''></a>";
                ?>
                </div>
                <div class="profile-details">
                <div class="name-job">
                    <h3 class="name">
                    <?php
                        echo "<a href='avaliarSeries.php?id=8'>La Casa de Papel</a>";
                    ?>
                    </h3>
                    </div>
            </div>
            </div>


            </div>
            </div>
        <div class="swiper-button-next swiper-navBtn1"></div>
        <div class="swiper-button-prev swiper-navBtn1"></div>
        <div class="swiper-pagination pagination1"></div>
        </div>
    </div>
    
        <h2 class="pub2">Top 10 Filmes da Semana:</h2>
        <div class="container swiper" id="carousel2">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                <div class="image-box">
                    <?php
                    echo "<a href='avaliarFilmes.php?id=18'><img src='../img/poster_18.jpg' alt=''></a>";
                    ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                    <h3 class="name">
                        <?php
                        echo "<a href='avaliarFilmes.php?id=18'>Django Livre</a>";
                        ?>
                    </h3>
                    </div>
                </div>
                </div>

                <div class="card swiper-slide">
                <div class="image-box">
                    <?php
                    echo "<a href='avaliarFilmes.php?id=7'><img src='../img/poster_07.jpg' alt=''></a>";
                    ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                    <h3 class="name">
                        <?php
                        echo "<a href='avaliarFilmes.php?id=7'>Lobo de Wall Street</a>";
                        ?>
                    </h3>
                    </div>
                </div>
                </div>

                <div class="card swiper-slide">
                <div class="image-box">
                    <?php
                    echo "<a href='avaliarFilmes.php?id=11'><img src='../img/poster_11.jpg' alt=''></a>";
                    ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                    <h3 class="name">
                        <?php
                        echo "<a href='avaliarFilmes.php?id=11'>Matrix</a>";
                        ?>
                    </h3>
                    </div>
                </div>
                </div>

                <div class="card swiper-slide">
                <div class="image-box">
                    <?php
                    echo "<a href='avaliarFilmes.php?id=4'><img src='../img/poster_04.jpg' alt=''></a>";
                    ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                    <h3 class="name">
                        <?php
                        echo "<a href='avaliarFilmes.php?id=4'>Fight Club</a>";
                        ?>
                    </h3>
                    </div>
                </div>
                </div>

                <div class="card swiper-slide">
                <div class="image-box">
                    <?php
                    echo "<a href='avaliarFilmes.php?id=20'><img src='../img/poster_20.jpg' alt=''></a>";
                    ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                    <h3 class="name">
                        <?php
                        echo "<a href='avaliarFilmes.php?id=20'>A Teoria de Tudo</a>";
                        ?>
                    </h3>
                    </div>
                </div>
                </div>


                </div>
                </div>
            <div class="swiper-button-next swiper-navBtn2"></div>
            <div class="swiper-button-prev swiper-navBtn2"></div>
            <div class="swiper-pagination pagination2"></div>
        </div>
    
    <div class="carrousel1">

      <h2 class="pub1">Top 10 Séries da Semana:</h2>
      <div class="container swiper" id="carousel3">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=5'><img src='../img/poster_25.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=5'>The Boys</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=19'><img src='../img/poster_39.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=19'>The Umbrella Academy</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=11'><img src='../img/poster_31.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=11'>The Witcher</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=6'><img src='../img/poster_26.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=6'>Round 6</a>";
                  ?>
                </h3>
              </div>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-box">
              <?php
                echo "<a href='avaliarSeries.php?id=15'><img src='../img/poster_35.jpg' alt=''></a>";
              ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php
                    echo "<a href='avaliarSeries.php?id=15'>Ozark</a>";
                  ?>
                </h3>
                </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn3"></div>
      <div class="swiper-button-prev swiper-navBtn3"></div>
     <div class="swiper-pagination pagination3"></div>
    </div>
    </div>

    <h2 class="pub2">Usuários como você também curtiram:</h2>
    <div class="container swiper" id="carousel4">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=1'><img src='../img/poster_21.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=1'>Stranger Things</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarFilmes.php?id=8'><img src='../img/poster_08.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarFilmes.php?id=8'>Parasita</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=4'><img src='../img/poster_24.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=4'>The Mandalorian</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=9'><img src='../img/poster_29.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=9'>Dark</a>";
                ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-box">
            <?php
              echo "<a href='avaliarSeries.php?id=7'><img src='../img/poster_27.jpg' alt=''></a>";
            ?>
          </div>
          <div class="profile-details">
            <div class="name-job">
              <h3 class="name">
                <?php
                  echo "<a href='avaliarSeries.php?id=7'>The Crown</a>";
                ?>
              </h3>
              </div>
          </div>
        </div>


        </div>
        </div>
      <div class="swiper-button-next swiper-navBtn4"></div>
      <div class="swiper-button-prev swiper-navBtn4"></div>
      <div class="swiper-pagination pagination4"></div>
    </div>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/script.js"></script>
    </section>

    <div class="btnlogin">
        <a href="login.php" class="btn-principal">Faça login para obter mais acesso!</a>
    </div>
    <footer>
        <div class="direitos">
            <p>Lumi © 2024 - Todos os direitos reservados.</p>
        </div>
        <div class="redes">
            <p>Siga o Lumi nas redes sociais:</p>
        </div>
    </footer>

</body>
</html>