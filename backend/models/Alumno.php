<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $Matricula
 * @property string $nombre
 * @property string $apellidopaterno
 * @property string $apellidomaterno
 * @property string $telefono
 * @property integer $ciudad
 * @property integer $carrera
 * @property integer $usuario
 * @property integer $semestre
 *
 * @property Ciudad $ciudad0
 * @property Carrera $carrera0
 * @property Semestre $semestre0
 * @property User $usuario0
 * @property AlumnoCreditos[] $alumnoCreditos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Matricula', 'nombre', 'apellidopaterno', 'apellidomaterno', 'telefono', 'ciudad', 'carrera', 'usuario', 'semestre'], 'required'],
            [['Matricula', 'ciudad', 'carrera', 'usuario', 'semestre'], 'integer'],
            [['nombre', 'apellidopaterno', 'apellidomaterno'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 10],
            [['ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['ciudad' => 'idciudad']],
            [['carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera' => 'idcarrera']],
            [['semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::className(), 'targetAttribute' => ['semestre' => 'idsemestre']],
            [['usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Matricula' => 'Matricula',
            'nombre' => 'Nombre',
            'apellidopaterno' => 'Apellidopaterno',
            'apellidomaterno' => 'Apellidomaterno',
            'telefono' => 'Telefono',
            'ciudad' => 'Ciudad',
            'carrera' => 'Carrera',
            'usuario' => 'Usuario',
            'semestre' => 'Semestre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad0()
    {
        return $this->hasOne(Ciudad::className(), ['idciudad' => 'ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera0()
    {
        return $this->hasOne(Carrera::className(), ['idcarrera' => 'carrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemestre0()
    {
        return $this->hasOne(Semestre::className(), ['idsemestre' => 'semestre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario0()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoCreditos()
    {
        return $this->hasMany(AlumnoCreditos::className(), ['alumno' => 'Matricula']);
    }
}
