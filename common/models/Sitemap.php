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
                $urls[]=[
                    'url'=>Yii::$app->urlManager->createUrl([$page->hrurl.'.html']),
                    'priority'=>'0.6',
                    'lastmod'=> \Yii::$app->formatter->asDatetime($page->updated_at, 'yyyy-MM-dd')
                ];
        }
        $articlePages = Pages::find()->where([
            'site'=>Yii::$app->params['site'],
            'status'=>'article'
        ])->all();
        $topPriority='0.9';
        $normPriority='0.8';
        foreach ($articlePages as $articlePage){
            $articleForPage = Article::find()->where([
                'site'=>Yii::$app->params['site'],
                'hrurl'=>$articlePage->hrurl,
                'status'=>'page'
            ])->one();
            if ($articleForPage) {
                $priority=$normPriority;
                if ($articleForPage->hrurl=='perevozki-dlya-juridicheskih-lits'||
                    $articleForPage->hrurl=='services_russia') {
                    $priority=$topPriority;
                }
                if ($articleForPage->hrurl=='home') {
                    $this->homeLastMod =  \Yii::$app->formatter->asDatetime($articleForPage->updated_at, 'yyyy-MM-dd');
                } else {
                    $urls[]=[
                        'url'=>Yii::$app->urlManager->createUrl([$articleForPage->hrurl.'.html']),
                        'priority'=>$priority,
                        'lastmod'=> \Yii::$app->formatter->asDatetime($articleForPage->updated_at, 'yyyy-MM-dd')
                    ];
                }
            }

        }

        $landingPages = LandingPage::find()->where([
            'site'=>Yii::$app->params['site'],
            'status'=>'published'
        ])->all();
        foreach ($landingPages as $landingPage){
            $urls[]=[
                'url'=>Yii::$app->urlManager->createUrl(['/lp/'.$landingPage->hrurl]),
                'priority'=>'0.5',
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
                <priority>1</priority>
                <lastmod><?= $this->homeLastMod ?></lastmod>
            </url>
            <?php foreach($urls as $url): ?>
                <url>
                    <loc><?= $host.$url['url'] ?></loc>
                    <lastmod><?= $url['lastmod'] ?></lastmod>
                    <priority><?= $url['priority'] ?></priority>
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