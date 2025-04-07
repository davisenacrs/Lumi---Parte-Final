<?php
session_start();
require_once 'db.php';

function getNotaMedia($conn, $id_obra, $tipo) {
  if ($tipo === 'filme') {
      $stmt = $conn->prepare("SELECT ROUND(AVG(avaliacao), 1) AS media FROM avaliacoes WHERE filmes_id = ?");
  } else {
      $stmt = $conn->prepare("SELECT ROUND(AVG(avaliacao), 1) AS media FROM avaliacoes WHERE series_id = ?");
  }

  $stmt->bind_param("i", $id_obra);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  return $row['media'] ?? '0.0';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUMI - Início</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/logout.css">
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
                  <a href="logout.php" class="btn-logout">Sair</a>
              <?php endif; ?>
          </div>
    </header>

    <section class="intro">
    <div class="conteudo-intro">
        <h1>Light Up My Imagination</h1>
        <p>Transforme sua forma de ver filmes e séries de forma organizada, avaliada e compartilhada com quem entende: Você.</p>
        <a href="login.php" class="btn-principal">Faça login para obter mais acesso!</a>
    </div>
    </section>

    <section class="destaque">
    <h2>Como o Lumi vai mudar sua <br>
    <span class="enfase">experiência audio visual:</span></h2>

    <div class="cards-simples">
        <div class="caixa-texto">
        Dê sua nota, escreva o que achou e compartilhe suas impressões com quem também ama obras de cinema e TV.
        </div>
        <div class="caixa-texto">
        Interaja com obras populares e descubra o que está em alta entre outros usuários.
        </div>
        <div class="caixa-texto">
        Receba recomendações feitas para você e encontre obras que realmente combinam com seu gosto.
        </div>
    </div>
    </section>

    <section class="carousel">
    <div class="carrousel1">
        <h2 class="pub1">Aclamados pelo público:</h2>
        <div class="container swiper" id="carousel1">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
            <!-- Card 1: Interstelar -->
            <div class="card swiper-slide">
                <div class="image-box">
                    <?php echo "<a href='avaliarFilmes.php?id=2'><img src='../img/poster_02.jpg' alt=''></a>"; ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <h3 class="name">
                            <?php echo "<a href='avaliarFilmes.php?id=2'>Interstelar</a>"; ?>
                        </h3>
                        <?php $media = getNotaMedia($conn, 2, 'filme'); ?>
                        <div class="avaliacao-media">
                            <span class="nota"><?= $media ?></span>
                            <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: Breaking Bad -->
            <div class="card swiper-slide">
                <div class="image-box">
                    <?php echo "<a href='avaliarSeries.php?id=3'><img src='../img/poster_23.jpg' alt=''></a>"; ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <h3 class="name">
                            <?php echo "<a href='avaliarSeries.php?id=3'>Breaking Bad</a>"; ?>
                        </h3>
                        <?php $media = getNotaMedia($conn, 3, 'serie'); ?>
                        <div class="avaliacao-media">
                            <span class="nota"><?= $media ?></span>
                            <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Peaky Blinders -->
            <div class="card swiper-slide">
                <div class="image-box">
                    <?php echo "<a href='avaliarSeries.php?id=14'><img src='../img/poster_34.jpg' alt=''></a>"; ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <h3 class="name">
                            <?php echo "<a href='avaliarSeries.php?id=14'>Peaky Blinders</a>"; ?>
                        </h3>
                        <?php $media = getNotaMedia($conn, 14, 'serie'); ?>
                        <div class="avaliacao-media">
                            <span class="nota"><?= $media ?></span>
                            <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: Ultimato -->
            <div class="card swiper-slide">
                <div class="image-box">
                    <?php echo "<a href='avaliarFilmes.php?id=6'><img src='../img/poster_06.jpg' alt=''></a>"; ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <h3 class="name">
                            <?php echo "<a href='avaliarFilmes.php?id=6'>Ultimato</a>"; ?>
                        </h3>
                        <?php $media = getNotaMedia($conn, 6, 'filme'); ?>
                        <div class="avaliacao-media">
                            <span class="nota"><?= $media ?></span>
                            <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5: La Casa de Papel -->
            <div class="card swiper-slide">
                <div class="image-box">
                    <?php echo "<a href='avaliarSeries.php?id=8'><img src='../img/poster_28.jpg' alt=''></a>"; ?>
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <h3 class="name">
                            <?php echo "<a href='avaliarSeries.php?id=8'>La Casa de Papel</a>"; ?>
                        </h3>
                        <?php $media = getNotaMedia($conn, 8, 'serie'); ?>
                        <div class="avaliacao-media">
                            <span class="nota"><?= $media ?></span>
                            <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                        </div>
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
    
        <h2 class="pub2">Top 5 Filmes da Semana:</h2>
        <div class="container swiper" id="carousel2">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
                <!-- Card 1: Django Livre -->
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<a href='avaliarFilmes.php?id=18'><img src='../img/poster_18.jpg' alt=''></a>"; ?>
                    </div>
                    <div class="profile-details">
                        <div class="name-job">
                            <h3 class="name">
                                <?php echo "<a href='avaliarFilmes.php?id=18'>Django Livre</a>"; ?>
                            </h3>
                            <?php $media = getNotaMedia($conn, 18, 'filme'); ?>
                            <div class="avaliacao-media">
                                <span class="nota"><?= $media ?></span>
                                <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Lobo de Wall Street -->
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<a href='avaliarFilmes.php?id=7'><img src='../img/poster_07.jpg' alt=''></a>"; ?>
                    </div>
                    <div class="profile-details">
                        <div class="name-job">
                            <h3 class="name">
                                <?php echo "<a href='avaliarFilmes.php?id=7'>Lobo de Wall Street</a>"; ?>
                            </h3>
                            <?php $media = getNotaMedia($conn, 7, 'filme'); ?>
                            <div class="avaliacao-media">
                                <span class="nota"><?= $media ?></span>
                                <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Matrix -->
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<a href='avaliarFilmes.php?id=11'><img src='../img/poster_11.jpg' alt=''></a>"; ?>
                    </div>
                    <div class="profile-details">
                        <div class="name-job">
                            <h3 class="name">
                                <?php echo "<a href='avaliarFilmes.php?id=11'>Matrix</a>"; ?>
                            </h3>
                            <?php $media = getNotaMedia($conn, 11, 'filme'); ?>
                            <div class="avaliacao-media">
                                <span class="nota"><?= $media ?></span>
                                <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4: Fight Club -->
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<a href='avaliarFilmes.php?id=4'><img src='../img/poster_04.jpg' alt=''></a>"; ?>
                    </div>
                    <div class="profile-details">
                        <div class="name-job">
                            <h3 class="name">
                                <?php echo "<a href='avaliarFilmes.php?id=4'>Fight Club</a>"; ?>
                            </h3>
                            <?php $media = getNotaMedia($conn, 4, 'filme'); ?>
                            <div class="avaliacao-media">
                                <span class="nota"><?= $media ?></span>
                                <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 5: A Teoria de Tudo -->
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<a href='avaliarFilmes.php?id=20'><img src='../img/poster_20.jpg' alt=''></a>"; ?>
                    </div>
                    <div class="profile-details">
                        <div class="name-job">
                            <h3 class="name">
                                <?php echo "<a href='avaliarFilmes.php?id=20'>A Teoria de Tudo</a>"; ?>
                            </h3>
                            <?php $media = getNotaMedia($conn, 20, 'filme'); ?>
                            <div class="avaliacao-media">
                                <span class="nota"><?= $media ?></span>
                                <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                            </div>
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
      <h2 class="pub1">Top 5 Séries da Semana:</h2>
      <div class="container swiper" id="carousel3">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <!-- Card 1: The Boys -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=5'><img src='../img/poster_25.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=5'>The Boys</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 5, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 2: The Umbrella Academy -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=19'><img src='../img/poster_39.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=19'>The Umbrella<br>Academy</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 19, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 3: The Witcher -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=11'><img src='../img/poster_31.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=11'>The Witcher</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 11, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 4: Round 6 -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=6'><img src='../img/poster_26.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=6'>Round 6</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 6, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 5: Ozark -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=15'><img src='../img/poster_35.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=15'>Ozark</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 15, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
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
          <!-- Card 1: Stranger Things -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=1'><img src='../img/poster_21.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=1'>Stranger Things</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 1, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 2: Parasita -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarFilmes.php?id=8'><img src='../img/poster_08.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarFilmes.php?id=8'>Parasita</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 8, 'filme'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 3: The Mandalorian -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=4'><img src='../img/poster_24.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=4'>The Mandalorian</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 4, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 4: Dark -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=9'><img src='../img/poster_29.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=9'>Dark</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 9, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
              </div>
            </div>
          </div>
          <!-- Card 5: The Crown -->
          <div class="card swiper-slide">
            <div class="image-box">
              <?php echo "<a href='avaliarSeries.php?id=7'><img src='../img/poster_27.jpg' alt=''></a>"; ?>
            </div>
            <div class="profile-details">
              <div class="name-job">
                <h3 class="name">
                  <?php echo "<a href='avaliarSeries.php?id=7'>The Crown</a>"; ?>
                </h3>
                <?php $media = getNotaMedia($conn, 7, 'serie'); ?>
                <div class="avaliacao-media">
                    <span class="nota"><?= $media ?></span>
                    <img src="../img/estrela.png" alt="Estrela" class="estrela-icon">
                </div>
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
