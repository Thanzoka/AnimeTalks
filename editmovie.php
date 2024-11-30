<?php
require_once("templates/header.php");

// Verifica se usuário está autenticado
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");

$user = new User();
$userDao = new UserDao($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);

$movieDao = new MovieDAO($conn, $BASE_URL);

$id = filter_input(INPUT_GET, "id");

if(empty($id)) {

    $message->setMessage("O filme não foi encontrado!", "error", "index.php");

} else {

    $movie = $movieDao->findById($id);

    // Verifica se o filme existe
    if(!$movie) {

    $message->setMessage("O filme não foi encontrado!", "error", "index.php");

    }

}

  // Checar se o filme tem imagem
if($movie->image == "") {
    $movie->image = "movie_cover.jpg";
}

?>
<div id="main-container" class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 offset-md-1">
                <h1><?= $movie->title ?></h1>
                <p class="page-description">Altere os dados do filme/movie no fomrulário abaixo:</p>
                <form id="edit-movie-form" action="<?= $BASE_URL ?>movie_process.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $movie->id ?>">
                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do seu filme" value="<?= $movie->title ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagem:</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="length">Duração:</label>
                        <input type="text" class="form-control" id="length" name="length" placeholder="Digite a duração do filme" value="<?= $movie->length ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Selecione</option>
                            <option value="Action" <?= $movie->category === "Action" ? "selected" : "" ?>>Action</option>
                            <option value="Adventure" <?= $movie->category === "Adventure" ? "selected" : "" ?>>Adventure</option>
                            <option value="Apocalyptic" <?= $movie->category === "Apocalyptic" ? "selected" : "" ?>>Apocalyptic</option>
                            <option value="Comedy" <?= $movie->category === "Comedy" ? "selected" : "" ?>>Comedy</option>
                            <option value="Cooking" <?= $movie->category === "Cooking" ? "selected" : "" ?>>Cooking</option>
                            <option value="Cyberpunk" <?= $movie->category === "Cyberpunk" ? "selected" : "" ?>>Cyberpunk</option>
                            <option value="Dark Fantasy" <?= $movie->category === "Dark Fantasy" ? "selected" : "" ?>>Dark Fantasy</option>
                            <option value="Drama" <?= $movie->category === "Drama" ? "selected" : "" ?>>Drama</option>
                            <option value="Ecchi" <?= $movie->category === "Ecchi" ? "selected" : "" ?>>Ecchi</option>
                            <option value="Fantasy" <?= $movie->category === "Fantasy" ? "selected" : "" ?>>Fantasy</option>
                            <option value="Game" <?= $movie->category === "Game" ? "selected" : "" ?>>Game</option>
                            <option value="Gore" <?= $movie->category === "Gore" ? "selected" : "" ?>>Gore</option>
                            <option value="Harem" <?= $movie->category === "Harem" ? "selected" : "" ?>>Harem</option>
                            <option value="Historical" <?= $movie->category === "Historical" ? "selected" : "" ?>>Historical</option>
                            <option value="Horror" <?= $movie->category === "Horror" ? "selected" : "" ?>>Horror</option>
                            <option value="Investigation" <?= $movie->category === "Investigation" ? "selected" : "" ?>>Investigation</option>
                            <option value="Idol" <?= $movie->category === "Idol" ? "selected" : "" ?>>Idol</option>
                            <option value="Iyashikei" <?= $movie->category === "Iyashikei" ? "selected" : "" ?>>Iyashikei</option>
                            <option value="Isekai" <?= $movie->category === "Isekai" ? "selected" : "" ?>>Isekai</option>
                            <option value="Josei" <?= $movie->category === "Josei" ? "selected" : "" ?>>Josei</option>
                            <option value="Martial Arts" <?= $movie->category === "Martial Arts" ? "selected" : "" ?>>Martial Arts</option>
                            <option value="Mecha" <?= $movie->category === "Mecha" ? "selected" : "" ?>>Mecha</option>
                            <option value="Medieval" <?= $movie->category === "Medieval" ? "selected" : "" ?>>Medieval</option>
                            <option value="Military" <?= $movie->category === "Military" ? "selected" : "" ?>>Military</option>
                            <option value="Mystery" <?= $movie->category === "Mystery" ? "selected" : "" ?>>Mystery</option>
                            <option value="Parody" <?= $movie->category === "Parody" ? "selected" : "" ?>>Parody</option>
                            <option value="Psychological" <?= $movie->category === "Psychological" ? "selected" : "" ?>>Psychological</option>
                            <option value="Romance" <?= $movie->category === "Romance" ? "selected" : "" ?>>Romance</option>
                            <option value="Sci-Fi" <?= $movie->category === "Sci-Fi" ? "selected" : "" ?>>Sci-Fi</option>
                            <option value="Seinen" <?= $movie->category === "Seinen" ? "selected" : "" ?>>Seinen</option>
                            <option value="Sentai" <?= $movie->category === "Sentai" ? "selected" : "" ?>>Sentai</option>
                            <option value="Shoujo" <?= $movie->category === "Shoujo" ? "selected" : "" ?>>Shoujo</option>
                            <option value="Shounen" <?= $movie->category === "Shounen" ? "selected" : "" ?>>Shounen</option>
                            <option value="Slice of Life" <?= $movie->category === "Slice of Life" ? "selected" : "" ?>>Slice of Life</option>
                            <option value="Sport" <?= $movie->category === "Sport" ? "selected" : "" ?>>Sport</option>
                            <option value="Supernatural" <?= $movie->category === "Supernatural" ? "selected" : "" ?>>Supernatural</option>
                            <option value="Survival" <?= $movie->category === "Survival" ? "selected" : "" ?>>Survival</option>
                            <option value="Terror" <?= $movie->category === "Terror" ? "selected" : "" ?>>Terror</option>
                            <option value="Thriller" <?= $movie->category === "Thriller" ? "selected" : "" ?>>Thriller</option>
                            <option value="Yaoi" <?= $movie->category === "Yaoi" ? "selected" : "" ?>>Yaoi</option>
                            <option value="Yuri" <?= $movie->category === "Yuri" ? "selected" : "" ?>>Yuri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="trailer">Trailer:</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer" value="<?= $movie->trailer ?>">
                    </div>
                    <div class="col-md-3">
                        <iframe src="<?= $movie->trailer ?>" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encryted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Descreva o filme..."><?= $movie->description ?></textarea>
                    </div>
                    <input type="submit" class="btn card-btn" value="Editar filme">
                </form>
            </div>
            <div class="col-md-3">
                <div class="movie-image-container" style="background-image: url('<?= $BASE_URL ?>img/movies/<?= $movie->image ?>')"></div>
            </div>
        </div>
    </div>
</div>
<?php
  require_once("templates/footer.php");
?>