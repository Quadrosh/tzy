<?php
namespace common\models;
use Yii;
use yii\base\Model;


class Sitemap extends Model
{
    public $site;
    public $homeLastMod;

    public function getUrl(){
        $urls = [];
        $pages = Pages::find()->where(['site'=>Yii::$app->params['site'],'status'=>'published'])->all();
        foreach ($pages as $page){
            if ($page->hrurl=='home') {
                $this->homeLastMod =  \Yii::$app->formatter->asDatetime($page->updated_at, 'yyyy-MM-dd');
            } else{
                $urls[]=[
                    'url'=>Yii::$app->urlManager->createUrl([$page->hrurl.'.html']),
                    'changefreq'=>'daily',
                    'lastmod'=> \Yii::$app->formatter->asDatetime($page->updated_at, 'yyyy-MM-dd')
                ];
            }

        }
        $articlePages = Pages::find()->where([
            'site'=>Yii::$app->params['site'],
            'status'=>'article'
        ])->all();
        foreach ($articlePages as $articlePage){
            $article = Article::find()->where([
                'site'=>Yii::$app->params['site'],
                'hrurl'=>$articlePage->hrurl,
                'status'=>'page'
            ])->one();
            if ($article) {
                $urls[]=[
                    'url'=>Yii::$app->urlManager->createUrl([$article->hrurl.'.html']),
                    'changefreq'=>'daily',
                    'lastmod'=> \Yii::$app->formatter->asDatetime($article->updated_at, 'yyyy-MM-dd')
                ];
            }

        }
        $landingPages = LandingPage::find()->where([
            'site'=>Yii::$app->params['site'],
            'status'=>'published'
        ])->all();
        foreach ($landingPages as $landingPage){
            $urls[]=[
                'url'=>Yii::$app->urlManager->createUrl(['/lp/'.$landingPage->hrurl]),
                'changefreq'=>'daily',
                'lastmod'=> \Yii::$app->formatter->asDatetime($landingPage->updated_at, 'yyyy-MM-dd')
            ];
        }

        return $urls;
    }
    public function getXml($urls){
        $host = Yii::$app->request->hostInfo; // домен сайта
        ob_start();
        echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <url>
                <loc><?= $host ?></loc>
                <changefreq>daily</changefreq>
                <priority>1</priority>
                <lastmod><?= $this->homeLastMod ?></lastmod>
            </url>
            <?php foreach($urls as $url): ?>
                <url>
                    <loc><?= $host.$url['url'] ?></loc>
                    <lastmod><?= $url['lastmod'] ?></lastmod>
                    <changefreq><?= $url['changefreq'] ?></changefreq>
                </url>
            <?php endforeach; ?>
        </urlset>
        <?php return ob_get_clean();
    }
    public function showXml($xml_sitemap){
        // устанавливаем формат отдачи контента
        Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        //повторно т.к. может не сработать
        header("Content-type: text/xml");
        echo $xml_sitemap;
        Yii::$app->end();
    }
}