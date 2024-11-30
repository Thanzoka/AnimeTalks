<?php

require_once("templates/header.php");

require_once("dao/MovieDAO.php");

// Dao dos Filmes
$movieDao = new MovieDAO($conn, $BASE_URL);

$lastestMovies = $movieDao->getLatestMovies();
$actionMovies = $movieDao->getMoviesByCategory("Ação");
$comedyMovies = $movieDao->getMoviesByCategory("Comédia");
$shounenMovies = $movieDao->getMoviesByCategory("Shounen");
$sportMovies = $movieDao->getMoviesByCategory("Sport");

?>
<div id="main-container" class="container-fluid">
    <h2 class="section-title">Filmes/Animes novos</h2>
    <p class="section-description">Veja as críticas dos últimos filmes/animes adicionados</p>
    <div class="movies-container">
        <?php foreach($lastestMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
        <?php if(count($lastestMovies) === 0): ?>
            <p class="empty-list">Ainda não há filmes/animes cadastrados!</p>
        <?php endif; ?>
    </div>
    <h2 class="section-title">Shounen</h2>
    <p class="section-description">Veja os melhores filmes/animes shounens</p>
    <div class="movies-container">
        <?php foreach($shounenMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
        <?php if(count($shounenMovies) === 0): ?>
            <p class="empty-list">Ainda não há filmes/animes shounens cadastrados!</p>
        <?php endif; ?>
    </div>
    <h2 class="section-title">Sport</h2>
    <p class="section-description">Veja os melhores filmes/animes de esportes</p>
    <div class="movies-container">
        <?php foreach($sportMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
            <?php if(count($sportMovies) === 0): ?>
        <p class="empty-list">Ainda não há filmes/animes de esportes cadastrados!</p>
        <?php endif; ?>
    </div>
</div>
<?php

include_once("templates/footer.php");

?>