[1mdiff --git a/controllers/ApplicantsController.php b/controllers/ApplicantsController.php[m
[1mindex 8025cbf..6b0c888 100644[m
[1m--- a/controllers/ApplicantsController.php[m
[1m+++ b/controllers/ApplicantsController.php[m
[36m@@ -40,12 +40,10 @@[m [mclass ApplicantsController extends Controller[m
         $searchModel = new ApplicantsSearch();[m
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);[m
 [m
[31m-        $code = MUNICIPALITY::findOne(1);[m
 [m
         return $this->render('index', [[m
             'searchModel' => $searchModel,[m
[31m-            'dataProvider' => $dataProvider,[m
[31m-            'code' => $code[m
[32m+[m[32m            'dataProvider' => $dataProvider[m
         ]);[m
     }[m
 [m
[36m@@ -113,9 +111,19 @@[m [mclass ApplicantsController extends Controller[m
             $result = Yii::$app->db->createCommand($sql)->query();[m
         }[m
     }[m
[32m+[m[32m    protected function increment2(){[m
[32m+[m[32m        $count = "SELECT count(*) FROM USER_SEQUENCES WHERE SEQUENCE_NAME = '".Yii::$app->params['sequenceHome']."'";[m
[32m+[m[32m        $val = Yii::$app->db->createCommand($count)->queryOne();[m
[32m+[m[32m        $value = $val["COUNT(*)"];[m
[32m+[m[32m        if ($value <= 0) {[m
[32m+[m[32m            $sql = "CREATE sequence ".Yii::$app->params['sequenceHome'];[m
[32m+[m[32m            $result = Yii::$app->db->createCommand($sql)->query();[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
 [m
     public function actionReport($id) {[m
         $model = Applicants::findOne($id);[m
[32m+[m[32m        $home = HOMEDATA::find()->where(['APPLICANTS_ID' => $id])->one();[m
         $optionsArray = [[m
             'elementId'=> 'canvasTarget',[m
             'value'=> '12345678',[m
[36m@@ -125,7 +133,8 @@[m [mclass ApplicantsController extends Controller[m
 [m
         $content = $this->renderPartial('_reportView', [[m
             'model'=> $model,[m
[31m-            'code' => $code[m
[32m+[m[32m            'code' => $code,[m
[32m+[m[32m            'home' => $home[m
         ]);[m
         $pdf = new Pdf([[m
             'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts[m
[36m@@ -192,17 +201,37 @@[m [mclass ApplicantsController extends Controller[m
             ]);[m
     }[m
 [m
[31m-    public function actionCreateData()[m
[32m+[m[32m    public function actionCreateData($id)[m
     {[m
         $model = new HOMEDATA();[m
[32m+[m[32m        $this->increment2();[m
[32m+[m[32m        if ($model->load(Yii::$app->request->post())) {[m
[32m+[m[32m            $model->APPLICANTS_ID = $id;[m
[32m+[m
[32m+[m[32m             if($model->save()) {[m
[32m+[m[32m                 return $this->redirect(['menu', 'id' => $id]);[m
[32m+[m[32m             }[m
[32m+[m[32m             echo "bien"; die;[m
[32m+[m[32m        } else {[m
[32m+[m[32m            return $this->render('create-data', [[m
[32m+[m[32m                'model' => $model,[m
[32m+[m[32m            ]);[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function actionUpdateData($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $model = HOMEDATA::find()->where(['APPLICANTS_ID' => $id])->one();[m
 [m
         if ($model->load(Yii::$app->request->post()) && $model->save()) {[m
[31m-            return $this->redirect(['view', 'id' => $model->ID]);[m
[32m+[m[32m            return $this->redirect(['menu', 'id' => $id]);[m
         } else {[m
[31m-            return $this->render('create-data', [[m
[32m+[m[32m            return $this->render('update-data', [[m
                 'model' => $model,[m
             ]);[m
         }[m
     }[m
 [m
[32m+[m
[32m+[m
 }[m
