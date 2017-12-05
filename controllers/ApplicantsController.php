<?php

namespace app\controllers;

use Yii;
use app\models\Applicants;
use app\models\ApplicantsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * ApplicantsController implements the CRUD actions for Applicants model.
 */
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

    /**
     * Lists all Applicants models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplicantsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Applicants model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Applicants model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Applicants();
        $this->increment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Applicants model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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

    public function actionReport($id) {
        $model = Applicants::findOne($id);
        $content = $this->renderPartial('_reportView', [
            'model'=> $model
        ]);
        $pdf = Yii::$app->pdf;
        $pdf->options = ['title' => 'Reporte'];
        $pdf->cssFile;
        $mpdf = $pdf->api;
        $mpdf->SetHeader('Secretaria de Desarrollo Social');
        $mpdf->WriteHtml($content);

        return $pdf->render();
    }
}
