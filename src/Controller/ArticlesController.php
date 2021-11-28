<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles", name="articles_")
 */
class ArticlesController extends AbstractController
{
    private array $categories = [
        1 => [
            'id' => 1,
            'title' => 'Health prevention',
            'articles' => [1,2,3,12]
        ],

        2 => [
            'id' => 2,
            'title' => 'Hospital News',
            'articles' => [4,5,6,11]
        ],
        3 => [
            'id' => 3,
            'title' => 'COVID 19',
            'articles' => [7,8,9,10]
        ]
    ];

    private array $authors = [
        1 => [
            'id' => 1,
            'name' => 'Gregory House',
            'position' => 'Diagnostician',
            'articles' => [1,3,5,7]
        ],

        2 => [
            'id' => 2,
            'name' => 'Lisa Caddy',
            'position' => 'Chief physician',
            'articles' => [9,11,2,4]
        ],
        3 => [
            'id' => 3,
            'name' => 'Christofer Michael Taub',
            'position' => 'Plastic surgeon',
            'articles' => [6,8,10,12]
        ]
    ];

    private array $articles = [
        1 => [
            'id' => 1,
            'title' => 'Article title 1',
            'date' => '01.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 1,
            'author_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Article title 2',
            'date' => '02.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 1,
            'author_id' => 2
        ],
        3 => [
            'id' => 3,
            'title' => 'Article title 3',
            'date' => '03.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 1,
            'author_id' => 1
        ],
        4 => [
            'id' => 4,
            'title' => 'Article title 4',
            'date' => '04.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 2,
            'author_id' => 2
        ],
        5 => [
            'id' => 5,
            'title' => 'Article title 5',
            'date' => '05.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 2,
            'author_id' => 1
        ],
        6 => [
            'id' => 6,
            'title' => 'Article title 6',
            'date' => '06.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 2,
            'author_id' => 3
        ],
        7 => [
            'id' => 7,
            'title' => 'Article title 7',
            'date' => '07.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 3,
            'author_id' => 1
        ],
        8 => [
            'id' => 8,
            'title' => 'Article title 8',
            'date' => '08.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 3,
            'author_id' => 3
        ],
        9 => [
            'id' => 9,
            'title' => 'Article title 9',
            'date' => '09.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 3,
            'author_id' => 2
        ],
        10 => [
            'id' => 10,
            'title' => 'Article title 10',
            'date' => '10.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 3,
            'author_id' => 3
        ],
        11 => [
            'id' => 11,
            'title' => 'Article title 11',
            'date' => '11.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 2,
            'author_id' => 2
        ],
        12 => [
            'id' => 12,
            'title' => 'Article title 12',
            'date' => '12.10.2021',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'category_id' => 1,
            'author_id' => 3
        ]
    ];



    /**
     * @Route("", name="list_all")
     */
    public function listAll(): Response
    {
        return $this->render('articles/list.html.twig', [
            'articles' => $this->articles,
        ]);
    }

    /**
     * @Route("/category/{categoryId}", name="list_by_category", requirements={"categoryId"="\d+"})
     */
    public function listByCategory(string $categoryId): Response
    {
        if (!isset($this->categories[(int) $categoryId])) {
            throw new \Exception('You have asked for a non-existing category '.$categoryId);
        }

        $category = $this->categories[(int) $categoryId] ?? null;

        $articleIds = $category['articles'];

        $articles = array_filter($this->articles, function ($article) use ($articleIds) {
            return in_array($article['id'], $articleIds, True);
        });

        return $this->render('articles/list.html.twig', [
            'articles' => $articles,
        ]);
    }

//  /**
//   * @Route("/{date}", name="list_by_date")
//   */
//  public function listByDate(): Response
//  {
//        return $this->render('articles/index.html.twig', [
//            'controller_name' => 'ArticlesController',
//        ]);
//  }

    /**
     * @Route("/author/{authorId}", name="list_by_author", requirements={"authorId"="\d+"})
     */
    public function listByAuthor(string $authorId): Response
    {
        if (!isset($this->authors[(int) $authorId])) {
            throw new \Exception('You have asked for a non-existing author '.$authorId);
        }

        $author = $this->authors[(int) $authorId] ?? null;

        $articleIds = $author['articles'];

        $articles = array_filter($this->articles, function ($article) use ($articleIds) {
            return in_array($article['id'], $articleIds, True);
        });

        return $this->render('articles/list.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/{categoryId}/{articleId}", name="get_article", requirements={"categoryId"="\d+"}, requirements={"articleId"="\d+"})
     */
    public function getArticle(string $categoryId, string $articleId): Response
    {
        if (!isset($this->categories[(int) $categoryId])) {
            throw new \Exception('You have asked for a non-existing category '.$categoryId);
        }

        $category = $this->categories[(int) $categoryId] ?? null;

        $articleIds = $category['articles'];

        $articles = array_filter($this->articles, function ($article) use ($articleIds) {
            return in_array($article['id'], $articleIds, True);
        });

        if (!isset($this->articles[(int) $articleId])) {
            throw new \Exception('You have asked for a non-existing article '.$articleId);
        }

        $article = $articles[(int) $articleId];

        // searching article's author

        $authorId = $article['author_id'];

        if (!isset($this->authors[$authorId])) {
            throw new \Exception('You article '.$article['id'].' has non-existing author '.$authorId);
        }

        $author=$this->authors[$authorId];

        return $this->render('articles/article.html.twig', [
            'article' => $article,
            'author' => $author,
        ]);
    }
}
