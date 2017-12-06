<?php

namespace app\controllers;

use app\models\MUNICIPALITY;
use app\models\SECTION;
use Yii;
use app\models\Applicants;
use app\models\ApplicantsSearch;
use app\models\HOMEDATA;
use app\models\Folio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use barcode\barcode\BarcodeGenerator as BarcodeGenerator;
use yii\helpers\Json;


class ApplicantsController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ApplicantsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Applicants();
        $this->increment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Applicants::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    protected function increment(){
        $count = "SELECT count(*) FROM USER_SEQUENCES WHERE SEQUENCE_NAME = '".Yii::$app->params['sequenceApplicants']."'";
        $val = Yii::$app->db->createCommand($count)->queryOne();
        $value = $val["COUNT(*)"];
        if ($value <= 0) {
            $sql = "CREATE sequence ".Yii::$app->params['sequenceApplicants'];
            $result = Yii::$app->db->createCommand($sql)->query();
        }
    }
    protected function increment2(){
        $count = "SELECT count(*) FROM USER_SEQUENCES WHERE SEQUENCE_NAME = '".Yii::$app->params['sequenceHome']."'";
        $val = Yii::$app->db->createCommand($count)->queryOne();
        $value = $val["COUNT(*)"];
        if ($value <= 0) {
            $sql = "CREATE sequence ".Yii::$app->params['sequenceHome'];
            $result = Yii::$app->db->createCommand($sql)->query();
        }
    }

    public function actionReport($id) {
        $model = Applicants::findOne($id);
        $home = HOMEDATA::find()->where(['APPLICANTS_ID' => $id])->one();
        $optionsArray = [
            'elementId'=> 'canvasTarget',
            'value'=> '12345678',
            'type'=>'code128',
        ];
        $code = BarcodeGenerator::widget($optionsArray);

        $content = $this->renderPartial('_reportView', [
            'model'=> $model,
            'code' => $code,
            'home' => $home
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'format' => Pdf::FORMAT_A4,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'options' => [
                'title' => 'FUR'
            ],
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'methods' => [
                'SetHeader' => ['Secretaria de Desarrollo Social'],
                'SetFooter' => ['|Pagina {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionSections() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = SECTION::getSec($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(  ['output'=>'', 'selected'=>'']);
    }


    public function actionMenu($id)
    {
        $model = Applicants::findOne($id);
        $status = 0;
        if ($model){
            $status = 1;
            return $this->render('menu', [
                'model' => $model,
                'status' => $status,
                'id' => $id
            ]);
        }
        else{
            return $this->render('menu', [
                'status' => $status,
                'id' => $id
            ]);
        }
    }

    public function actionFolio()
    {   $model = new Folio();
        return $this->render('folio',[
            'model' => $model
            ]);
    }

    public function actionCreateData($id)
    {
        $model = new HOMEDATA();
        $this->increment2();
        if ($model->load(Yii::$app->request->post())) {
            $model->APPLICANTS_ID = $id;

             if($model->save()) {
                 return $this->redirect(['menu', 'id' => $id]);
             }
             echo "bien"; die;
        } else {
            return $this->render('create-data', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateData($id)
    {
        $model = HOMEDATA::find()->where(['APPLICANTS_ID' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['menu', 'id' => $id]);
        } else {
            return $this->render('update-data', [
                'model' => $model,
            ]);
        }
    }



}
