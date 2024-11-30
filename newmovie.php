<?php

  include_once("templates/header.php");

  // Checa autenticação
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  // Verifica o token, se não for o correto redireciona para a home
  $auth = new UserDAO($conn, $BASE_URL);

  $userData = $auth->verifyToken();

?>
<div id="main-container" class="container-fluid">
    <div class="offset-md-4 col-md-4 new-movie-container">
        <h1 class="page-title">Adicionar Filme/Anime</h1>
        <p class="page-description">Adicione sua crítica</p>
        <form id="add-movie-form" action="<?= $BASE_URL ?>movie_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do filme">
            </div>
            <div class="form-group">
                <label for="image">Imagem:</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="length">Duração:</label>
                <input type="text" class="form-control" id="length" name="length" placeholder="Digite a duração do filme">
            </div>
            <div class="form-group">
                <label for="category">Categoria do filme:</label>
                <select class="form-control" name="category" id="category">
                        <option value="">Selecione</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Apocalyptic">Apocalyptic</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Cooking">Cooking</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Dark Fantasy">Dark Fantasy</option>
                            <option value="Drama">Drama</option>
                            <option value="Ecchi">Ecchi</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Game">Game</option>
                            <option value="Gore">Gore</option>
                            <option value="Harem">Harem</option>
                            <option value="Historical">Historical</option>
                            <option value="Horror">Horror</option>
                            <option value="Investigation">Investigation</option>
                            <option value="Idol">Idol</option>
                            <option value="Iyashikei">Iyashikei</option>
                            <option value="Isekai">Isekai</option>
                            <option value="Josei">Josei</option>
                            <option value="Martial Arts">Martial Arts</option>
                            <option value="Mecha">Mecha</option>
                            <option value="Medieval">Medieval</option>
                            <option value="Military">Military</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Parody">Parody</option>
                            <option value="Psychological">Psychological</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Seinen">Seinen</option>
                            <option value="Sentai">Sentai</option>
                            <option value="Shoujo">Shoujo</option>
                            <option value="Shounen">Shounen</option>
                            <option value="Slice of Life">Slice of Life</option>
                            <option value="Sport">Sport</option>
                            <option value="Supernatural">Supernatural</option>
                            <option value="Survival">Survival</option>
                            <option value="Terror">Terror</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Yaoi">Yaoi</option>
                            <option value="Yuri">Yuri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="trailer">Trailer:</label>
                <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>
            <input type="submit" class="btn card-btn" value="Adicionar filme/anime">
        </form>
    </div>
</div>
<?php

  include_once("templates/footer.php");

?>