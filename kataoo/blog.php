<?php

/**
 * Created by PhpStorm.
 * User: baer
 * Date: 13/12/16
 * Time: 14:25
 */
class BlogLoader
{
    function load(String $path): array
    {
        $data = json_decode(file_get_contents($path), true);

        $rawAuthor = $data['authors']; // renvoie un tableau associatif avec les valeurs de authors du JSON
        $rawArticle = $data['articles'];// renvoie un tableau associatif avec les valeurs de articles du JSON


        $authors = array_map(function ($t) { // pour chaque $rawAuthor on veut récupérer une instance de Author
            $author = new Author();
            if (isset($t['id']))
                $author->id = $t['id'];
            if (isset($t['firstname']))
                $author->firstName = $t['firstname'];
            if (isset($t['lastname']))
                $author->lastName = $t['lastname'];
            return $author;
        }, $rawAuthor);

        $articles = array_map(function ($t) use ($authors) {  // pour chaque $rawArticle on veut récupérer une instance de Article
            $article = new Article();
            if (isset($t['id']))
                $article->id = $t['id'];
            if (isset($t['title']))
                $article->title = $t['title'];
            if (isset($t['content']))
                $article->content = $t['content'];
            if (isset($t['authorId'])) {
                $foundAuthors = array_filter($authors, function ($author) use ($t) { // on associe l'objet authors a la propriété id de l'objet article
                    return $author->id == $t['authorId'];
                });
                $article->author = current($foundAuthors);
            };
            if (isset($t['date']))
                $article->publicationDate = $t['date'];
            return $article;
        }, $rawArticle);
        return ($articles);
    }
}


/**
 * Class Autor
 * description d'un rédacteur
 */
class Author
{
    public $id;
    public $firstName;
    public $lastName;

    public function __construct(int $id = null, String $firstName = null, String $lastName = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * renvoie le nom complet : Bob Lee
     * @return String
     */
    function getName(): String
    {
        return $this->firstName . " " . $this->lastName ;
    }

    /**
     * renvoie le initial du prénom et nom complet : B.Lee
     * @return String
     */
    function getShortName(): String
    {
        return substr($this->firstName, 0, 1) . "." . $this->lastName ;
    }

    /**
     * renvoie les initiales : B.L
     * @return String
     */
    function getInitial(): String
    {
        return substr($this->firstName, 0, 1) . "." . substr($this->lastName, 0, 1) ;
    }
}


/**
 * Class Article
 */
class Article
{
    public $id;
    public $title;
    public $content;
    public $author;
    public $publicationDate;

    public function __construct(int $id = null, String $title = null, String $content = null, Author $author = null, DateTime $publicationDate = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
    }
}


class ArticleRenderer
{
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * renvoie l'article mis en forme
     * <h2>titre</h2>
     * <p>article</p>
     * <p>nom-court de Author, la date de publication</p>
     * @return String
     */
    function render(): String
    {
        $vue="";
        $date = new DateTime($this->article->publicationDate );

        $vue .= "<h2>" . $this->article->title . "</h2>";
        $vue .=  "<p>" . $this->article->content . "</p>";
        $vue .=  "<p class='footerText'>Article créé par <strong>" . $this->article->author->getShortName()."</strong></p>";
        $vue .=  "<p class='footerText'>Publié le <strong>" . $date->format('d-m-Y'). "</strong></p>";
        $vue .= "<a class='footerText' href = 'blog.php'>Revenir à la page précédente </a>";

        return $vue;

    }
}

class Blog
{
    public $articles;

    public function __construct(String $title, array $articles)
    {
        $this->title = $title;
        $this->articles = $articles;
    }

    /**
     * Renvoie le header  du blog
     * <header>titre
     * @return String
     */
    function displayHeader()
    {
        echo "<header><h1>" . $this->title . "</h1></header>";
    }

    /**
     * affiche la liste des titres d'articles sous formes de liens vers les articles
     */
    function displayArticleList(): String
    {
        $vue="";
        foreach ($this->articles as $article) {
            $vue .= "<li><a href='blog.php?articleId=" . $article->id . "'>" . $article->title . "</a></li>";

        }
        return $vue;
    }

    /**
     * renvoie le contenu HTML d'un article
     * @param int $articleId
     * @return String
     */
    public function displayArticle(int $articleId): String
    {

        $selectedArticle = current(array_filter($this->articles, //Recuperer article correspondand à l'id de l'article passé en GET
            function ($article) use($articleId){
             return $article->id == $articleId;
            }));

        $articleRenderer = new ArticleRenderer($selectedArticle);
        return $articleRenderer->render();
    }

    /**;
     * renvoie un footer avec la date du jour
     * <footer></footer>
     */
    function displayFooter()
    {
        $date = new DateTime();
        echo "<footer><hr>Nous sommes le " . $date->format('d-m-Y') . "</footer>";
    }
}

// et pourquoi pas essayer de trouver 2/3 trucs à mettre dans un "helper"
class ViewHelper
{

}

$loader = new BlogLoader();
$articles = $loader->load('blog.json');
$blog = new Blog('Vive la POO', $articles);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $blog->title ?></title>
    <style>
        header, footer {
            text-align: center;
        }

        h2 {
            color : mediumvioletred;
            text-decoration: underline;
        }

        .footerText {
            font-size: small;
        }

        li {
            padding: 10px;
        }

    </style>
</head>
<body>
<?= $blog->displayHeader(); ?>
<hr>
<?= isset($_GET['articleId']) ?
    "<ul>".$blog->displayArticle($_GET['articleId'])."</ul>"
    : $blog->displayArticleList(); ?>

<?= $blog->displayFooter(); ?>
</body>
</html>
